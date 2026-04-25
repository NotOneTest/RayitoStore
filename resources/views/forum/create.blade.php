@extends('layouts.app')

@section('title', 'Nueva Pregunta - Rayito Store')

@section('content')
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Nueva Pregunta</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="form-container">
            <form action="{{ route('forum.store') }}" method="POST" class="forum-form">
                @csrf
                <div class="form-group">
                    <label for="title">Título de tu pregunta</label>
                    <input type="text" id="title" name="title" required placeholder="¿Cuál es tu pregunta?">
                </div>
                <div class="form-group">
                    <label for="content">Descripción</label>
                    <textarea id="content" name="content" rows="8" required 
                              placeholder="Describe tu pregunta en detalle..."></textarea>
                </div>
                <div class="form-actions">
                    <a href="{{ route('forum.index') }}" class="btn btn-outline">Cancelar</a>
                    <button type="submit" class="btn btn-accent">Publicar Pregunta</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
