<?php

namespace Database\Seeders;

use App\Models\Causal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CausalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Causal:: insert([
            ['description'=>'REPARACIÓN CONTADOR'],
            ['description'=>'SUSPENCIÓN DEL SEVICIO'],
            ['description'=>'RECONXIÓN DEL SERVICIO'],
            ['description'=>'INSTALACIÓN DEL CONTADOR'],
            ['description'=>'CAMBIO DEL CONTADOR'],
        ]);
    }
}
