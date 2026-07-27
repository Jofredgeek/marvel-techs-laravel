<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhoneAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config(['services.twilio.verification_driver' => 'log']);
    }

    public function test_new_user_can_register_with_a_local_phone_otp(): void
    {
        $sendResponse = $this->post(route('phone.send'), [
            'phone' => '699 123 456',
            'channel' => 'whatsapp',
        ]);

        $sendResponse
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('phone.verify'));

        $code = $sendResponse->getSession()->get('phone_verification_preview');

        $verifyResponse = $this->post(route('phone.check'), [
            'code' => $code,
            'name' => 'Aline Test',
        ]);

        $verifyResponse
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('dashboard', absolute: false));

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name' => 'Aline Test',
            'phone' => '+237699123456',
        ]);
        $this->assertNotNull(User::where('phone', '+237699123456')->firstOrFail()->phone_verified_at);
    }

    public function test_existing_user_can_sign_in_with_phone_without_entering_a_name(): void
    {
        $user = User::factory()->create([
            'phone' => '+237677123456',
            'phone_verified_at' => now(),
        ]);

        $sendResponse = $this->post(route('phone.send'), [
            'phone' => '+237 677 123 456',
            'channel' => 'sms',
        ]);

        $response = $this->post(route('phone.check'), [
            'code' => $sendResponse->getSession()->get('phone_verification_preview'),
        ]);

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_phone_otp_is_rejected(): void
    {
        $this->post(route('phone.send'), [
            'phone' => '+237699123456',
            'channel' => 'sms',
        ]);

        $this->post(route('phone.check'), [
            'code' => '000000',
            'name' => 'Aline Test',
        ])->assertSessionHasErrors('code');

        $this->assertGuest();
    }
}
