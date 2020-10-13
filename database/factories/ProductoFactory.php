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
            'precio' => $this->faker->randomFloat,
            'stock' => $this->faker->numberBetween($min = 100, $max = 500),
            'estado' => 0,
            'image' => 'eEw4wE2oadOPHpDS.jpg',
            'user_id' => 1

        ];
    }
}
