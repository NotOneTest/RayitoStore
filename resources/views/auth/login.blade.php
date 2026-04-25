@extends('layouts.app')

@section('title', 'Iniciar Sesión - Rayito Store')

@section('content')
<section class="auth-section">
    <div class="auth-container">
        <div class="auth-header">
            <h1 class="auth-title">Iniciar Sesión</h1>
            <p class="auth-subtitle">¡Bienvenido de vuelta, Player!</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus 
                       placeholder="tu@email.com">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group-inline">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember"> Recordarme en este dispositivo
                </label>
            </div>
            
            <button type="submit" class="btn btn-accent btn-block btn-lg">
                Iniciar Sesión
            </button>
        </form>
        
        <div class="auth-divider">
            <span>¿Nuevo en Rayito?</span>
        </div>
        
        <p class="auth-footer">
            ¿No tienes cuenta? <a href="{{ route('register') }}">¡Regístrate aquí!</a>
        </p>
    </div>
</section>
@endsection
