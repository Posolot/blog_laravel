@extends('layouts.app')

@section('content')
    <div class="post">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </div>

    <div class="comments">
        <h2>Подтвержденные комментарии</h2>
        @if($comments->isEmpty())
            <p>Нет подтвержденных комментариев.</p>
        @else
            <ul>
                @foreach($comments as $comment)
                    <li>{{ $comment->content }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

