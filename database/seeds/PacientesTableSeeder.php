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
          'dni_cuil_cuit'=>'11111111',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155235689',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Jorge',
          'apellido' => 'García',
          'dni_cuil_cuit'=>'1111111',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155985421',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '2',
      ]);

      Paciente::create([
          'nombre' => 'Pedro',
          'apellido' => 'Gómez',
          'dni_cuil_cuit'=>'11111113',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155985414',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Matías',
          'apellido' => 'Perez',
          'dni_cuil_cuit'=>'11111114',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155321203',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '3',
      ]);

      Paciente::create([
          'nombre' => 'Pablo',
          'apellido' => 'Véliz',
          'dni_cuil_cuit'=>'11111115',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155655421',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '3',
      ]);

      Paciente::create([
          'nombre' => 'María',
          'apellido' => 'Albarracín',
          'dni_cuil_cuit'=>'11111116',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155982514',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '4',
      ]);

      Paciente::create([
          'nombre' => 'Mercedes',
          'apellido' => 'Gauna',
          'dni_cuil_cuit'=>'11111117',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155322103',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '1',
      ]);

      Paciente::create([
          'nombre' => 'Paola',
          'apellido' => 'Tévez',
          'dni_cuil_cuit'=>'11111118',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155985421',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '4',
      ]);

      Paciente::create([
          'nombre' => 'Myrna',
          'apellido' => 'Díaz',
          'dni_cuil_cuit'=>'11111119',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155875421',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '2',
      ]);

      Paciente::create([
          'nombre' => 'Fernando',
          'apellido' => 'Díaz',
          'dni_cuil_cuit'=>'11111110',
          'fecha_nacimiento'=>'2000-01-01 00:00:00',
          'telefono_celular' => '381-155455623',
          'plan' => 'Plan ejemplo',
          'numero_afiliado' => '111111',
          'obrasocial_id' => '2',
      ]);
    }
}
