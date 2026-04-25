@extends('layouts.app')

@section('title', 'Productos - Rayito Store')

@section('content')
<div class="page-hero">
    <img src="https://wallpaperaccess.com/full/774615.jpg" alt="Games" class="page-hero-image">
    <div class="page-hero-overlay">
        <h1 class="page-hero-title">Nuestros Juegos</h1>
        <p class="page-hero-subtitle">Encuentra los mejores videojuegos digitales</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="products-layout">
            <aside class="filters-sidebar">
                <div class="filter-section">
                    <h3 class="filter-title">Categorías</h3>
                    <ul class="filter-list">
                        <li>
                            <a href="{{ route('products.index') }}" class="filter-link {{ !request('category') ? 'active' : '' }}">
                                Todos los juegos
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}" 
                               class="filter-link {{ request('category') == $category->slug ? 'active' : '' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-section">
                    <h3 class="filter-title">Plataforma</h3>
                    <ul class="filter-list">
                        @foreach($platforms as $platform)
                        <li>
                            <a href="{{ route('products.index', array_merge(request()->except('platform'), ['platform' => $platform])) }}"
                               class="filter-link {{ request('platform') == $platform ? 'active' : '' }}">
                                {{ $platform }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-section">
                    <h3 class="filter-title">Etiquetas</h3>
                    <div class="tags-filter">
                        @foreach($tags as $tag)
                        <a href="{{ route('products.index', ['tag' => $tag->slug]) }}"
                           class="tag-chip {{ request('tag') == $tag->slug ? 'active' : '' }}">
                            {{ $tag->name }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </aside>

            <div class="products-main">
                <div class="products-toolbar">
                    <p class="results-count">{{ $products->total() }} juegos encontrados</p>
                    <select class="sort-select" onchange="window.location.href=this.value">
                        <option value="{{ route('products.index', array_merge(request()->except('sort'), ['sort' => 'newest'])) }}" 
                                {{ request('sort') == 'newest' ? 'selected' : '' }}>
                            Más Recientes
                        </option>
                        <option value="{{ route('products.index', array_merge(request()->except('sort'), ['sort' => 'price_asc'])) }}"
                                {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                            Precio: Menor a Mayor
                        </option>
                        <option value="{{ route('products.index', array_merge(request()->except('sort'), ['sort' => 'price_desc'])) }}"
                                {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                            Precio: Mayor a Menor
                        </option>
                    </select>
                </div>

                @if($products->count() > 0)
                <div class="products-grid">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
                <div class="pagination-container">
                    <div class="pagination-info">
                        Mostrando {{ $products->firstItem() }} a {{ $products->lastItem() }} de {{ $products->total() }} resultados
                    </div>
                    <div class="pagination-wrapper">
                        {{ $products->links() }}
                    </div>
                </div>
                @else
                <div class="empty-state">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                    <h3>No se encontraron productos</h3>
                    <p>Intenta con otros filtros o categorías</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Ver todos los juegos</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
