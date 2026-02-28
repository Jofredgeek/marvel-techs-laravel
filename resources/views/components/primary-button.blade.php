<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[var(--text)]
    border border-transparent rounded-md font-semibold text-xs text-[var(--bg)] uppercase tracking-widest
    hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-[var(--primary)] transition ease-in-out duration-150'])
    }}>
    {{ $slot }}
</button>