<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PgsoMeDentalSupply;
class PgsoMedDentalSupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article' => "1",
            'description' => "aaaasda, asdasdasd and asdas",
            'stockno' => "",
            'unitofmeasurement' => "kit",
            'unitvalue' => $this->faker->numerify(),
            'balancecard' => $this->faker->numerify(),
            'onhandcount' => 0,
            'shortageqty' => "",
            'shortagevalue' => "",
            'remark' => "Good",
        ];
    }
}
