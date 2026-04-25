@extends('layouts.app')

@section('title', 'Pedido Confirmado - Rayito Store')

@section('content')
<section class="page-header success-header">
    <div class="container">
        <div class="success-icon">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>
        <h1 class="page-title">¡Pedido Confirmado!</h1>
        <p class="page-subtitle">Gracias por tu compra. Tu pedido ha sido procesado exitosamente.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="order-success-content">
            <div class="order-details-card">
                <h2>Detalles del Pedido</h2>
                <div class="order-info">
                    <p><strong>Número de Pedido:</strong> {{ $order->order_number }}</p>
                    <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Estado:</strong> <span class="badge badge-success">{{ ucfirst($order->status) }}</span></p>
                </div>
                
                <h3>Productos</h3>
                @foreach($order->items as $item)
                <div class="order-item">
                    <span>{{ $item->product->name }}</span>
                    <span>x{{ $item->quantity }}</span>
                    <span>${{ number_format($item->subtotal, 2) }}</span>
                </div>
                @endforeach
                
                <div class="order-totals">
                    <div class="order-total-row">
                        <span>Subtotal:</span>
                        <span>${{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    @if($order->discount > 0)
                    <div class="order-total-row discount">
                        <span>Descuento:</span>
                        <span>-${{ number_format($order->discount, 2) }}</span>
                    </div>
                    @endif
                    <div class="order-total-row total">
                        <span>Total:</span>
                        <span>${{ number_format($order->total, 2) }}</span>
                    </div>
                </div>
            </div>
            
            <div class="success-actions">
                <a href="{{ route('checkout.orders') }}" class="btn btn-primary">Ver Mis Pedidos</a>
                <a href="{{ route('products.index') }}" class="btn btn-accent">Seguir Comprando</a>
            </div>
        </div>
    </div>
</section>
@endsection
