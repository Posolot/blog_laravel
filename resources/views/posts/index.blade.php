@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Посты</h1>
        <a href="{{ route('posts.create') }}" class="button">Создать пост</a>
    </div>

    <div>
        <a href="{{ route('posts.unpublished') }}" class="button">Посмотреть непубликованные посты</a>
    </div>

    @foreach($posts as $post)
        <div class="card">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <div>
                <a href="{{ route('posts.edit', $post) }}" class="button">Редактировать</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="delete">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection

