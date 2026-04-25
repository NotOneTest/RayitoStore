@extends('layouts.app')

@section('title', $product->name . ' - Rayito Store')

@section('content')
<section class="product-detail">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Inicio</a>
            <span>/</span>
            <a href="{{ route('products.index') }}">Juegos</a>
            <span>/</span>
            <a href="{{ route('products.index', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a>
            <span>/</span>
            <span class="current">{{ $product->name }}</span>
        </div>

        <div class="product-detail-grid">
            <div class="product-gallery">
                @php
                    $imageConfig = config('product_images.' . $product->slug);
                    $imageUrl = $imageConfig['image'] ?? $product->image;
                    $imagesArray = $imageConfig['images'] ?? ($product->images ?? []);
                @endphp
                
                @if($imageUrl)
                    <img id="main-image" src="{{ $imageUrl }}" alt="{{ $product->name }}" class="product-main-image" style="width: 100%; height: auto;">
                @else
                    <div class="product-image-placeholder">
                        <svg width="128" height="128" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                            <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                            <circle cx="8" cy="12" r="2"></circle>
                        </svg>
                    </div>
                @endif

                @if(count($imagesArray) > 0)
                <div class="product-thumbnails">
                    @foreach($imagesArray as $index => $image)
                    <img src="{{ $image }}" alt="{{ $product->name }}" class="thumbnail" onclick="changeImage('{{ $image }}')">
                    @endforeach
                </div>
                @endif
            </div>
            
            <script>
                function changeImage(url) {
                    document.getElementById('main-image').src = url;
                }
            </script>

            <div class="product-detail-info">
                <div class="product-badges">
                    @if($product->is_new)
                        <span class="badge badge-new">Nuevo</span>
                    @endif
                    @if($product->hasDiscount())
                        <span class="badge badge-sale">-{{ $product->discount_percent }}%</span>
                    @endif
                    <span class="badge badge-platform">{{ $product->platform }}</span>
                </div>

                <h1 class="product-detail-title">{{ $product->name }}</h1>
                
                <p class="product-sku">SKU: {{ $product->sku }}</p>

                <div class="product-detail-price">
                    @if($product->hasDiscount())
                        <span class="price-old">${{ number_format($product->price, 2) }}</span>
                        <span class="price-current">${{ number_format($product->final_price, 2) }}</span>
                        <span class="price-save">Ahorras ${{ number_format($product->discount_amount, 2) }}</span>
                    @else
                        <span class="price-current">${{ number_format($product->price, 2) }}</span>
                    @endif
                </div>

                <p class="product-description">{{ $product->description }}</p>

                @if($product->tags->count() > 0)
                <div class="product-tags">
                    @foreach($product->tags as $tag)
                        <a href="{{ route('products.index', ['tag' => $tag->slug]) }}" class="tag-chip">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="quantity-selector">
                        <label>Cantidad:</label>
                        <input type="number" name="quantity" value="1" min="1" max="10" class="quantity-input">
                    </div>
                    <button type="submit" class="btn btn-accent btn-lg btn-block">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        Agregar al Carrito
                    </button>
                </form>

                <div class="product-meta">
                    <div class="meta-item">
                        <span class="meta-label">Categoría:</span>
                        <a href="{{ route('products.index', ['category' => $product->category->slug]) }}">
                            {{ $product->category->name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($relatedProducts->count() > 0)
<section class="section">
    <div class="container">
        <h2 class="section-title">Juegos Relacionados</h2>
        <div class="products-grid">
            @foreach($relatedProducts as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
