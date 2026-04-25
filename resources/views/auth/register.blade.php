@extends('layouts.app')

@section('title', 'Registrarse - Rayito Store')

@section('content')
<section class="auth-section">
    <div class="auth-container">
        <div class="auth-header">
            <h1 class="auth-title">Crear Cuenta</h1>
            <p class="auth-subtitle">¡Únete a la comunidad gamer!</p>
        </div>
        
        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="name">Nombre de Usuario</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus 
                       placeholder="Ej: ProGamer2024">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                       placeholder="tu@email.com">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="Mínimo 8 caracteres">
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required 
                       placeholder="Repite tu contraseña">
            </div>
            
            <div class="form-terms">
                <label class="checkbox-label">
                    <input type="checkbox" name="terms" required> 
                    Acepto los <a href="#" target="_blank">Términos y Condiciones</a> y la 
                    <a href="#" target="_blank">Política de Privacidad</a>
                </label>
            </div>
            
            <button type="submit" class="btn btn-accent btn-block btn-lg">
                Crear Mi Cuenta
            </button>
        </form>
        
        <div class="auth-divider">
            <span>¿Ya tienes cuenta?</span>
        </div>
        
        <p class="auth-footer">
            <a href="{{ route('login') }}">¡Inicia sesión aquí!</a>
        </p>
    </div>
</section>
@endsection
