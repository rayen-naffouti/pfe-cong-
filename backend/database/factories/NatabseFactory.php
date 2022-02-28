<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Natabse>
 */
class NatabseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'LIBELLE_ABS' => $this->faker->word,
        'TYPE_ABS' => $this->faker->text($maxNbChars = 10),
        'TYPE_ABS_PR' => $this->faker->randomDigit,
        'TYPE_ABS_13' => $this->faker->randomDigit,
        'TYPE_ABS_PROD' => $this->faker->randomDigit,
        'TYPE_ABS_CNR' => $this->faker->randomDigit
        ];
    }
}
