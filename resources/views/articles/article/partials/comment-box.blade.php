<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
    <label for="comment">Comentário</label>

    <textarea name="comment" id="comment" rows="5" class="form-control"
              placeholder="Acrescente algum comentário"
              required>{{ old('comment') }}</textarea>

    @include('common.form.errors', ['field' => 'comment'])
</div>
