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
          'telefono_celular' => '381-155235689',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Jorge',
          'apellido' => 'García',
          'telefono_celular' => '381-155985421',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '2',
      ]);

      Paciente::create([
          'nombre' => 'Pedro',
          'apellido' => 'Gómez',
          'telefono_celular' => '381-155985414',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Matías',
          'apellido' => 'Perez',
          'telefono_celular' => '381-155321203',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '3',
      ]);

      Paciente::create([
          'nombre' => 'Pablo',
          'apellido' => 'Véliz',
          'telefono_celular' => '381-155655421',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '3',
      ]);

      Paciente::create([
          'nombre' => 'María',
          'apellido' => 'Albarracín',
          'telefono_celular' => '381-155982514',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '4',
      ]);

      Paciente::create([
          'nombre' => 'Mercedes',
          'apellido' => 'Gauna',
          'telefono_celular' => '381-155322103',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Paola',
          'apellido' => 'Tévez',
          'telefono_celular' => '381-155985421',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '4',
      ]);

      Paciente::create([
          'nombre' => 'Myrna',
          'apellido' => 'Díaz',
          'telefono_celular' => '381-155875421',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '2',
      ]);

      Paciente::create([
          'nombre' => 'Fernando',
          'apellido' => 'Díaz',
          'telefono_celular' => '381-155455623',
          'plan' = 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '2',
      ]);
    }
}
