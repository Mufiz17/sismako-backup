<div class="mb-3">
    <label class="form-label {{ $required ? ' required' : '' }}">
        {{ $label }}
        <select class="form-select" name="{{ $name }}" id="{{ $id ?? '' }}">{{ $slot }}</select>
        @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </label>
</div>