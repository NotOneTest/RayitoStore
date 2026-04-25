@extends('layouts.app')

@section('title', 'Mis Pedidos - Rayito Store')

@section('content')
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Mis Pedidos</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        @if($orders->count() > 0)
        <div class="orders-list">
            @foreach($orders as $order)
            <div class="order-card">
                <div class="order-header">
                    <div class="order-info">
                        <span class="order-number">{{ $order->order_number }}</span>
                        <span class="order-date">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                </div>
                <div class="order-body">
                    <p>{{ $order->items->count() }} producto(s)</p>
                    <p class="order-total">Total: ${{ number_format($order->total, 2) }}</p>
                </div>
                <div class="order-footer">
                    <a href="{{ route('checkout.order-detail', $order) }}" class="btn btn-sm btn-outline">Ver Detalles</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-wrapper">
            {{ $orders->links() }}
        </div>
        @else
        <div class="empty-state">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            <h3>No tienes pedidos aún</h3>
            <p>¡Empieza a comprar los mejores videojuegos!</p>
            <a href="{{ route('products.index') }}" class="btn btn-accent">Ver Juegos</a>
        </div>
        @endif
    </div>
</section>
@endsection
