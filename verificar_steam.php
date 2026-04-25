<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Product;

echo "=== Verificando imágenes de Steam ===\n\n";

$product = Product::find(2); // The Witcher 3

echo "Producto: {$product->name}\n";
echo "Imagen principal: {$product->image}\n";

// Verificar si la URL es accesible
$headers = @get_headers($product->image);
if ($headers) {
    echo "Estado HTTP: {$headers[0]}\n";
    if (strpos($headers[0], '200') !== false) {
        echo "✓ URL accesible\n";
    } else {
        echo "✗ URL NO accesible\n";
    }
} else {
    echo "✗ No se pudo verificar la URL\n";
}

echo "\nImágenes adicionales:\n";
if (is_array($product->images)) {
    foreach ($product->images as $i => $img) {
        echo "  " . ($i + 1) . ". {$img}\n";
    }
}
