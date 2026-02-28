<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-[var(--surface)]
    border border-[var(--border)] rounded-md font-semibold text-xs text-[var(--text)] uppercase tracking-widest
    shadow-sm hover:bg-[var(--surface-2)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)]
    disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>