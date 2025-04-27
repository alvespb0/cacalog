<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TiposUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'cliente',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('12345'),
            'tipo' => 'cliente'
        ]);

        DB::table('users')->insert([
            'name' => 'operador',
            'email' => 'operador@gmail.com',
            'password' => Hash::make('12345'),
            'tipo' => 'operador'
        ]);
    }
}
