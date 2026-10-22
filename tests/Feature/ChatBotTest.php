<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ChatBotTest extends TestCase
{
    use DatabaseTransactions; // real DB, rolled back after each test

    /** La clé du .env ne doit jamais fuir dans les tests : on force. */
    protected function setUp(): void
    {
        parent::setUp();
        config([
            'services.ai.key'      => null,
            'services.ai.base_url' => 'https://freebuff.test/api/v1/paid',
            'services.ai.model'    => 'claude-haiku-5-5',
        ]);
    }

    public function test_falls_back_gracefully_without_api_key(): void
    {
        $response = $this->postJson('/api/chat', [
            'session_id' => 'sess-test-fallback',
            'message'    => 'Bonjour, quels services proposez-vous ?',
        ]);

        $response->assertOk()
            ->assertJson(['ai_available' => false])
            ->assertJsonPath('reply', fn ($reply) => str_contains($reply, 'assistant IA'));

        // Aucun message ne doit être écrit si l'IA n'est pas dispo
        $this->assertDatabaseMissing('chat_messages', ['session_id' => 'sess-test-fallback']);
    }

    public function test_replies_with_ai_and_persists_conversation(): void
    {
        config(['services.ai.key' => 'sk-test']);

        Http::fake([
            'freebuff.test/*' => Http::response([
                'choices' => [
                    ['message' => ['role' => 'assistant', 'content' => 'Bonjour ! Nous proposons réseaux, cloud, cybersécurité… Un projet en tête ?']],
                ],
            ], 200),
        ]);

        $response = $this->postJson('/api/chat', [
            'session_id' => 'sess-test-ai',
            'message'    => 'Quels services proposez-vous ?',
        ]);

        $response->assertOk()
            ->assertJson([
                'ai_available' => true,
                'reply'        => 'Bonjour ! Nous proposons réseaux, cloud, cybersécurité… Un projet en tête ?',
            ]);

        Http::assertSentCount(1);

        // Conversation sauvegardée (client + assistant)
        $this->assertDatabaseHas('chat_messages', ['session_id' => 'sess-test-ai', 'role' => 'user']);
        $this->assertDatabaseHas('chat_messages', ['session_id' => 'sess-test-ai', 'role' => 'assistant']);
    }

    public function test_falls_back_when_ai_api_returns_error(): void
    {
        config(['services.ai.key' => 'sk-test']);

        Http::fake([
            'freebuff.test/*' => Http::response(['error' => 'boom'], 500),
        ]);

        $response = $this->postJson('/api/chat', [
            'session_id' => 'sess-test-error',
            'message'    => 'Ceci est un message de test pour déclencher une erreur API.',
        ]);

        $response->assertOk()
            ->assertJson(['ai_available' => false]);

        // Le message client est conservé (l'historique sera reconstruit),
        // mais aucune réponse assistant ne doit être écrite
        $this->assertDatabaseHas('chat_messages', ['session_id' => 'sess-test-error', 'role' => 'user']);
        $this->assertDatabaseMissing('chat_messages', [
            'session_id' => 'sess-test-error',
            'role'       => 'assistant',
        ]);
    }

    public function test_validates_payload(): void
    {
        // message manquant
        $this->postJson('/api/chat', ['session_id' => 'sess-v'])->assertStatus(422);

        // session_id manquant
        $this->postJson('/api/chat', ['message' => 'Bonjour'])->assertStatus(422);

        // message trop long (> 1000)
        $this->postJson('/api/chat', [
            'session_id' => 'sess-v',
            'message'    => str_repeat('a', 1001),
        ])->assertStatus(422);
    }

    public function test_daily_limit_kicks_in(): void
    {
        config(['services.ai.key' => 'sk-test']);

        Http::fake([
            'freebuff.test/*' => Http::response([
                'choices' => [
                    ['message' => ['role' => 'assistant', 'content' => 'Réponse test']],
                ],
            ], 200),
        ]);

        // 40 messages déjà envoyés aujourd'hui
        $sessionId = 'sess-test-limit';
        foreach (range(1, 40) as $i) {
            \App\Models\ChatMessage::create(['session_id' => $sessionId, 'role' => 'user', 'content' => 'msg ' . $i]);
        }

        $response = $this->postJson('/api/chat', [
            'session_id' => $sessionId,
            'message'    => 'Encore une question, quel est le devis pour un serveur NAS ?',
        ]);

        $response->assertOk()
            ->assertJson(fn ($json) => $json->where('limit_hit', true)->has('reply')->etc());
    }

    public function test_admin_can_view_and_delete_conversations(): void
    {
        $admin = User::factory()->create();

        \App\Models\ChatMessage::create(['session_id' => 'sess-admin-view', 'role' => 'user', 'content' => 'Bonjour ! Je voudrais un devis pour mon entreprise.']);
        \App\Models\ChatMessage::create(['session_id' => 'sess-admin-view', 'role' => 'assistant', 'content' => 'Avec plaisir ! Pouvez-vous me dire le projet ?']);

        $response = $this->actingAs($admin)->get('/admin/chats');
        $response->assertOk()->assertSee('sess-admin-view');

        $delete = $this->actingAs($admin)->delete('/admin/chats/' . rawurlencode('sess-admin-view'));
        $delete->assertRedirect();

        $this->assertDatabaseMissing('chat_messages', ['session_id' => 'sess-admin-view']);
    }
}
