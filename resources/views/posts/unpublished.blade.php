@extends('layouts.app')

@section('content')
    <h1>Непубликованные посты</h1>

    @foreach($posts as $post)
        <div class="card">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <form action="{{ route('posts.publish', $post) }}" method="POST">
                @csrf
                <button type="submit">Опубликовать</button>
            </form>
        </div>
    @endforeach
@endsection

