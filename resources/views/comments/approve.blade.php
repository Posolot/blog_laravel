@extends('layouts.app')

@section('content')
    <h1>Подтверждение комментариев</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($comments->isEmpty())
        <p>Нет комментариев для подтверждения.</p>
    @else
        <ul>
            @foreach($comments as $comment)
                <li>
                    <p>{{ $comment->content }}</p>
                    <form action="{{ route('comments.approve', $comment->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="button">Подтвердить</button>
                    </form>
                    <form action="{{ route('comments.reject', $comment->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button delete">Отклонить</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

