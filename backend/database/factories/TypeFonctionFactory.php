<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeFonction>
 */
class TypeFonctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'LIB_TYPE' => $this->faker->word,
            'MONTANT' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'CODF_CNRPS' =>$this->faker->randomLetter
        ];
    }
}
