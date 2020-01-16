<!-- form -->
<form method="POST" action="{{ ($author->id) ? route('author.update', $author->id) : route('author.store') }}" id="form-author">
  @csrf
  <div class="form-group">
    <label for="lastname">{{ __('Фамилия') }}</label>
    <input type="text" class="form-control" id="lastname" name="lastname"
           value="{{ old('lastname', $author->lastname) }}" placeholder="{{ __('Введите фамилию') }}">
    <small id="firstnameHelp" class="form-text text-muted">{{ __('Не менее 3-х символов') }}</small>
    @foreach($errors->get('lastname') as $message)
      <span class="form-text text-danger">{{ $message }}</span>
    @endforeach

  </div>
  <div class="form-group">
    <label for="firstname">{{ __('Имя') }}</label>
    <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstnameHelp"
           value="{{ old('firstname', $author->firstname) }}" placeholder="{{ __('Введите имя') }}">
    @foreach($errors->get('firstname') as $message)
      <span class="form-text text-danger">{{ $message }}</span>
    @endforeach

  </div>
  <div class="form-group">
    <label for="patronymic">{{ __('Отчество') }}</label>
    <input type="text" class="form-control" id="patronymic" name="patronymic" aria-describedby="patronymicHelp"
           value="{{ old('patronymic', $author->patronymic) }}"
           placeholder="{{ __('Введите отчество') }}">
    {!! $errors->first('patronymic', '<span class="form-text text-danger">:message</span>') !!}
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Закрыть') }}</button>
    <button type="submit" class="btn btn-primary">{{ __('Сохранить') }}</button>
  </div>
</form>
<!-- /form -->

