<?php

namespace App\Imports;

use App\Models\PrietoDiazMedHospital;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PrietoDiazMedImport implements ToModel
{
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
       ]);

        // return new PrietoDiazMedHospital([
        //       'Property_No' => $row['Property_No'],
        //       'Description' =>  $row['Description'],
        //       'Date_Aquired' =>  $row['Date_Aquired'],
        //       'Aquisition_Cost' =>  $row['Aquisition_Cost'],
        //       'Accountable_Person' => $row['Accountable_Person'],
        //       'Location' =>  $row['Location'],
        //       'Med_dental_equipment' =>  $row['Med_dental_equipment'],
        //       'Office_Eq' => $row['Office_Eq'],
        //       'Hospital_Eq' =>  $row['Hospital_Eq'],
        //       'FurnitureNFixtures' =>  $row['FurnitureNFixtures'],
        //       'Motor_Vehicles' =>  $row['Motor_Vehicles'],
        //       'Info_Tech' =>  $row['Info_Tech'],
        //       'Other_Machine_Eq' =>  $row['Other_Machine_Eq'],
        //       'Other_Asset' =>  $row['Other_Asset'],
        //       'Remark' =>  $row['Remark'],
        // ]);
    
    }
}