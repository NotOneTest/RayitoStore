<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Product;

echo "=== Verificando imágenes de productos ===\n\n";

$products = Product::all();
$total = $products->count();
$conImagen = 0;
$sinImagen = 0;

foreach ($products as $product) {
    echo "ID: {$product->id} - {$product->name}\n";
    
    if ($product->image) {
        $conImagen++;
        echo "  ✓ Imagen principal: {$product->image}\n";
        
        // Verificar si la URL es accesible
        $headers = @get_headers($product->image);
        if ($headers && strpos($headers[0], '200') !== false) {
            echo "    → URL válida (200 OK)\n";
        } else {
            echo "    → URL inválida o no accesible\n";
        }
    } else {
        $sinImagen++;
        echo "  ✗ Sin imagen principal\n";
    }
    
    if (is_array($product->images) && count($product->images) > 0) {
        echo "  Imágenes adicionales (" . count($product->images) . "):\n";
        foreach ($product->images as $i => $img) {
            echo "    " . ($i + 1) . ". {$img}\n";
        }
    }
    
    echo "\n";
}

echo "=== Resumen ===\n";
echo "Total de productos: {$total}\n";
echo "Con imagen: {$conImagen}\n";
echo "Sin imagen: {$sinImagen}\n";
