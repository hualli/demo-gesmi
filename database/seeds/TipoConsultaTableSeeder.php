<?php

use Illuminate\Database\Seeder;
use App\TipoConsulta;

class TipoConsultaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      TipoConsulta::create([
          'nombre' => 'Láser de Depilación',
      ]);

      TipoConsulta::create([
          'nombre' => 'Láser Spectra',
      ]);

      TipoConsulta::create([
          'nombre' => 'Consultas Clínicas',
      ]);

      TipoConsulta::create([
          'nombre' => 'Cirugía',
      ]);

      TipoConsulta::create([
          'nombre' => 'Estética',
      ]);

      TipoConsulta::create([
          'nombre' => 'Gabinete',
      ]);
    }
}
