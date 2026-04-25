@extends('layouts.app')

@section('title', 'Sobre Nosotros - Rayito Store')

@section('content')
<div class="page-hero">
    <img src="https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=1920&q=80" alt="About Us" class="page-hero-image">
    <div class="page-hero-overlay">
        <h1 class="page-hero-title">Sobre Nosotros</h1>
        <p class="page-hero-subtitle">Tu comunidad gamer de confianza</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="info-content">
            <div class="info-block">
                <h2>Bienvenido a <span class="highlight">Rayito Store</span></h2>
                <p>Somos tu tienda de videojuegos favorita, comprometida con brindarte la mejor experiencia de compra en línea. Desde nuestra fundación, hemos trabajado incansablemente para ofrecerte los mejores títulos de videojuegos digitales a precios competitivos.</p>
                <p>En Rayito Store, no solo vendemos juegos; creamos experiencias. Nuestro equipo está formado por verdaderos gamers que entienden lo que necesitas.</p>
            </div>
            
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <h3>Seguridad Total</h3>
                    <p>Transacciones 100% seguras y protección de datos garantizada</p>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h3>Entrega Instantánea</h3>
                    <p>Recibe tu juego al instante en tu correo electrónico</p>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <h3>Soporte 24/7</h3>
                    <p>Estamos siempre disponibles para ayudarte en cada partida</p>
                </div>
            </div>
            
            <div class="stats-section">
                <div class="stat-item">
                    <span class="stat-number">10K+</span>
                    <span class="stat-label">Clientes Felices</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5K+</span>
                    <span class="stat-label">Juegos Disponibles</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99%</span>
                    <span class="stat-label">Satisfacción</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Soporte Activo</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
