@php
    $required = $required ?? false;
    $isDisabled = $isDisabled ?? false;
@endphp

<div class="mb-3">
    <label
        class="form-label {{ $required ? 'required' : '' }} {{ $isDisabled ? 'disabled' : '' }}">{{ $label }}</label>

        <input id="{{ $id ?? '' }}" type="{{ $type }}" class="form-control" name="{{ $name }}"
        placeholder="{{ $placeholder ?? '' }}" {{ $required ? 'required' : '' }} {{ $isDisabled ? 'disabled' : '' }}>

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
</div>
