<!-- resources/views/posts/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Создать пост</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Заголовок" required>
        <textarea name="content" placeholder="Контент" required></textarea>
        <button type="submit">Создать</button>
    </form>
@endsection

