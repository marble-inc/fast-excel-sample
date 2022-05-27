<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SampleItem>
 */
class SampleItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(),
            'name' => $this->faker->word(),
            'description' => $this->faker->realText(),
            'color' => $this->faker->colorName(),
            'jan' => $this->faker->ean13(),
            'price' => $this->faker->randomNumber(5, true),
        ];
    }
}
