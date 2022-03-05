<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'PERS_MAT_ACT' => $this->faker->randomDigitNot(0),
        'PERS_NATURAGENT_93' => $this->faker->randomDigitNot(0),
        'PERS_NOM' => $this->faker->word,
        'PERS_PRENOM' =>$this->faker->lastname,
        'PERS_DATE_NAIS' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'PERS_SEX_X' => $this->faker->randomElement($array = array ('H','F')),
        
        ];
    }
}
