@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Модерация комментариев</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">Вернуться к постам</a>

    @if($comments->isEmpty())
        <p>Нет комментариев для модерации.</p>
    @else
        <ul class="list-group">
            @foreach($comments as $comment)
                <li class="list-group-item">
                    <p><strong>Пост:</strong> {{ $comment->post->title }}</p>
                    <p>{{ $comment->content }}</p>
                    <form action="{{ route('comments.approve', $comment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Одобрить</button>
                    </form>
                    <form action="{{ route('comments.reject', $comment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Не одобрить</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

