<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Acción',
                'slug' => 'accion',
                'description' => 'Juegos de acción llenos de adrenalina y combate',
                'is_active' => true,
            ],
            [
                'name' => 'Aventura',
                'slug' => 'aventura',
                'description' => 'Explora mundos increíbles en estas aventuras',
                'is_active' => true,
            ],
            [
                'name' => 'RPG',
                'slug' => 'rpg',
                'description' => 'Sumérgete en historias épicas con personajes únicos',
                'is_active' => true,
            ],
            [
                'name' => 'Shooter',
                'slug' => 'shooter',
                'description' => 'Dispara y conquista en intensos combates',
                'is_active' => true,
            ],
            [
                'name' => 'Deportes',
                'slug' => 'deportes',
                'description' => 'Juega tus deportes favoritos virtualmente',
                'is_active' => true,
            ],
            [
                'name' => 'Carreras',
                'slug' => 'carreras',
                'description' => 'Compite en emocionantes carreras',
                'is_active' => true,
            ],
            [
                'name' => 'Estrategia',
                'slug' => 'estrategia',
                'description' => 'Planifica y vence con ingenio',
                'is_active' => true,
            ],
            [
                'name' => 'Indie',
                'slug' => 'indie',
                'description' => 'Juegos independientes llenos de creatividad',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
