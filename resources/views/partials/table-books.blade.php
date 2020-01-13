@if(session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
<button type="button" class="btn btn-link add" data-toggle="modal" data-target="#Modal">
  <i class="fas fa-plus-circle"></i><span>{{ __('Добавить книгу') }}</span>
</button>

<table class="table table-hover">
  <thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">{{ __('Название') }}</th>
    <th scope="col">{{ __('Описание') }}</th>
    <th scope="col">{{ __('Обложка') }}</th>
    <th scope="col">{{ __('Год издания') }}</th>
    <th scope="col">{{ __('Автор') }}</th>
    <th scope="col">{{ __('Действие') }}</th>
  </tr>
  </thead>
  <tbody>
  @foreach($books as $key => $book)
    <tr>
      <th scope="row">{{ $startRow + $key + 1 }}</th>
      <td>{{ $book->title }}</td>
      <td>{{ $book->description }}</td>
      <td>
        <img src="{{ $book->getImage() }}" alt="" width="100">
      </td>
      <td>{{ $book->published_at }}</td>
      <td>
        @foreach($book->authors as $author)
          <p>{{ $author->getFullname() }}</p>
        @endforeach
      </td>
      <td>
        <div class="row flex-nowrap">
          <a href="{{ route('book.edit', $book->id) }}" class="js-link-edit">
            <i class="fas fa-pencil-alt" title="{{ __('Изменить запись') }}"></i>
          </a>
          <a href="{{ route('book.delete', $book->id) }}" class="js-link-delete" onclick="return confirm('Аre you sure?')">
            <i class="fas fa-times" title="{{ __('Удалить запись') }}"></i>
          </a>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $books->links() }}

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">{{ __('Добавление книги') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- .modal-body -->
    @include('partials.form-book')
    <!-- ./modal-body -->
    </div>
  </div>
</div>
<!-- /Modal -->