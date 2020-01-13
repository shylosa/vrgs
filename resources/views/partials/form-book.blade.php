<div class="modal-body">
  <!-- form -->
  <form method="POST" action="/book/store" id="form-book" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">{{ __('Название') }}</label>
      <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp"
             value="{{ old('title', $currentBook['title']) }}" placeholder="{{ __('Введите название') }}">
    </div>
    <div class="form-group">
      <label for="description">{{ __('Описание') }}</label>
      <input type="text" class="form-control" id="description" name="description"
             value="{{ old('description', $currentBook['description']) }}" placeholder="{{ __('Введите описание') }}">
    </div>
    <div class="form-group">
      <label for="published_at">{{ __('Год издания') }}</label>
      <input type="text" class="form-control" id="published_at" name="published_at" aria-describedby="published_atHelp"
             value="{{ old('published_at', $currentBook['published_at']) }}" placeholder="{{ __('Введите год издания') }}">
    </div>
    <div class="form-group">
      <div>
        <label for="image">Обложка</label>
      </div>
      <input type="file" id="image" name="image">
      <p class="help-block">jpeg, jpg, png</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Закрыть') }}</button>
      <button type="submit" class="btn btn-primary">{{ __('Сохранить') }}</button>
    </div>
    <input type="hidden" name="book_id" value="{{ $id }}">
  </form>
  <!-- /form -->
</div>