<div class="product-card">
    <div class="product-image">
        @php
            $imageConfig = config('product_images.' . $product->slug);
            $imageUrl = $imageConfig['image'] ?? $product->image;
        @endphp
        
        @if($imageUrl)
            <img src="{{ $imageUrl }}" alt="{{ $product->name }}" style="width: 100%; height: auto; object-fit: cover;">
        @else
            <div class="product-placeholder">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                    <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                    <circle cx="8" cy="12" r="2"></circle>
                    <line x1="14" y1="10" x2="18" y2="10"></line>
                    <line x1="14" y1="14" x2="18" y2="14"></line>
                </svg>
            </div>
        @endif
        
        @if($product->is_new)
            <span class="badge badge-new">Nuevo</span>
        @endif
        
        @if($product->hasDiscount())
            <span class="badge badge-sale">-{{ $product->discount_percent }}%</span>
        @endif
        
        <div class="product-overlay">
            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">Ver Detalles</a>
            <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-accent">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    Agregar
                </button>
            </form>
        </div>
    </div>
    
    <div class="product-info">
        <span class="product-platform">{{ $product->platform }}</span>
        <h3 class="product-title">
            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
        </h3>
        <div class="product-price">
            @if($product->hasDiscount())
                <span class="price-original">${{ number_format($product->price, 2) }}</span>
                <span class="price-current">${{ number_format($product->final_price, 2) }}</span>
            @else
                <span class="price-current">${{ number_format($product->price, 2) }}</span>
            @endif
        </div>
    </div>
</div>
