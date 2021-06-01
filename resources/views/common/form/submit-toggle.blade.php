<button type="submit" class="lid-submit-toggle {{ $is_active ? 'lid-submit-toggle--on' : 'lid-submit-toggle--off' }}" title="{{ $is_active ? 'Deseja desabilitar?' : 'Deseja habilitar?' }}">
    <span class="input-group {{ isset($small) && $small === true ? 'input-group-sm' : '' }}">
        <span class="form-control lid-submit-toggle__display lid-submit-toggle__display--on"><i class="fa fa-fw fa-check"></i></span>
        <span class="input-group-addon lid-submit-toggle__handler"><i class="fa fa-fw"></i></span>
        <span class="form-control lid-submit-toggle__display lid-submit-toggle__display--off"><i class="fa fa-fw fa-minus"></i></span>
    </span>
</button>
