<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Verificación de Laravel ===\n\n";

// Verificar bootstrap
echo "1. Bootstrap: ";
if (file_exists(__DIR__.'/bootstrap/app.php')) {
    echo "OK\n";
} else {
    echo "FALLO - No existe bootstrap/app.php\n";
    exit(1);
}

// Verificar vendor
echo "2. Vendor: ";
if (file_exists(__DIR__.'/vendor/autoload.php')) {
    echo "OK\n";
} else {
    echo "FALLO - No existe vendor/autoload.php\n";
    exit(1);
}

// Verificar .env
echo "3. Archivo .env: ";
if (file_exists(__DIR__.'/.env')) {
    echo "OK\n";
} else {
    echo "FALLO - No existe .env\n";
    exit(1);
}

// Verificar key de aplicación
echo "4. APP_KEY: ";
$key = env('APP_KEY');
if ($key && strpos($key, 'base64:') === 0) {
    echo "OK ($key)\n";
} else {
    echo "FALLO - APP_KEY no está configurada correctamente\n";
    exit(1);
}

// Verificar conexión a base de datos
echo "5. Base de datos: ";
try {
    $pdo = DB::connection()->getPdo();
    echo "OK\n";
} catch (\Exception $e) {
    echo "FALLO - " . $e->getMessage() . "\n";
    exit(1);
}

// Verificar que se pueden obtener productos
echo "6. Productos en BD: ";
try {
    $count = App\Models\Product::count();
    echo "OK ($count productos)\n";
} catch (\Exception $e) {
    echo "FALLO - " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n=== Verificación completada exitosamente ===\n";
echo "El servidor web (Apache/Nginx) debe estar corriendo.\n";
echo "Abre http://proyecto_negocios_electronicos.test en tu navegador.\n";
