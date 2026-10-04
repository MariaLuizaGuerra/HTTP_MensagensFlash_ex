<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Senha padrão da factory: "password"
        User::factory()->create([
            'name' => 'Teste',
            'email' => 'teste@exemplo.com',
        ]);
    }
}
