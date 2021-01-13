<?php

namespace Database\Factories;

use App\Models\Duan;
use Illuminate\Database\Eloquent\Factories\Factory;


class DuanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Duan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'alamat' => $this->faker->address
        ];
    }
}
