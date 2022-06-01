<?php

namespace App\Imports;

use App\Models\ProvincialAdminOffice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProvincialAdminOfficeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProvincialAdminOffice([
            'Property_No' => $row[0],
            'Date_Aquired' =>  $row[1],
            'Particulars' =>  $row[2],
            'Quantity' =>  $row[3],
            'Unit_Cost' =>  $row[4],
            'Total_Cost' =>  $row[5],
            'Accumulated_Depreciation' =>  $row[6],
            'NetBookValue' =>  $row[7],
            'Remark' =>  $row[8],
        ]);
    }
}
