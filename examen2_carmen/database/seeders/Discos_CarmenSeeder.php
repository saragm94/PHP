<?php

namespace Database\Seeders;

use App\Models\Discos_carmen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Discos_CarmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discos_carmen::create([
            'titulo'=>'lagrimas desordenadas',
            'autor'=>'melendi',
            'precio'=>'50'
        ]);
        Discos_carmen::create([
            'titulo'=>'rancheras 3000',
            'autor'=>'random',
            'precio'=>'5'
        ]);
    }
}
