<a href="{{ route('google.redirect') }}"
    class="group flex w-full items-center justify-center gap-3 rounded-xl border border-[var(--border-soft)] bg-[var(--surface)] px-4 py-3 text-sm font-bold text-[var(--heading)] transition hover:-translate-y-0.5 hover:border-[#9061ff]/50 hover:bg-[var(--surface-2)] hover:shadow-md focus:outline-none focus:ring-2 focus:ring-[var(--primary)] focus:ring-offset-2 focus:ring-offset-[var(--surface)]">
    <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true">
        <path fill="#4285F4" d="M21.6 12.23c0-.71-.06-1.4-.18-2.07H12v3.92h5.38a4.6 4.6 0 01-2 3.02v2.54h3.24c1.9-1.75 2.98-4.33 2.98-7.41z"/>
        <path fill="#34A853" d="M12 22c2.7 0 4.98-.9 6.64-2.43l-3.24-2.54c-.9.6-2.05.96-3.4.96-2.61 0-4.82-1.76-5.61-4.13H3.04v2.62A10 10 0 0012 22z"/>
        <path fill="#FBBC05" d="M6.39 13.86A6.02 6.02 0 016.07 12c0-.65.11-1.28.32-1.86V7.52H3.04A10 10 0 002 12c0 1.61.38 3.14 1.04 4.48l3.35-2.62z"/>
        <path fill="#EA4335" d="M12 6.01c1.47 0 2.79.5 3.82 1.5l2.88-2.88A9.64 9.64 0 0012 2a10 10 0 00-8.96 5.52l3.35 2.62C7.18 7.77 9.39 6.01 12 6.01z"/>
    </svg>
    Continuer avec Google
</a>

@error('google')
    <p class="mt-2 text-center text-sm text-[var(--danger)]">{{ $message }}</p>
@enderror
