<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use App\Mail\QuoteMail;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class SiteFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_content_pages_render_database_content(): void
    {
        $service = Service::create([
            'title' => 'Conseil numérique',
            'icon' => '🧭',
            'excerpt' => 'Un accompagnement sur mesure.',
            'content' => 'Contenu détaillé du service.',
            'technologies' => ['Laravel'],
            'active' => true,
        ]);

        $project = Project::create([
            'title' => 'Portail client',
            'client' => 'Acme',
            'year' => 2026,
            'tags' => ['Web'],
            'excerpt' => 'Une réalisation récente.',
            'content' => 'Contenu détaillé du projet.',
        ]);

        $post = Post::create([
            'title' => 'Sécuriser son infrastructure',
            'excerpt' => 'Les bonnes pratiques essentielles.',
            'content' => 'Contenu détaillé de l’article.',
            'category' => 'Sécurité',
            'published_at' => now()->subMinute(),
            'active' => true,
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Conseil numérique');
        $this->get(route('services.show', $service->slug))->assertOk();
        $this->get(route('portfolio.index'))->assertOk()->assertSee('Web');
        $this->get(route('portfolio.show', $project->slug))->assertOk();
        $this->get(route('blog.show', $post->slug))->assertOk();
        $this->get(route('quote', ['service' => $service->title]))
            ->assertOk()
            ->assertSee('value="'.$service->title.'" selected', false);
    }

    public function test_contact_and_quote_requests_are_saved_and_mailed(): void
    {
        Mail::fake();

        $this->post(route('contact.store'), [
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'phone' => '+237600000000',
            'service' => 'Support',
            'budget' => 'Non défini',
            'message' => 'Nous avons besoin d’un accompagnement informatique complet.',
        ])->assertRedirect(route('contact'));

        $this->post(route('quote.store'), [
            'name' => 'Jeanne Dupont',
            'email' => 'jeanne@example.com',
            'phone' => '+237611111111',
            'company' => 'Acme',
            'service' => 'Cloud',
            'budget' => 'Non défini',
            'deadline' => now()->addWeek()->toDateString(),
            'details' => 'Nous souhaitons migrer notre infrastructure vers le cloud avec un accompagnement complet.',
        ])->assertRedirect(route('quote'));

        $this->assertDatabaseHas('contacts', ['email' => 'jean@example.com']);
        $this->assertDatabaseHas('quotes', ['email' => 'jeanne@example.com']);
        Mail::assertSent(ContactMail::class, 1);
        Mail::assertSent(QuoteMail::class, 1);
    }

    public function test_admin_resources_only_expose_implemented_routes(): void
    {
        $this->assertFalse(Route::has('admin.services.show'));
        $this->assertFalse(Route::has('admin.projects.show'));
        $this->assertFalse(Route::has('admin.posts.show'));
    }

    public function test_admin_service_input_is_normalized_without_database_errors(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $this->actingAs($user)->post(route('admin.services.store'), [
            'title' => 'Audit IT',
            'icon' => '',
            'excerpt' => 'Audit complet de votre système.',
            'content' => 'Analyse, recommandations et plan d’action.',
            'features' => "Analyse\n\nRapport",
            'technologies' => 'Laravel, , Cloud',
            'sort_order' => '',
            'active' => '1',
        ])->assertRedirect(route('admin.services.index'));

        $service = Service::where('title', 'Audit IT')->firstOrFail();

        $this->assertSame('🔧', $service->icon);
        $this->assertSame(0, $service->sort_order);
        $this->assertSame(['Analyse', 'Rapport'], $service->features);
        $this->assertSame(['Laravel', 'Cloud'], $service->technologies);
    }

    public function test_generated_slugs_are_unique(): void
    {
        $first = Service::create([
            'title' => 'Support IT',
            'excerpt' => 'Premier service.',
            'content' => 'Premier contenu.',
        ]);
        $second = Service::create([
            'title' => 'Support IT',
            'excerpt' => 'Deuxième service.',
            'content' => 'Deuxième contenu.',
        ]);

        $this->assertSame('support-it', $first->slug);
        $this->assertSame('support-it-2', $second->slug);
    }
}
