@extends('layouts.app')

@section('title', 'Foro - Rayito Store')

@section('content')
<div class="page-hero">
    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=1920&q=80" alt="Forum" class="page-hero-image">
    <div class="page-hero-overlay">
        <h1 class="page-hero-title">Foro de la Comunidad</h1>
        <p class="page-hero-subtitle">Pregunta, responde y comparte con otros gamers</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="forum-header">
            <a href="{{ route('forum.create') }}" class="btn btn-accent">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Nueva Pregunta
            </a>
        </div>

        @if($questions->count() > 0)
        <div class="questions-list">
            @foreach($questions as $question)
            <div class="question-card">
                <div class="question-votes">
                    <span class="vote-count">{{ $question->answers->count() }}</span>
                    <span class="vote-label">respuestas</span>
                </div>
                <div class="question-content">
                    <h3 class="question-title">
                        <a href="{{ route('forum.show', $question) }}">{{ $question->title }}</a>
                    </h3>
                    <p class="question-excerpt">{{ $question->excerpt }}</p>
                    <div class="question-meta">
                        <span class="question-author">Por {{ $question->user->name }}</span>
                        <span class="question-date">{{ $question->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-wrapper">
            {{ $questions->links() }}
        </div>
        @else
        <div class="empty-state">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <h3>No hay preguntas aún</h3>
            <p>¡Sé el primero en hacer una pregunta!</p>
            <a href="{{ route('forum.create') }}" class="btn btn-accent">Crear Pregunta</a>
        </div>
        @endif
    </div>
</section>
@endsection
