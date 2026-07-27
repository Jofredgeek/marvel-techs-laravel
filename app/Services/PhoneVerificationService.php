<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Twilio\Rest\Client;

class PhoneVerificationService
{
    public function send(string $phone, string $channel): ?string
    {
        if ($this->usesLocalDriver()) {
            $code = (string) random_int(100000, 999999);

            Cache::put($this->cacheKey($phone), Hash::make($code), now()->addMinutes(10));
            Log::info('Code OTP local Marvel Tech\'s', [
                'phone' => $phone,
                'channel' => $channel,
                'code' => $code,
                'expires_in_minutes' => 10,
            ]);

            return app()->environment(['local', 'testing']) ? $code : null;
        }

        $this->twilio()
            ->verify
            ->v2
            ->services($this->verifyServiceSid())
            ->verifications
            ->create($phone, $channel);

        return null;
    }

    public function verify(string $phone, string $code): bool
    {
        if ($this->usesLocalDriver()) {
            $storedCode = Cache::get($this->cacheKey($phone));

            if (! is_string($storedCode) || ! Hash::check($code, $storedCode)) {
                return false;
            }

            Cache::forget($this->cacheKey($phone));

            return true;
        }

        $verification = $this->twilio()
            ->verify
            ->v2
            ->services($this->verifyServiceSid())
            ->verificationChecks
            ->create(['to' => $phone, 'code' => $code]);

        return $verification->status === 'approved';
    }

    private function usesLocalDriver(): bool
    {
        return config('services.twilio.verification_driver') === 'log';
    }

    private function twilio(): Client
    {
        $accountSid = config('services.twilio.account_sid');
        $authToken = config('services.twilio.auth_token');

        if (! $accountSid || ! $authToken) {
            throw new RuntimeException('La configuration Twilio est incomplète.');
        }

        return new Client($accountSid, $authToken);
    }

    private function verifyServiceSid(): string
    {
        $serviceSid = config('services.twilio.verify_service_sid');

        if (! $serviceSid) {
            throw new RuntimeException('Le service Twilio Verify n’est pas configuré.');
        }

        return $serviceSid;
    }

    private function cacheKey(string $phone): string
    {
        return 'phone-verification:'.hash('sha256', $phone);
    }
}
