<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(3)->create();

        DB::table('users')->insert([
            'username' => 'fulano',
            'email' => 'fulano@exemplo.com',
            'password' => bcrypt('teste123')
        ]);
    }
}
