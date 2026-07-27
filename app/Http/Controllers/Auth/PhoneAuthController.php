<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PhoneVerificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class PhoneAuthController extends Controller
{
    public function send(Request $request, PhoneVerificationService $verification): RedirectResponse
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:30'],
            'channel' => ['required', Rule::in(['sms', 'whatsapp'])],
        ]);

        $phone = $this->normalizePhone($validated['phone']);
        $rateLimitKey = 'phone-otp:'.hash('sha256', $phone.'|'.$request->ip());

        if (RateLimiter::tooManyAttempts($rateLimitKey, 5)) {
            $seconds = RateLimiter::availableIn($rateLimitKey);

            throw ValidationException::withMessages([
                'phone' => "Trop de tentatives. Réessayez dans {$seconds} secondes.",
            ]);
        }

        RateLimiter::hit($rateLimitKey, 600);

        try {
            $previewCode = $verification->send($phone, $validated['channel']);
        } catch (Throwable $exception) {
            Log::error('Échec de l’envoi OTP', [
                'phone' => $phone,
                'channel' => $validated['channel'],
                'exception' => $exception->getMessage(),
            ]);

            return back()
                ->withInput($request->only('phone', 'channel'))
                ->withErrors(['phone' => 'Impossible d’envoyer le code pour le moment. Vérifiez la configuration du service puis réessayez.']);
        }

        $request->session()->put('phone_verification', [
            'phone' => $phone,
            'channel' => $validated['channel'],
            'sent_at' => now()->timestamp,
        ]);

        if ($previewCode) {
            $request->session()->put('phone_verification_preview', $previewCode);
        } else {
            $request->session()->forget('phone_verification_preview');
        }

        return redirect()
            ->route('phone.verify')
            ->with('status', 'Un code de vérification a été envoyé.');
    }

    public function create(Request $request): View|RedirectResponse
    {
        if (! $request->session()->has('phone_verification.phone')) {
            return redirect()->route('login')->withErrors([
                'phone' => 'Saisissez d’abord votre numéro de téléphone.',
            ]);
        }

        return view('auth.verify-phone', [
            'phone' => $request->session()->get('phone_verification.phone'),
            'channel' => $request->session()->get('phone_verification.channel'),
            'previewCode' => $request->session()->get('phone_verification_preview'),
        ]);
    }

    public function verify(Request $request, PhoneVerificationService $verification): RedirectResponse
    {
        $phone = $request->session()->get('phone_verification.phone');

        if (! is_string($phone)) {
            return redirect()->route('login')->withErrors([
                'phone' => 'Votre demande de vérification a expiré.',
            ]);
        }

        $validated = $request->validate([
            'code' => ['required', 'digits:6'],
            'name' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::where('phone', $phone)->first();

        if (! $user) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ], [
                'name.required' => 'Indiquez votre nom pour créer votre compte.',
            ]);
        }

        try {
            $approved = $verification->verify($phone, $validated['code']);
        } catch (Throwable $exception) {
            Log::error('Échec de la vérification OTP', [
                'phone' => $phone,
                'exception' => $exception->getMessage(),
            ]);

            return back()->withErrors([
                'code' => 'La vérification est momentanément indisponible. Réessayez.',
            ]);
        }

        if (! $approved) {
            throw ValidationException::withMessages([
                'code' => 'Ce code est invalide ou a expiré.',
            ]);
        }

        if (! $user) {
            $user = User::create([
                'name' => Str::squish($validated['name']),
                'phone' => $phone,
                'phone_verified_at' => now(),
            ]);
        } elseif (! $user->phone_verified_at) {
            $user->forceFill(['phone_verified_at' => now()])->save();
        }

        Auth::login($user, true);
        $request->session()->regenerate();
        $request->session()->forget(['phone_verification', 'phone_verification_preview']);

        return redirect()->intended(route($user->homeRoute(), absolute: false));
    }

    private function normalizePhone(string $phone): string
    {
        $normalized = preg_replace('/[\s().-]+/', '', trim($phone)) ?? '';

        if (str_starts_with($normalized, '00')) {
            $normalized = '+'.substr($normalized, 2);
        } elseif (preg_match('/^6\d{8}$/', $normalized)) {
            $normalized = '+237'.$normalized;
        }

        if (! preg_match('/^\+[1-9]\d{7,14}$/', $normalized)) {
            throw ValidationException::withMessages([
                'phone' => 'Utilisez le format international, par exemple +237 6XX XXX XXX.',
            ]);
        }

        return $normalized;
    }
}
