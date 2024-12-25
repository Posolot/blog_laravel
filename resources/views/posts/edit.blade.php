@extends('layouts.app')

@section('content')
    <h1>{{ isset($post) ? 'Редактировать пост' : 'Создать пост' }}</h1>
    <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        <input type="text" name="title" placeholder="Заголовок" value="{{ $post->title ?? '' }}" required>
        <textarea name="content" placeholder="Контент" required>{{ $post->content ?? '' }}</textarea>
        <button type="submit">{{ isset($post) ? 'Сохранить' : 'Создать' }}</button>
    </form>
@endsection

