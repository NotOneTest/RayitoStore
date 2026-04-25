@extends('layouts.app')

@section('title', 'Checkout - Rayito Store')

@section('content')
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Finalizar Compra</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <form action="{{ route('checkout.process') }}" method="POST" class="checkout-form">
            @csrf
            <div class="checkout-layout">
                <div class="checkout-main">
                    <h2 class="checkout-section-title">Información de Envío</h2>
                    
                    <div class="form-group">
                        <label for="shipping_address">Dirección de Entrega</label>
                        <textarea id="shipping_address" name="shipping_address" rows="3" required
                                  placeholder="Ingresa tu dirección de entrega">{{ old('shipping_address', auth()->user()->address ?? '') }}</textarea>
                        @error('shipping_address')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="payment-method">
                        <h3>Método de Pago</h3>
                        <div class="payment-option selected">
                            <input type="radio" name="payment_method" value="simulated" id="payment_simulated" checked>
                            <label for="payment_simulated">
                                <span class="payment-icon">💳</span>
                                <span class="payment-name">Pago Simulado</span>
                                <span class="payment-desc">Pago de prueba - No se cobrarán datos reales</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <aside class="checkout-summary">
                    <h2 class="summary-title">Resumen del Pedido</h2>
                    
                    @foreach($cart->items as $item)
                    <div class="order-item">
                        <span class="order-item-name">{{ $item->product->name }}</span>
                        <span class="order-item-qty">x{{ $item->quantity }}</span>
                        <span class="order-item-price">${{ number_format($item->subtotal, 2) }}</span>
                    </div>
                    @endforeach
                    
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>${{ number_format($cart->subtotal, 2) }}</span>
                    </div>
                    
                    @if($cart->discount > 0)
                    <div class="summary-row discount">
                        <span>Descuento</span>
                        <span>-${{ number_format($cart->discount, 2) }}</span>
                    </div>
                    @endif
                    
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>${{ number_format($cart->total, 2) }}</span>
                    </div>
                    
                    <button type="submit" class="btn btn-accent btn-block btn-lg">
                        Completar Pedido
                    </button>
                    
                    <p class="secure-badge">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        Compra 100% segura
                    </p>
                </aside>
            </div>
        </form>
    </div>
</section>
@endsection
