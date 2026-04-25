<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Product;

$product = Product::find(2);

if ($product) {
    echo "=== Producto ID: {$product->id} ===\n";
    echo "Nombre: {$product->name}\n";
    echo "Slug: {$product->slug}\n";
    echo "Image: {$product->image}\n";
    echo "Images (array):\n";
    print_r($product->images);
} else {
    echo "Producto no encontrado\n";
}
