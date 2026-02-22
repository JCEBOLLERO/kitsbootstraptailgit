<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Familia; 
use App\Models\Proveedor;
use App\Models\Articulo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Obtener una familia existente
        $familia = Familia::inRandomOrder()->first();

        // Nemotécnico real de la familia
        $nemotec = strtoupper($familia->nemotecnico ?? 'GEN'); // Ajusta el nombre del campo si es distinto

        // Año entre 00 y 26
        $anio = str_pad($this->faker->numberBetween(0, 26), 2, '0', STR_PAD_LEFT);

        // Número de 3 dígitos
        $numero = str_pad($this->faker->numberBetween(0, 999), 3, '0', STR_PAD_LEFT);

        // Construcción final de la referencia
        $referencia = "{$nemotec}{$anio}-{$numero}";

        return [
            'referencia'   => $referencia,
            'descripcion'  => $this->faker->sentence(3),
            'familia_id'   => $familia->id,
            'proveedor_id' => Proveedor::inRandomOrder()->value('id'),
            'preciocosto'  => $this->faker->randomFloat(2, 1, 200),
            'pvp'          => $this->faker->randomFloat(2, 5, 300),
            'refprove'     => strtoupper($this->faker->bothify('PROV-####')),
            'baja'         => $this->faker->boolean(10),
        ];
    }
}


