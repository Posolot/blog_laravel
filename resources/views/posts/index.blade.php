@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Список постов</h1>
    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('comments.moderate') }}" class="btn btn-warning">Модерация комментариев</a>
        <a href="{{ route('posts.create') }}" class="btn btn-success">Создать новый пост</a>
        <a href="{{ route('posts.drafts') }}" class="btn btn-success">Публикация постов</a>
    </div>

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <div class="d-flex justify-content-start gap-2">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Редактировать</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <h6>Комментарии:</h6>
                @forelse($post->comments->where('is_approved', true) as $comment)
                    <p>{{ $comment->content }}</p>
                @empty
                    <p>Комментариев нет.</p>
                @endforelse
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-3">
                        <textarea name="content" class="form-control" rows="2" placeholder="Добавить комментарий"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Добавить комментарий</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection

