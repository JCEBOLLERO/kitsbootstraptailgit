<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Articulo;
use App\Models\Familia;
use App\Models\Proveedor;

class ArticuloSeeder extends Seeder
{
    public function run()
    {
        if (Familia::count() == 0 || Proveedor::count() == 0) {
            $this->command->warn('⚠️ Debes poblar primero las tablas familias y proveedores.');
            return;
        }

        Articulo::factory()->count(200)->create();
    }
}

