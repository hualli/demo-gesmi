<?php

use Illuminate\Database\Seeder;
use App\ObraSocial;

class ObrasSocialesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ObraSocial::create([
          'nombre' => 'Red de Seguro Médico',
      ]);

      ObraSocial::create([
          'nombre' => 'OSDE',
      ]);

      ObraSocial::create([
          'nombre' => 'Subsidio de Salud',
      ]);

      ObraSocial::create([
          'nombre' => 'Sancor Salud',
      ]);
    }
}
