<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Throwable;

class GoogleAuthController extends Controller
{
    public function redirect(): SymfonyRedirectResponse|RedirectResponse
    {
        if (! config('services.google.client_id') || ! config('services.google.client_secret')) {
            return redirect()->route('login')->withErrors([
                'google' => 'La connexion Google doit encore être reliée aux identifiants Google Cloud.',
            ]);
        }

        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            if (! $googleUser->getEmail()) {
                return redirect()->route('login')->withErrors([
                    'google' => 'Votre compte Google ne fournit pas d’adresse e-mail.',
                ]);
            }

            $user = DB::transaction(function () use ($googleUser): User {
                $user = User::where('google_id', $googleUser->getId())
                    ->orWhere('email', Str::lower($googleUser->getEmail()))
                    ->first();

                if ($user) {
                    $user->forceFill([
                        'google_id' => $googleUser->getId(),
                        'email_verified_at' => $user->email_verified_at ?? now(),
                    ])->save();

                    return $user;
                }

                return User::create([
                    'name' => $googleUser->getName() ?: 'Utilisateur Marvel Tech\'s',
                    'email' => Str::lower($googleUser->getEmail()),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                ]);
            });

            Auth::login($user, true);
            $request->session()->regenerate();

            return redirect()->intended(route($user->homeRoute(), absolute: false));
        } catch (Throwable $exception) {
            Log::warning('Échec de la connexion Google', [
                'exception' => $exception->getMessage(),
            ]);

            return redirect()->route('login')->withErrors([
                'google' => 'La connexion Google a échoué ou a été annulée. Réessayez.',
            ]);
        }
    }
}
