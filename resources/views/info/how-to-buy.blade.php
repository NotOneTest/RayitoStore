@extends('layouts.app')

@section('title', 'Cómo Comprar - Rayito Store')

@section('content')
<div class="info-hero">
    <img src="https://images.unsplash.com/photo-1593305841991-05c297ba4575?w=1920&q=80" alt="Gaming Store" class="info-hero-image">
    <div class="info-hero-overlay">
        <h1 class="info-hero-title">Cómo Comprar</h1>
        <p class="info-hero-subtitle">Tu próxima aventura está a un clic de distancia</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="steps-container">
            <div class="step-card">
                <div class="step-icon-wrapper">
                    <div class="step-number">01</div>
                    <div class="step-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                </div>
                <h3>Regístrate o Inicia Sesión</h3>
                <p>Crea tu cuenta o inicia sesión para poder realizar tus compras y acceder a tu historial de pedidos. ¡Es gratis y rápido!</p>
                <div class="step-arrow">→</div>
            </div>
            
            <div class="step-card">
                <div class="step-icon-wrapper">
                    <div class="step-number">02</div>
                    <div class="step-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                    </div>
                </div>
                <h3>Explora Nuestro Catálogo</h3>
                <p>Navega por nuestras categorías, usa los filtros o el buscador para encontrar el juego que andas buscando. Tenemos más de 5000 títulos.</p>
                <div class="step-arrow">→</div>
            </div>
            
            <div class="step-card">
                <div class="step-icon-wrapper">
                    <div class="step-number">03</div>
                    <div class="step-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                </div>
                <h3>Agrega al Carrito</h3>
                <p>Selecciona los juegos que deseas y agrégalos a tu carrito de compras. ¡No olvides la promoción 2x1!</p>
                <div class="step-arrow">→</div>
            </div>
            
            <div class="step-card">
                <div class="step-icon-wrapper">
                    <div class="step-number">04</div>
                    <div class="step-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                    </div>
                </div>
                <h3>Finaliza tu Compra</h3>
                <p>Revisa tu carrito, verifica el descuento 2x1 y procede al checkout. Completa tus datos de envío.</p>
                <div class="step-arrow">→</div>
            </div>
            
            <div class="step-card">
                <div class="step-icon-wrapper">
                    <div class="step-number">05</div>
                    <div class="step-icon final-step">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                </div>
                <h3>¡Recibe tu Juego!</h3>
                <p>Listo! Recibirás tu juego de forma inmediata en tu correo electrónico. ¡Hora de jugar!</p>
            </div>
        </div>
        
        <div class="promo-banner">
            <div class="promo-icon">🎮</div>
            <div class="promo-content">
                <h3>¡Promoción Especial!</h3>
                <p>Compra 2 juegos y ahorra <span class="highlight">40%</span> automáticamente en tu carrito</p>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-accent">Ver Juegos</a>
        </div>
    </div>
</section>
@endsection
