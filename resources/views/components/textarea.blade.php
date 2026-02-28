@props(['label' => '', 'name' => '', 'required' => false, 'placeholder' => '', 'rows' => 5])
<div>
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-slate-300 mb-1.5">
        {{ $label }}@if($required)<span class="text-neon-rose ml-1">*</span>@endif
    </label>
    @endif
    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}" @if($required)
        required @endif {{ $attributes->merge(['class' => 'form-input resize-y']) }}
    >{{ old($name) }}</textarea>
    @error($name)
    <p class="text-neon-rose text-xs mt-1">{{ $message }}</p>
    @enderror
</div>