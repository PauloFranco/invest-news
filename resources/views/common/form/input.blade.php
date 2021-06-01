<div class="form-group {{ $errors->has($field) ? 'has-error' : '' }}">
    @unless(empty($label))
        <label for="name" class="control-label">{{ $label }}</label>
    @endunless

    <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control"
           {{ isset($attributes) ? $attributes : '' }}
           value="{{ old($field, isset($default) ? $default : '') }}">

    @include('common.form.errors', compact('field'))
</div>
