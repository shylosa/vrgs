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
      <th scope="col">{{ __('Имя') }}</th>
      <th scope="col">{{ __('Фамилия') }}</th>
      <th scope="col">{{ __('Отчество') }}</th>
      <th scope="col">{{ __('Действие') }}</th>
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
          <a href="{{ route('author.edit', $author->id) }}" class="js-link-edit">
            <i class="fas fa-pencil-alt" title="{{ __('Изменить запись') }}"></i>
          </a>
          <a href="{{ route('author.delete', $author->id) }}" onclick="return confirm('are you sure?')">
            <i class="fas fa-times" title="{{ __('Удалить запись') }}"></i>
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
          <h5 class="modal-title" id="ModalLabel">{{ __('Добавление автора') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- .modal-body -->
        @include('partials.form-author')
        <!-- ./modal-body -->
      </div>
    </div>
  </div>
  <!-- /Modal -->
@endsection
