<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Multijugador', 'slug' => 'multijugador'],
            ['name' => 'Online', 'slug' => 'online'],
            ['name' => 'Mundo Abierto', 'slug' => 'mundo-abierto'],
            ['name' => 'Zombies', 'slug' => 'zombies'],
            ['name' => 'Competitivo', 'slug' => 'competitivo'],
            ['name' => 'Cooperativo', 'slug' => 'cooperativo'],
            ['name' => 'Battle Royale', 'slug' => 'battle-royale'],
            ['name' => 'Pixel Art', 'slug' => 'pixel-art'],
            ['name' => 'Historia', 'slug' => 'historia'],
            ['name' => 'Exploración', 'slug' => 'exploracion'],
            ['name' => 'Supervivencia', 'slug' => 'supervivencia'],
            ['name' => 'Horror', 'slug' => 'horror'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
