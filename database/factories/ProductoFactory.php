<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->paragraph,
            'precio' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 999999),
            'estado' => 0,
            'codigo' => 'df54d54v',
            'categoria_web' => 'destacado',
            'uuid' => $this->faker->uuid,
            'fabricante_id' => 1,
            'categoria_id' => 1

        ];
    }
}
