<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            'nome' => 'aberto',
            'cor' => '#0000ff'
        ]);

        DB::table('status')->insert([
            'nome' => 'Em locomoção',
            'cor' => '#ccc121'
        ]);

        DB::table('status')->insert([
            'nome' => 'entregue',
            'cor' => '#009000'
        ]);
    }
}
