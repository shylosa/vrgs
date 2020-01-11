@extends('layout')

@section('content')
    <a href="{{ route('author.create') }}" class="add">
        <i class="fas fa-plus-circle"></i><span>Добавить автора</span>
    </a>
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
        @foreach($authors as $author)
        <tr>
            <th scope="row"></th>
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

@endsection
