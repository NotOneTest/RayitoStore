@extends('layouts.app')

@section('title', $question->title . ' - Rayito Store')

@section('content')
<section class="section">
    <div class="container">
        <div class="question-detail">
            <div class="question-main">
                <h1 class="question-title">{{ $question->title }}</h1>
                <div class="question-meta">
                    <span>Por {{ $question->user->name }}</span>
                    <span>{{ $question->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="question-body">
                    {{ $question->content }}
                </div>
            </div>

            <div class="answers-section">
                <h2>{{ $question->answers->count() }} Respuestas</h2>
                
                @forelse($question->answers as $answer)
                <div class="answer {{ $answer->is_accepted ? 'accepted' : '' }}">
                    <div class="answer-vote">
                        @if($answer->is_accepted)
                        <span class="accepted-badge">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Respuesta aceptada
                        </span>
                        @endif
                    </div>
                    <div class="answer-content">
                        <p>{{ $answer->content }}</p>
                        <div class="answer-meta">
                            <span>{{ $answer->user->name }}</span>
                            <span>{{ $answer->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <p class="no-answers">Aún no hay respuestas. ¡Sé el primero en responder!</p>
                @endforelse
            </div>

            @auth
            <div class="answer-form">
                <h3>Tu Respuesta</h3>
                <form action="{{ route('forum.answer', $question) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" rows="5" required placeholder="Escribe tu respuesta..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-accent">Publicar Respuesta</button>
                </form>
            </div>
            @else
            <div class="login-prompt">
                <p>Debes <a href="{{ route('login') }}">iniciar sesión</a> para responder.</p>
            </div>
            @endauth
        </div>
    </div>
</section>
@endsection
