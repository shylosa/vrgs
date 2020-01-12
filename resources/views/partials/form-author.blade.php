<div class="modal-body">
  <!-- form -->
  <form method="POST" action="/author/store">
    @csrf
    <div class="form-group">
      <label for="firstname">{{ __('Имя') }}</label>
      <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstnameHelp"
             value="{{ old('firstname', $currentAuthor['firstname']) }}" placeholder="{{ __('Введите имя') }}">
      <small id="firstnameHelp" class="form-text text-muted">{{ __('Не менее 3-х символов') }}</small>
    </div>
    <div class="form-group">
      <label for="lastname">{{ __('Фамилия') }}</label>
      <input type="text" class="form-control" id="lastname" name="lastname"
             value="{{ old('lastname', $currentAuthor['lastname']) }}" placeholder="{{ __('Введите фамилию') }}">
    </div>
    <div class="form-group">
      <label for="patronymic">{{ __('Отчество') }}</label>
      <input type="text" class="form-control" id="patronymic" name="patronymic" aria-describedby="patronymicHelp"
             value="{{ old('patronymic', $currentAuthor['patronymic']) }}" placeholder="{{ __('Введите отчество') }}">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Закрыть') }}</button>
      <button type="submit" class="btn btn-primary">{{ __('Сохранить') }}</button>
    </div>
    <input type="hidden" name="author_id" value="{{ $id }}">
  </form>
  <!-- /form -->
</div>