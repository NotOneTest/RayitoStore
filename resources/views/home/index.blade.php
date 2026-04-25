@extends('layouts.app')

@section('title', 'Rayito Store - Tu Tienda de Videojuegos')

@section('content')
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-badge">Promoción Especial</div>
        <h1 class="hero-title">Compra 2 Juegos y <span class="highlight">Ahorra 40%</span></h1>
        <p class="hero-text">Los mejores videojuegos digitales a precios increíbles. Plataformas PC, PlayStation, Xbox y más.</p>
        <div class="hero-actions">
            <a href="{{ route('products.index') }}" class="btn btn-accent btn-lg">Ver Juegos</a>
            <a href="{{ route('info.how-to-buy') }}" class="btn btn-outline btn-lg">Cómo Comprar</a>
        </div>
    </div>
    <div class="hero-decoration">
        <div class="glow glow-1"></div>
        <div class="glow glow-2"></div>
    </div>
</section>

@if($search && $products)
<section class="section">
    <div class="container">
        <h2 class="section-title">Resultados de búsqueda: "{{ $search }}"</h2>
        <div class="products-grid">
            @forelse($products as $product)
                <x-product-card :product="$product" />
            @empty
                <p class="no-results">No se encontraron productos.</p>
            @endforelse
        </div>
        <div class="pagination-wrapper">
            {{ $products->links() }}
        </div>
    </div>
</section>
@else

@if($featuredProducts->count() > 0)
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Juegos Destacados</h2>
            <a href="{{ route('products.index') }}" class="section-link">Ver todos</a>
        </div>
        <div class="products-grid">
            @foreach($featuredProducts as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
@endif

@if($saleProducts->count() > 0)
<section class="section section-sale">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Ofertas</h2>
            <a href="{{ route('products.index', ['sort' => 'on_sale']) }}" class="section-link">Ver todos</a>
        </div>
        <div class="products-grid">
            @foreach($saleProducts as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
@endif

@if($newProducts->count() > 0)
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Nuevos Lanzamientos</h2>
            <a href="{{ route('products.index', ['sort' => 'newest']) }}" class="section-link">Ver todos</a>
        </div>
        <div class="products-grid">
            @foreach($newProducts as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
@endif

@if($categories->count() > 0)
<section class="section">
    <div class="container">
        <h2 class="section-title">Categorías</h2>
        <div class="categories-grid">
            @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="category-card">
                <div class="category-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                        <circle cx="8" cy="12" r="2"></circle>
                    </svg>
                </div>
                <h3 class="category-name">{{ $category->name }}</h3>
                <span class="category-count">{{ $category->products_count }} juegos</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="features-section">
    <div class="container">
        <div class="features-grid">
            <div class="feature">
                <div class="feature-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3 class="feature-title">Compra Segura</h3>
                <p class="feature-text">100% seguro y confiable</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="feature-title">Entrega Inmediata</h3>
                <p class="feature-text">Recibe tu juego al instante</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <h3 class="feature-title">Soporte 24/7</h3>
                <p class="feature-text">Siempre estamos para ayudarte</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                        <line x1="7" y1="7" x2="7.01" y2="7"></line>
                    </svg>
                </div>
                <h3 class="feature-title">Mejores Precios</h3>
                <p class="feature-text">Las mejores ofertas del mercado</p>
            </div>
        </div>
    </div>
</section>
@endif

@endsection
