<?php

use Illuminate\Database\Seeder;
use App\Paciente;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Paciente::create([
          'nombre' => 'Juan',
          'apellido' => 'Perez',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Jorge',
          'apellido' => 'García',
          'obrasocial_id' => '2',
      ]);

      Paciente::create([
          'nombre' => 'Pedro',
          'apellido' => 'Gómez',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Matías',
          'apellido' => 'Perez',
          'obrasocial_id' => '3',
      ]);

      Paciente::create([
          'nombre' => 'Pablo',
          'apellido' => 'Véliz',
          'obrasocial_id' => '3',
      ]);

      Paciente::create([
          'nombre' => 'María',
          'apellido' => 'Albarracín',
          'obrasocial_id' => '4',
      ]);

      Paciente::create([
          'nombre' => 'Mercedes',
          'apellido' => 'Gauna',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Paola',
          'apellido' => 'Tévez',
          'obrasocial_id' => '4',
      ]);

      Paciente::create([
          'nombre' => 'Myrna',
          'apellido' => 'Díaz',
          'obrasocial_id' => '2',
      ]);

      Paciente::create([
          'nombre' => 'Fernando',
          'apellido' => 'Díaz',
          'obrasocial_id' => '2',
      ]);
    }
}
