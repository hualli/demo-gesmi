<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Support\Facades\Hash;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permissions = [];
      array_push($permissions, Permission::create(['name' => 'pacientes_index']));
      array_push($permissions, Permission::create(['name' => 'pacientes_show']));
      array_push($permissions, Permission::create(['name' => 'pacientes_create']));
      array_push($permissions, Permission::create(['name' => 'pacientes_edit']));
      array_push($permissions, Permission::create(['name' => 'obrassociales_index']));
      array_push($permissions, Permission::create(['name' => 'obrassociales_show']));
      array_push($permissions, Permission::create(['name' => 'obrassociales_create']));
      array_push($permissions, Permission::create(['name' => 'obrassociales_edit']));
      array_push($permissions, Permission::create(['name' => 'consultas_show']));
      array_push($permissions, Permission::create(['name' => 'consultas_create']));
      array_push($permissions, Permission::create(['name' => 'consultas_edit']));
      array_push($permissions, Permission::create(['name' => 'turnos_nuevo']));
      array_push($permissions, Permission::create(['name' => 'turnos_consulta']));
      array_push($permissions, Permission::create(['name' => 'turnos_cancelar']));
      array_push($permissions, Permission::create(['name' => 'visor_index']));
      array_push($permissions, Permission::create(['name' => 'ayuda_index']));
      array_push($permissions, Permission::create(['name' => 'config_list']));

      $role = Role::create(['name' => 'administrador']);
      $role->syncPermissions($permissions);


      $user = User::create([
          'nombre' => 'Administrador',
          'apellido' => 'Administrador',
          'username' => 'administrador',
          'password' => Hash::make('1234'),
          'email' => 'usuario@admin.com',

      ]);

      $user->assignRole('administrador');
    }
}
