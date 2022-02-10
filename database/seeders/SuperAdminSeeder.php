<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $usuario = User::create([
         'name' => 'Raul lolo',
         'email' => 'rauw@gmail.com',
         'password' => bcrypt('selva.123')
     ]);

     $rol = Role::create(['name'=>'SuperAdministrador']);
     $permisos = Permission::pluck('id', 'id')->all();
     $rol->syncPermission($permisos);
     $usuario->assignRole(['SuperAdministrador']);
    }
}

