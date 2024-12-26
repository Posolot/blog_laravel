@extends('layouts.app')

@section('content')
    <h1>Черновики</h1>
    @if($posts->isEmpty())
        <p>Нет черновиков.</p>
    @else
        <ul>
            @foreach($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <form action="{{ route('posts.publish', $post) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Опубликовать</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

