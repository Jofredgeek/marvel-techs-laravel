@props(['label' => '', 'name' => '', 'required' => false, 'placeholder' => '', 'rows' => 5])
<div>
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-[var(--muted)] mb-1.5">
        {{ $label }}@if($required)<span class="text-[var(--danger)] ml-1">*</span>@endif
    </label>
    @endif
    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" @if($required)
        required @endif {{ $attributes->merge(['class' => 'form-input resize-y']) }}
    >{{ old($name) }}</textarea>
    @error($name)
    <p class="text-[var(--error)] text-xs mt-1">{{ $message }}</p>
    @enderror
</div>