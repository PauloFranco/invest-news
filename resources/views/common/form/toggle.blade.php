<div class="form-toggle">
    <label tabindex="{{ isset($tabIndex) ? $tabIndex : -1 }}">
        <input type="checkbox" name="{{ $name }}" id="{{ $name }}"
               @isset($form)  form="{{ $form }}"  @endisset
               {{ $isChecked ? 'checked' : '' }} value="{{ $value }}">

        <i class="fa fa-fw"></i> <!-- fa-toggle-on | fa-toggle-off -->
    </label>
</div>
