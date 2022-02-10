<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class Administrador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $usuario = User::create([
         'name' => 'Horacio Morales',
         'email' => 'lacho_147@hotmail.com',
         'password' => bcrypt('laselva.1')
     ]);

    // $rol = Role::create(['name'=>'administrador']);
     //$permisos = Permission::pluck('id', 'id')->all();
     //$rol->syncPermission($permisos);
     $usuario->assignRole(['administrador']);
    }
}
