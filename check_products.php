<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Product;

echo "=== Verificando todos los productos ===\n\n";

$products = Product::all();

foreach ($products as $product) {
    echo "ID: {$product->id} - {$product->name}\n";
    echo "  Image: " . ($product->image ? $product->image : "VACÍO") . "\n";
    echo "  Images: " . (is_array($product->images) && count($product->images) > 0 ? implode(", ", $product->images) : "VACÍO") . "\n";
    echo "\n";
}
