@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[var(--border)] focus:border-[var(--primary)]
focus:ring-[var(--primary)] rounded-md shadow-sm bg-[var(--surface)] text-[var(--text)] placeholder-[var(--muted)]'])
}}>