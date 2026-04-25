@extends('layouts.app')

@section('title', 'Carrito de Compras - Rayito Store')

@section('content')
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Carrito de Compras</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        @if($cart && $cart->items->count() > 0)
        <div class="cart-layout">
            <div class="cart-items">
                @foreach($cart->items as $item)
                <div class="cart-item" data-item-id="{{ $item->id }}">
                    <div class="cart-item-image">
                        @if($item->product->image)
                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}">
                        @else
                            <div class="placeholder">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                    <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="cart-item-info">
                        <h3 class="cart-item-title">
                            <a href="{{ route('products.show', $item->product->slug) }}">
                                {{ $item->product->name }}
                            </a>
                        </h3>
                        <p class="cart-item-platform">{{ $item->product->platform }}</p>
                        <p class="cart-item-price">${{ number_format($item->unit_price, 2) }} c/u</p>
                    </div>
                    <div class="cart-item-quantity">
                        <form action="{{ route('cart.update', $item) }}" method="POST" class="quantity-form">
                            @csrf
                            @method('PUT')
                            <button type="button" class="qty-btn qty-minus" data-item="{{ $item->id }}">-</button>
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="10" class="qty-input">
                            <button type="button" class="qty-btn qty-plus" data-item="{{ $item->id }}">+</button>
                        </form>
                    </div>
                    <div class="cart-item-subtotal">
                        <span class="subtotal-label">Subtotal:</span>
                        <span class="subtotal-value" id="subtotal-{{ $item->id }}">${{ number_format($item->subtotal, 2) }}</span>
                    </div>
                    <form action="{{ route('cart.remove', $item) }}" method="POST" class="cart-item-remove">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn" title="Eliminar">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </form>
                </div>
                @endforeach

                <form action="{{ route('cart.clear') }}" method="POST" class="cart-actions">
                    @csrf
                    <button type="submit" class="btn btn-outline">Vaciar Carrito</button>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Seguir Comprando</a>
                </form>
            </div>

            <aside class="cart-summary">
                <h2 class="summary-title">Resumen del Pedido</h2>
                
                <div class="summary-row">
                    <span>Subtotal ({{ $cart->items_count }} items)</span>
                    <span id="cart-subtotal">${{ number_format($cart->subtotal, 2) }}</span>
                </div>

                @if($cart->discount > 0)
                <div class="summary-row discount">
                    <span>Descuento (2x1)</span>
                    <span id="cart-discount">-${{ number_format($cart->discount, 2) }}</span>
                </div>
                @endif

                <div class="summary-row total">
                    <span>Total</span>
                    <span id="cart-total">${{ number_format($cart->total, 2) }}</span>
                </div>

                @if($cart->items_count >= 2 && $cart->discount == 0)
                <div class="promo-notice">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    ¡Compra 2 juegos y ahorra 40%!
                </div>
                @endif

                @auth
                    <a href="{{ route('checkout.index') }}" class="btn btn-accent btn-block btn-lg">
                        Proceder al Pago
                    </a>
                @else
                    <div class="login-prompt">
                        <p>Debes iniciar sesión para continuar</p>
                        <a href="{{ route('login') }}" class="btn btn-accent btn-block">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-outline btn-block">Crear Cuenta</a>
                    </div>
                @endauth
            </aside>
        </div>
        @else
        <div class="empty-cart">
            <svg width="96" height="96" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <h2>Tu carrito está vacío</h2>
            <p>¡Explora nuestros juegos y añade tus favoritos!</p>
            <a href="{{ route('products.index') }}" class="btn btn-accent btn-lg">Ver Juegos</a>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.qty-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const itemId = this.dataset.item;
        const input = this.closest('.quantity-form').querySelector('input[name="quantity"]');
        let value = parseInt(input.value);
        
        if (this.classList.contains('qty-plus') && value < 10) {
            value++;
        } else if (this.classList.contains('qty-minus') && value > 1) {
            value--;
        }
        
        input.value = value;
        input.form.submit();
    });
});
</script>
@endpush
