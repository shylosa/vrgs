@extends('layout')

@section('content')
  <h1>{{ __('Справочник книг') }}</h1>
  <div class="title">
    <h3>{{ __('с возможностью CRUD') }}</h3>
  </div>

  <table class="table table-hover display" id="table-catalog">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{ __('Название') }}</th>
      <th scope="col">{{ __('Описание') }}</th>
      <th scope="col">{{ __('Обложка') }}</th>
      <th scope="col">{{ __('Год издания') }}</th>
      <th scope="col">{{ __('Автор') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $key => $book)
      <tr>
        <th scope="row"></th>
        <td>{{ $book->title }}</td>
        <td>{{ $book->description }}</td>
        <td>
          <img src="{{ $book->getImage() }}" alt="" width="200">
        </td>
        <td>{{ $book->published_at }}</td>
        <td>
          @foreach($book->authors as $author)
            <p>{{ $author->getFullname() }}</p>
          @endforeach
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
