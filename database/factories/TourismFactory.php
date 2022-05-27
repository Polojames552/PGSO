<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Tourism;
class TourismFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Property_No' => "1111",
            'Description' => "dist",
            'Date_Aquired' => "1994",
            'Aquisition_Cost' => $this->faker->numerify(), // password
            'Accountable_Person' => "Person",
            'Location' => "Laboratory",
            'Med_dental_equipment' => $this->faker->numerify(),
            'Office_Eq' => $this->faker->numerify(),
            'Hospital_Eq' => $this->faker->numerify(),
            'FurnitureNFixtures' => $this->faker->numerify(),
            'Motor_Vehicles' => $this->faker->numerify(),
            'Info_Tech' => $this->faker->numerify(),
            'Other_Machine_Eq' => $this->faker->numerify(),
            'Other_Asset' => $this->faker->numerify(),
            'Remark' => "",
        ];
    }
}
