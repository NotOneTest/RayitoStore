<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Rayito Store - Tu Tienda de Videojuegos')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/rayito.css') }}?v=4">
    <style>
        /* ESTILOS FORZADOS PARA INPUTS - RAYITO STORE */
        .form-group {
            margin-bottom: 12px !important;
        }
        .form-group input,
        .form-group textarea,
        .form-group select,
        .auth-form input,
        .auth-form textarea,
        .auth-form select,
        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 2px solid rgba(255, 193, 7, 0.5) !important;
            border-radius: 10px !important;
            color: #ffffff !important;
            padding: 10px 14px !important;
            font-size: 14px !important;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2) !important;
            outline: none !important;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus,
        .auth-form input:focus,
        .auth-form textarea:focus,
        .auth-form select:focus,
        .contact-form input:focus,
        .contact-form textarea:focus,
        .contact-form select:focus {
            border-color: #FFC107 !important;
            background: rgba(255, 193, 7, 0.1) !important;
            box-shadow: 0 0 15px rgba(255, 193, 7, 0.3) !important;
        }
        input[type="checkbox"] {
            appearance: none !important;
            width: 18px !important;
            height: 18px !important;
            background: rgba(255, 255, 255, 0.05) !important;
            border: 2px solid rgba(255, 193, 7, 0.5) !important;
            border-radius: 4px !important;
            cursor: pointer !important;
            position: relative !important;
        }
        input[type="checkbox"]:checked {
            background: #FFC107 !important;
            border-color: #FFC107 !important;
        }
        input[type="checkbox"]:checked::after {
            content: '' !important;
            position: absolute !important;
            top: 2px !important;
            left: 5px !important;
            width: 4px !important;
            height: 8px !important;
            border: solid #0a0e17 !important;
            border-width: 0 2px 2px 0 !important;
            transform: rotate(45deg) !important;
        }
        .quantity-input,
        .qty-input {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 2px solid rgba(255, 193, 7, 0.5) !important;
            border-radius: 10px !important;
            color: #ffffff !important;
            padding: 10px 12px !important;
            text-align: center !important;
            font-family: 'Orbitron', sans-serif !important;
            font-weight: 600 !important;
            width: 90px !important;
        }
        .qty-btn {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 2px solid rgba(255, 193, 7, 0.5) !important;
            border-radius: 8px !important;
            color: #ffffff !important;
        }
        .qty-btn:hover {
            border-color: #FFC107 !important;
            background: rgba(255, 193, 7, 0.15) !important;
        }
        input::placeholder,
        textarea::placeholder {
            color: rgba(255, 255, 255, 0.4) !important;
        }
        .auth-form .btn-block,
        .contact-form .btn-block {
            width: auto !important;
            padding: 12px 35px !important;
            display: inline-block !important;
        }
        body {
            padding-left: 15px !important;
            padding-right: 15px !important;
        }
        .page-hero {
            position: relative;
            height: 280px;
            overflow: hidden;
            margin-bottom: 0;
        }
        .page-hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .page-hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .page-hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(10, 14, 23, 0.85) 0%, rgba(10, 14, 23, 0.6) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .page-hero-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }
        .page-hero-subtitle {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.8);
        }
        .auth-section {
            min-height: calc(100vh - 200px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, rgba(10, 14, 23, 0.95) 0%, rgba(10, 14, 23, 0.8) 100%), 
                        url('https://images.unsplash.com/photo-1542751371-adc38448a05e?w=1920&q=80') center/cover no-repeat;
        }
        .auth-container {
            width: 100%;
            max-width: 450px;
            background: rgba(19, 27, 46, 0.95);
            padding: 40px;
            border-radius: 20px;
            border: 2px solid rgba(247, 197, 45, 0.3);
            box-shadow: 0 0 40px rgba(247, 197, 45, 0.15);
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 1;
        }
        .product-detail-info {
            position: relative;
        }
        .product-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }
        .product-detail-title {
            position: relative;
            z-index: 0;
            margin-bottom: 10px;
        }
        .badge-platform {
            position: relative;
            z-index: 1;
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    <span class="logo-icon">R</span>
                    <span class="logo-text">RAYITO <span class="highlight">STORE</span></span>
                </a>
                
                <nav class="nav">
                    <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                    <a href="{{ route('products.index') }}" class="nav-link">Juegos</a>
                    <a href="{{ route('forum.index') }}" class="nav-link">Foro</a>
                    <a href="{{ route('info.about') }}" class="nav-link">Nosotros</a>
                    <a href="{{ route('info.contact') }}" class="nav-link">Contacto</a>
                </nav>

                <div class="header-actions">
                    <form action="{{ route('home') }}" method="GET" class="search-form">
                        <input type="text" name="search" placeholder="Buscar juegos..." class="search-input">
                        <button type="submit" class="search-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="M21 21l-4.35-4.35"></path>
                            </svg>
                        </button>
                    </form>

                    <a href="{{ route('cart.index') }}" class="cart-btn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="cart-count" id="cart-count">0</span>
                    </a>

                    @auth
                        <div class="user-menu">
                            <button class="user-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </button>
                            <div class="user-dropdown">
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <a href="{{ route('checkout.orders') }}" class="dropdown-item">Mis Pedidos</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Ingresar</a>
                    @endauth
                </div>

                <button class="mobile-menu-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3 class="footer-title">Rayito Store</h3>
                    <p class="footer-text">Tu tienda de videojuegos favorita. Los mejores precios en juegos digitales.</p>
                </div>
                <div class="footer-section">
                    <h4 class="footer-subtitle">Enlaces</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Inicio</a></li>
                        <li><a href="{{ route('products.index') }}">Juegos</a></li>
                        <li><a href="{{ route('info.about') }}">Sobre Nosotros</a></li>
                        <li><a href="{{ route('info.contact') }}">Contacto</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4 class="footer-subtitle">Categorías</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('products.index', ['category' => 'accion']) }}">Acción</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'aventura']) }}">Aventura</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'rpg']) }}">RPG</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'shooter']) }}">Shooter</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4 class="footer-subtitle">Contacto</h4>
                    <ul class="footer-links">
                        <li>📧 Email: info@rayitostore.com</li>
                        <li>📱 Tel: +51 974 441 535</li>
                        <li>🕐 Horario: 24/7 Online</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Rayito Store. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
