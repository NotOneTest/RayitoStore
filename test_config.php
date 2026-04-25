<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Verificando config/product_images.php ===\n\n";

$config = config('product_images');

if (!$config) {
    echo "ERROR: No se pudo cargar la configuración\n";
    exit(1);
}

echo "Config cargada correctamente\n\n";

// Verificar the-witcher-3
if (isset($config['the-witcher-3'])) {
    echo "✓ the-witcher-3 encontrado\n";
    $witcher = $config['the-witcher-3'];
    echo "  Image: " . ($witcher['image'] ?? 'N/A') . "\n";
    echo "  Images count: " . (isset($witcher['images']) ? count($witcher['images']) : 0) . "\n";
} else {
    echo "✗ the-witcher-3 NO encontrado\n";
    echo "  Keys disponibles: " . implode(', ', array_keys($config)) . "\n";
}

// Verificar cache buster
$cacheBuster = filemtime(__DIR__ . '/config/product_images.php');
echo "\nCache buster (timestamp): " . $cacheBuster . "\n";
echo "URL completa: " . ($config['the-witcher-3']['image'] ?? '') . "?v=" . $cacheBuster . "\n";

// Verificar que el archivo existe
$configPath = __DIR__ . '/config/product_images.php';
echo "\nArchivo existe: " . (file_exists($configPath) ? 'SI' : 'NO') . "\n";
echo "Path: " . $configPath . "\n";
