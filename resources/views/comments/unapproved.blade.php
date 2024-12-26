@extends('layouts.app')

@section('content')
    <h1>Неподтвержденные комментарии</h1>

    @if($comments->isEmpty())
        <p>Нет неподтвержденных комментариев.</p>
    @else
        <ul>
            @foreach($comments as $comment)
                <li>
                    <p>{{ $comment->content }}</p>

                    <!-- Кнопка для подтверждения комментария -->
                    <form action="{{ route('comments.approve', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button class="button">Подтвердить</button>
                    </form>
                    
                    <!-- Кнопка для отклонения комментария -->
                    <form action="{{ route('comments.reject', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="button">Отклонить</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

