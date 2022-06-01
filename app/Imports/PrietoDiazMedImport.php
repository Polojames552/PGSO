<?php

namespace App\Imports;

use App\Models\PrietoDiazMedHospital;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
class PrietoDiazMedImport implements ToModel
{
    // use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PrietoDiazMedHospital([
             'Property_No' => $row[0],
             'Description' =>  $row[1],
             'Date_Aquired' => $row[2],
             'Aquisition_Cost' => $row[3],
             'Accountable_Person' => $row[4],
             'Location' =>  $row[5],
             'Med_dental_equipment' =>  $row[6],
             'Office_Eq' => $row[7],
             'Hospital_Eq' =>  $row[8],
             'FurnitureNFixtures' =>  $row[9],
             'Motor_Vehicles' => $row[10],
             'Info_Tech' => $row[11],
             'Other_Machine_Eq' =>  $row[12],
             'Other_Asset' => $row[13],
             'Remark' =>  $row[14],

            //  'Property_No' => $row['Property No.'],
            //  'Description' =>  $row['Description'],
            //  'Date_Aquired' =>  $row['Date Aquired'],
            //  'Aquisition_Cost' =>  $row['Aquisition Cost'],
            //  'Accountable_Person' => $row['Accountable Person'],
            //  'Location' =>  $row['Location'],
            //  'Med_dental_equipment' =>  $row['Med.dental & Equipment'],
            //  'Office_Eq' => $row['Office Equipment'],
            //  'Hospital_Eq' =>  $row['Hospital Equipment'],
            //  'FurnitureNFixtures' =>  $row['Furniture & Fixtures'],
            //  'Motor_Vehicles' =>  $row['Motor Vehicles'],
            //  'Info_Tech' =>  $row['Information Technology'],
            //  'Other_Machine_Eq' =>  $row['Other Machine Equipment'],
            //  'Other_Asset' =>  $row['Other Asset'],
            //  'Remark' =>  $row['Remark'],
        ]);
    }
}
