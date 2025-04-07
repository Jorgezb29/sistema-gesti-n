<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Llamar al seeder que creará los roles y permisos
        $this->call([
            RolePermissionSeeder::class, // Aquí agregas el seeder que creamos
        ]);
    }
}
