<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@rayitostore.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '+51 974 441 535',
            'address' => 'Calle Principal 123, Ciudad Gamer',
        ]);

        User::create([
            'name' => 'Usuario Demo',
            'email' => 'demo@rayitostore.com',
            'password' => Hash::make('password'),
            'role' => 'client',
            'phone' => '+51 974 441 535',
            'address' => 'Avenida Gaming 456, Level Up City',
        ]);

        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password'),
            'role' => 'client',
        ]);
    }
}
