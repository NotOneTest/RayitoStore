@extends('layouts.app')

@section('title', 'Contáctanos - Rayito Store')

@section('content')
<div class="page-hero">
    <img src="https://t4.ftcdn.net/jpg/05/24/03/99/360_F_524039911_SJfffOLKTk1HZvTPyF9vv1FN6oCipyVi.jpg" alt="Contact" class="page-hero-image">
    <div class="page-hero-overlay">
        <h1 class="page-hero-title">Contáctanos</h1>
        <p class="page-hero-subtitle">¿Tienes dudas? ¡Estamos para ayudarte!</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="contact-layout">
            <div class="contact-info">
                <h2>¿Tienes alguna pregunta?</h2>
                <p>Nuestro equipo de soporte está disponible 24/7 para ayudarte con cualquier consulta sobre juegos, compras o lo que necesites.</p>
                
                <div class="contact-methods">
                    <div class="contact-method">
                        <div class="method-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p>info@rayitostore.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-method">
                        <div class="method-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72"></path>
                            </svg>
                        </div>
                        <div>
                            <h4>Teléfono / WhatsApp</h4>
                            <p>+51 974 441 535</p>
                        </div>
                    </div>
                    
                    <div class="contact-method">
                        <div class="method-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h4>Horario</h4>
                            <p>24 horas, 7 días a la semana</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="contact-form-wrapper">
                <div class="form-header">
                    <h3>Envíanos un mensaje</h3>
                    <p>Completa el formulario y te responderemos lo antes posible</p>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <form action="{{ route('info.contact') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" required placeholder="Tu nombre completo">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" id="email" name="email" required placeholder="tu@email.com">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" id="phone" name="phone" placeholder="+51 XXX XXX XXX">
                        </div>
                        <div class="form-group">
                            <label for="subject">Asunto</label>
                            <select id="subject" name="subject" required>
                                <option value="">Selecciona una opción...</option>
                                <option value="consulta">Consulta sobre un juego</option>
                                <option value="compra">Problema con mi compra</option>
                                <option value="soporte">Soporte técnico</option>
                                <option value="pago">Problemas de pago</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Tu Mensaje</label>
                        <textarea id="message" name="message" rows="5" required 
                                  placeholder="Cuéntanos en qué podemos ayudarte..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-accent btn-block btn-lg">
                        Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
