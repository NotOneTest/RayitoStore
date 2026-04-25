# Rayito Store - Tienda Virtual de Videojuegos

Una tienda virtual de videojuegos creada con Laravel, MySQL, Blade y Vite.

## Requisitos

- PHP 8.2+
- Composer
- Node.js 18+
- MySQL 5.7+
- Laragon (Apache + MySQL)

## Instalación

### 1. Clonar el proyecto
```bash
git clone <repository-url> rayito-store
cd rayito-store
```

### 2. Instalar dependencias de Composer
```bash
composer install
```

### 3. Instalar dependencias de Node.js
```bash
npm install
npm run dev
```

### 4. Configurar el archivo .env
```bash
cp .env.example .env
```

Editar `.env` con tu configuración de base de datos:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rayito_store
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generar clave de aplicación
```bash
php artisan key:generate
```

### 6. Crear base de datos
En MySQL (via phpMyAdmin o CLI):
```sql
CREATE DATABASE rayito_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 7. Ejecutar migraciones y seeders
```bash
php artisan migrate
php artisan db:seed
```

### 8. Enlace simbólico para almacenamiento
```bash
php artisan storage:link
```

### 9. Iniciar el servidor
```bash
php artisan serve
```

O usando Laragon, simplemente visita: `http://rayito-store.test`

## Credenciales de acceso

### Administrador
- Email: admin@rayitostore.com
- Contraseña: password

### Usuario Demo
- Email: demo@rayitostore.com
- Contraseña: password

## Características

- Diseño minimalista con estética gamer
- Colores: azul oscuro, amarillo, negro y blanco
- Página principal con banner promocional
- Catálogo de productos con filtros
- Carrito de compras con promoción 2x1
- Sistema de checkout
- Historial de pedidos
- Foro de preguntas
- Páginas informativas

## Estructura del proyecto

```
├── app/
│   ├── Http/Controllers/    # Controladores
│   └── Models/            # Modelos Eloquent
├── database/
│   ├── migrations/        # Migraciones de BD
│   └── seeders/           # Datos de prueba
├── resources/
│   └── views/             # Vistas Blade
├── routes/
│   ├── web.php           # Rutas web
│   └── api.php          # Rutas API
└── public/
    ├── css/             # Estilos CSS
    └── js/              # JavaScript
```

## Promociones

- **Compra 2 juegos y ahorra 40%**: Se aplica automáticamente cuando agregas 2 o más productos al carrito.

## Tecnologías

- **Backend**: Laravel 11
- **Frontend**: Blade + Vite
- **Base de datos**: MySQL
- **Estilos**: CSS personalizado con diseño gamer
- **Servidor**: Apache (Laragon)

## Licencia

MIT License
