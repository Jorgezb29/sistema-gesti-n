<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $usuario = Role::firstOrCreate(['name' => 'usuario']);

        // Crear permisos
        $permisos = [
            'view documents',
            'create documents',
            'manage documents'
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Asignar todos los permisos al rol admin
        $admin->syncPermissions(Permission::all());

        // Asignar permisos limitados al rol usuario
        $usuario->syncPermissions([
            'view documents',
            'create documents'
        ]);

        // Asignar rol admin al primer usuario
        $user = User::first(); // Puedes personalizar esto
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
