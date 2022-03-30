<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conge>
 */
class CongeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CONG_NUMORD_93' => $this->faker->randomDigitNot(0),
                     'CONG_NAT_9' => $this->faker->randomDigitNot(0),
                     'CONG_CET_9' => $this->faker->randomDigitNot(0),
                     'CONG_ANCSOLD_93' => $this->faker->randomDigitNot(0),
                     'CONG_NBRJOUR_93' => $this->faker->randomDigitNot(0),
                     'CONG_NOVSOLD_93' => $this->faker->randomDigitNot(0),
                     'CONG_DATE_FIN' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                     'CONG_DATE_DEB' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                     'CONG_PERDEB_X' => $this->faker->randomElement($array = array ('A','P')) ,
                     'CONG_PERFIN_X' => $this->faker->randomElement($array = array ('A','P')),
                     'CONG_MOTIF_X40' => $this->faker->text($maxNbChars = 40) ,
                     'CONG_INTERIM_X20' => $this->faker->text($maxNbChars = 30) ,
                     'CONG_ADRES_X30' => $this->faker->address ,
                     'CONG_TEL_98' => $this->faker->bothify('????????') ,
                     'CONG_DEMI_PER' => $this->faker->text($maxNbChars = 8)
        ];
    }
}
