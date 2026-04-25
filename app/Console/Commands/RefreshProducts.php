<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class RefreshProducts extends Command
{
    protected $signature = 'app:refresh-products';
    protected $description = 'Actualiza los productos desde el ProductSeeder';

    public function handle(): void
    {
        $products = [
            [
                'name' => 'Cyber Punk 2077',
                'slug' => 'cyber-punk-2077',
                'description' => 'Entra al mundo de Night City y改造 tu personaje con augmentations cybernéticas. Una historia épica en un mundo futurista.',
                'price' => 59.99,
                'discount_percent' => 25,
                'sku' => 'RS-001',
                'platform' => 'PC',
                'category_id' => 1,
                'is_featured' => true,
                'is_on_sale' => true,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1556438064-2d7646166914?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'The Witcher 3: Wild Hunt',
                'slug' => 'the-witcher-3',
                'description' => 'Embárcate en la búsqueda más épica de tu vida. Un mundo abierto masivo lleno de monstruos, magia y decisiones morales.',
                'price' => 39.99,
                'discount_percent' => 0,
                'sku' => 'RS-002',
                'platform' => 'PC',
                'category_id' => 3,
                'is_featured' => true,
                'is_on_sale' => false,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/292030/96b8627588997030e5a6b56ca5e9944756c8f288/capsule_616x353.jpg?t=1768303991',
                'images' => [
                    'https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/292030/96b8627588997030e5a6b56ca5e9944756c8f288/capsule_616x353.jpg?t=1768303991',
                    'https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/292030/96b8627588997030e5a6b56ca5e9944756c8f288/capsule_616x353.jpg?t=1768303991',
                    'https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/292030/96b8627588997030e5a6b56ca5e9944756c8f288/capsule_616x353.jpg?t=1768303991',
                ],
            ],
            [
                'name' => 'Call of Duty: Modern Warfare III',
                'slug' => 'cod-mw3',
                'description' => 'La esperada continuación de la saga más icónica de shooters. Nuevas armas, mapas y el modo Zombies.',
                'price' => 69.99,
                'discount_percent' => 15,
                'sku' => 'RS-003',
                'platform' => 'PlayStation',
                'category_id' => 4,
                'is_featured' => true,
                'is_on_sale' => true,
                'is_new' => true,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1560419015-7c427e8ae5ba?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1518773553398-650c184e0bb3?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Elden Ring',
                'slug' => 'elden-ring',
                'description' => 'Un juego de rol de acción ambientado en un mundo creado por Hidetaka Miyazaki y George R.R. Martin.',
                'price' => 59.99,
                'discount_percent' => 0,
                'sku' => 'RS-004',
                'platform' => 'PC',
                'category_id' => 3,
                'is_featured' => true,
                'is_on_sale' => false,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'FIFA 24',
                'slug' => 'fifa-24',
                'description' => 'El mejor simulador de fútbol con gráficos de nueva generación y modos de juego mejorados.',
                'price' => 69.99,
                'discount_percent' => 30,
                'sku' => 'RS-005',
                'platform' => 'Xbox',
                'category_id' => 5,
                'is_featured' => true,
                'is_on_sale' => true,
                'is_new' => true,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1556438064-2d7646166914?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Red Dead Redemption 2',
                'slug' => 'rdr2',
                'description' => 'Vive la vida del oeste americano en este masterpiece de Rockstar. Un mundo abierto increíble.',
                'price' => 49.99,
                'discount_percent' => 20,
                'sku' => 'RS-006',
                'platform' => 'PC',
                'category_id' => 2,
                'is_featured' => true,
                'is_on_sale' => true,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1506318137071-a8e063b4bec0?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Hades',
                'slug' => 'hades',
                'description' => 'Un roguelike dungeon crawler con combat estilo rogue-lite. Escapa del inframundo una y otra vez.',
                'price' => 24.99,
                'discount_percent' => 0,
                'sku' => 'RS-007',
                'platform' => 'Nintendo',
                'category_id' => 1,
                'is_featured' => false,
                'is_on_sale' => false,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1518773553398-650c184e0bb3?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Stardew Valley',
                'slug' => 'stardew-valley',
                'description' => 'Crea tu propia granja en este encantador juego de simulación. Relájate y disfruta.',
                'price' => 14.99,
                'discount_percent' => 0,
                'sku' => 'RS-008',
                'platform' => 'Multiplataforma',
                'category_id' => 8,
                'is_featured' => false,
                'is_on_sale' => false,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'God of War Ragnarök',
                'slug' => 'god-of-war-ragnarok',
                'description' => 'Kratos y Atreus se embarcan en una búsqueda épica para salvar el Nine Realms de la destrucción.',
                'price' => 69.99,
                'discount_percent' => 0,
                'sku' => 'RS-009',
                'platform' => 'PlayStation',
                'category_id' => 2,
                'is_featured' => true,
                'is_on_sale' => false,
                'is_new' => true,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1509198397868-475647b2a1e5?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1556438064-2d7646166914?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Hollow Knight',
                'slug' => 'hollow-knight',
                'description' => 'Explora un vasto mundo interconectado lleno de criaturas peligrosas y secretos ocultos.',
                'price' => 14.99,
                'discount_percent' => 0,
                'sku' => 'RS-010',
                'platform' => 'Nintendo',
                'category_id' => 2,
                'is_featured' => false,
                'is_on_sale' => false,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1518773553398-650c184e0bb3?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Fortnite',
                'slug' => 'fortnite',
                'description' => 'El battle royale más popular del mundo. Construye, combate y sé el último en pie.',
                'price' => 0,
                'discount_percent' => 0,
                'sku' => 'RS-011',
                'platform' => 'Multiplataforma',
                'category_id' => 4,
                'is_featured' => false,
                'is_on_sale' => false,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1560419015-7c427e8ae5ba?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1556438064-2d7646166914?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Assassin\'s Creed Valhalla',
                'slug' => 'ac-valhalla',
                'description' => 'Conviértete en un legendario guerrero vikingo y lidera incursiones en Inglaterra.',
                'price' => 44.99,
                'discount_percent' => 50,
                'sku' => 'RS-012',
                'platform' => 'Xbox',
                'category_id' => 2,
                'is_featured' => true,
                'is_on_sale' => true,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1506318137071-a8e063b4bec0?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Minecraft',
                'slug' => 'minecraft',
                'description' => 'El juego más vendido de todos los tiempos. Construye lo que tu imaginación permita.',
                'price' => 29.99,
                'discount_percent' => 0,
                'sku' => 'RS-013',
                'platform' => 'Multiplataforma',
                'category_id' => 8,
                'is_featured' => true,
                'is_on_sale' => false,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1587573089734-599d584352eb?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1518773553398-650c184e0bb3?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1556438064-2d7646166914?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Dead by Daylight',
                'slug' => 'dead-by-daylight',
                'description' => 'Un juego de horror asimétrico. Sobrevive o mata, ¡tú decides!',
                'price' => 19.99,
                'discount_percent' => 40,
                'sku' => 'RS-014',
                'platform' => 'PC',
                'category_id' => 1,
                'is_featured' => false,
                'is_on_sale' => true,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1560419015-7c427e8ae5ba?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'League of Legends',
                'slug' => 'league-of-legends',
                'description' => 'El MOBA más popular del mundo. Domina a tu campeón y lidera a tu equipo a la victoria.',
                'price' => 0,
                'discount_percent' => 0,
                'sku' => 'RS-015',
                'platform' => 'PC',
                'category_id' => 7,
                'is_featured' => true,
                'is_on_sale' => false,
                'is_new' => false,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1593305841991-05c297ba4575?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1518773553398-650c184e0bb3?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=600&h=400&fit=crop',
                ],
            ],
            [
                'name' => 'Resident Evil 4 Remake',
                'slug' => 're4-remake',
                'description' => 'El survival horror clásico remasterizado con gráficos de última generación.',
                'price' => 59.99,
                'discount_percent' => 0,
                'sku' => 'RS-016',
                'platform' => 'PC',
                'category_id' => 1,
                'is_featured' => true,
                'is_on_sale' => false,
                'is_new' => true,
                'is_active' => true,
                'image' => 'https://images.unsplash.com/photo-1592478411213-6153e4ebc07d?w=600&h=400&fit=crop',
                'images' => [
                    'https://images.unsplash.com/photo-1560419015-7c427e8ae5ba?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1552820728-8b83bb6b2b0e?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1556438064-2d7646166914?w=600&h=400&fit=crop',
                ],
            ],
        ];

        $this->info('Actualizando productos...');

        foreach ($products as $productData) {
            $slug = $productData['slug'];
            $images = $productData['images'];
            unset($productData['slug'], $productData['images']);

            $product = Product::where('slug', $slug)->first();
            
            if ($product) {
                $product->update($productData);
                $product->images = $images;
                $product->touch();
                $this->line("✓ Actualizado: {$productData['name']}");
            } else {
                $productData['slug'] = $slug;
                $productData['images'] = $images;
                Product::create($productData);
                $this->line("✓ Creado: {$productData['name']}");
            }
        }

        $this->info('¡Productos actualizados correctamente!');
    }
}
