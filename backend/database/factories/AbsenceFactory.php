<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Personnel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $pers=Personnel::get('PERS_MAT_95')->random();
        return [
        'ABS_NUMORD_93' =>  $this->faker-> randomDigitNot(0),
        'ABS_NAT_9' => $this->faker-> randomDigitNot(0),
        'ABS_CAT_9' => $this->faker->randomDigitNot(0),
        'ABS_DATE_DEB' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'ABS_PERDEB_X' => $this->faker->randomElement($array = array ('A','P')),
        'ABS_DATE_FIN' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'ABS_PERFIN_X' => $this->faker->randomElement($array = array ('A','P')),
        'ABS_NBRJOUR_93' => $this->faker->randomDigitNot(0),
        'ABS_CUMULE_9' => $this->faker->randomDigitNot(0),
        ];
    }
}
