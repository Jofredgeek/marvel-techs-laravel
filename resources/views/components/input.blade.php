@props(['label' => '', 'name' => '', 'type' => 'text', 'required' => false, 'placeholder' => '', 'value' => ''])
<div>
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-300 mb-1.5">
        {{ $label }}@if($required)<span class="text-neon-rose ml-1">*</span>@endif
    </label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}" @if($required) required @endif {{ $attributes->merge(['class' => 'form-input'])
    }}
    >
    @error($name)
    <p class="text-neon-rose text-xs mt-1">{{ $message }}</p>
    @enderror
</div>