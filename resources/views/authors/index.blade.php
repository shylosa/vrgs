@extends('layout')

@section('content')
  @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  <button type="button" class="btn btn-link add" data-toggle="modal" data-target="#Modal">
    <i class="fas fa-plus-circle"></i><span>{{ __('Добавить автора') }}</span>
  </button>
  <table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Patronymic</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($authors as $key => $author)
      <tr>
        <th scope="row">{{ $startRow + $key + 1 }}</th>
        <td>{{ $author->firstname }}</td>
        <td>{{ $author->lastname }}</td>
        <td>{{ $author->patronymic }}</td>
        <td>
          <a href="{{ route('author.edit', $author->id) }}">
            <i class="fas fa-pencil-alt" title="Изменить запись"></i>
          </a>
          <a href="{{ route('author.delete', $author->id) }}">
            <i class="fas fa-times" title="Удалить запись"></i>
          </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

  {{ $authors->links() }}

  <!-- Modal -->
  <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Добавление автора</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <form method="POST" action="{{ route('author.create') }}">
            @csrf
            <div class="form-group">
              <label for="firstname">Имя</label>
              <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstnameHelp"
                     placeholder="Введите имя">
              <small id="firstnameHelp" class="form-text text-muted">Не менее 3-х символов</small>
            </div>
            <div class="form-group">
              <label for="lastname">Фамилия</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Введите фамилию">
            </div>
            <div class="form-group">
              <label for="patronymic">Отчество</label>
              <input type="text" class="form-control" id="patronymic" name="patronymic" aria-describedby="patronymicHelp"
                     placeholder="Введите отчество">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
              <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
          </form>
          <!-- /form -->
        </div>
      </div>
    </div>
  </div>
  <!-- /Modal -->
@endsection
