<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProvincialAdminOffice;
class ProvincialAdminOfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'Property_No' => "1222",
        'Date_Aquired' => now(),
        'Particulars' => "aaaasda, asdasdasd and asdas",
        'Quantity' => $this->faker->numerify(),
        'Unit_Cost' => "",
        'Total_Cost' => $this->faker->numerify(),
        'Accumulated_Depreciation' => "",
        'NetBookValue' => "",
        'Remark' => "Good",
        ];
    }
}
