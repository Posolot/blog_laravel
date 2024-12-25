@extends('layouts.app')

@section('content')
    <h1>Редактировать комментарий</h1>
    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PATCH')
        <textarea name="content" required>{{ $comment->content }}</textarea>
        <button type="submit">Сохранить</button>
    </form>
@endsection

