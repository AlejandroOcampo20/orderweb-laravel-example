<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Observation;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(CausalSeeder::class);
        $this->call(ObservationSeeder::class);
        $this->call(TypeActivitySeeder::class);

        //Crear usuario del rol admin
        User::factory()->create([
            'role_id' => 1
        ]);

        //Crear 3 usuarios de rol super
        User::factory(3)->create([
            'role_id' => 2
        ]);

        //tecnicos
        Technician::factory(2)->create([
            'speciality' => 'Instalación de redes'
        ]);

        Technician::factory(2)->create([
            'speciality' => 'Construcción'
        ]);

        Technician::factory(1)->create([
            'speciality' => 'Lectura de redes'
        ]);

        Technician::factory(2)->create();  //Tecnico sin especialidad

        $this->call(ActivitySeeder::class);
        //Seeders test
        //$this->call(TestTechnicianSeeder::class);

        //$this->call(TestActivitySeeder::class);

    }
}
