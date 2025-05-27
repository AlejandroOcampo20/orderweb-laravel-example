<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestTechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technician = new Technician();
        $technician->document = 9898989898;
        $technician->name = 'Arnulfo ramon';
        $technician->speciality = 'Medición redes';
        $technician->phone = '3161234';
        $technician->save();
    }
}
