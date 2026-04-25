@extends('layouts.app')

@section('title', 'Misión y Visión - Rayito Store')

@section('content')
<div class="info-hero">
    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=1920&q=80" alt="Gaming Vision" class="info-hero-image">
    <div class="info-hero-overlay">
        <h1 class="info-hero-title">Misión y Visión</h1>
        <p class="info-hero-subtitle">Lo que nos define y hacia dónde vamos</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="mission-vision">
            <div class="mv-block mission">
                <div class="mv-badge">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    NUESTRA MISIÓN
                </div>
                <p>Proporcionar a los gamers de todo el mundo acceso fácil y seguro a los mejores videojuegos digitales, ofreciendo precios competitivos, atención personalizada y una experiencia de compra sin complicaciones.</p>
                <p>Nos esforzamos por ser más que una tienda: queremos ser tu aliado en cada aventura virtual.</p>
                <div class="mv-features">
                    <div class="mv-feature">
                        <span class="feature-check">✓</span>
                        <span>Precios competitivos siempre</span>
                    </div>
                    <div class="mv-feature">
                        <span class="feature-check">✓</span>
                        <span>Atención al cliente 24/7</span>
                    </div>
                    <div class="mv-feature">
                        <span class="feature-check">✓</span>
                        <span>Entrega instantánea garantizada</span>
                    </div>
                </div>
            </div>
            
            <div class="mv-separator">
                <div class="separator-line"></div>
                <div class="separator-icon">⚔️</div>
                <div class="separator-line"></div>
            </div>
            
            <div class="mv-block vision">
                <div class="mv-badge vision-badge">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    NUESTRA VISIÓN
                </div>
                <p>Convertirnos en la tienda de videojuegos digitales más confiable y divertida de Latinoamérica, expandiendo nuestro catálogo y mejorando continuamente nuestros servicios para satisfacer las necesidades de la comunidad gamer.</p>
                <p>Visualizamos un futuro donde cada jugador pueda acceder a sus títulos favoritos de manera instantánea y segura.</p>
                <div class="vision-goals">
                    <div class="goal-item">
                        <div class="goal-icon">🎯</div>
                        <span>Ser el #1 en Latinoamérica</span>
                    </div>
                    <div class="goal-item">
                        <div class="goal-icon">🚀</div>
                        <span>Expandir catálogo constantemente</span>
                    </div>
                    <div class="goal-item">
                        <div class="goal-icon">💎</div>
                        <span>Innovar en experiencia de usuario</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
