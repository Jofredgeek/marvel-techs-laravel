<button id="theme-toggle" type="button"
    class="relative p-2 rounded-lg bg-[var(--surface-2)] hover:bg-[var(--surface)] border border-[var(--border)] transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[var(--primary)] group"
    aria-label="Changer de thème">
    {{-- Sun icon (visible in light mode) --}}
    <svg class="hidden dark:block w-5 h-5 text-[var(--warning)] group-hover:scale-110 transition-transform" fill="none"
        stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
    </svg>
    {{-- Moon icon (visible in dark mode) --}}
    <svg class="block dark:hidden w-5 h-5 text-neon-violet group-hover:scale-110 transition-transform" fill="none"
        stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
    </svg>
</button>