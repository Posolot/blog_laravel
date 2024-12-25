@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <!-- Форма для добавления комментариев -->
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <textarea name="content" placeholder="Ваш комментарий" required></textarea>
        <button type="submit">Добавить комментарий</button>
    </form>

    <h3>Комментарии</h3>
    @foreach($post->comments as $comment)
        <div>
            <p>{{ $comment->content }}</p>
            @if(!$comment->is_approved)
                <form action="{{ route('comments.approve', $comment) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button>Одобрить комментарий</button>
                </form>
            @endif
        </div>
    @endforeach
@endsection

