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

        DB::table('users')->insert([
            'name' => 'Fulano',
            'username' => 'fulano',
            'email' => 'fulano@exemplo.com',
            'password' => bcrypt('teste123')
        ]);
    }
}
