<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prodname = array("Irosin", "Bulan", "Sorsogon");
        shuffle($prodname);
        $prodname = $prodname[array_rand($prodname)];

        return [
            'name'=> $this->faker->name(),
            'address'=> $prodname,
            'contact'=> $this->faker->numerify(),
            'age'=> $this->faker->numerify(),
        ];
    }
}
