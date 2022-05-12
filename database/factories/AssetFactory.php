<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prodname = array("Brand A", "Brand B", "Brand C" , "Brand D" , "Brand E");
        shuffle($prodname);
        $prodname = $prodname[array_rand($prodname)];

        $con = array("New", "Old");
        shuffle($con);
        $con = $con[array_rand($con)];

        return [
            'Product_name'=> $prodname,
            'Quantity'=> $this->faker->numerify(),
            'Condition'=> $con,
            'Price'=> $this->faker->numerify(),
        ];
    }
}
