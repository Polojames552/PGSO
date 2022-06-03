<?php

namespace App\Imports;

use App\Models\PgsoMedDentalSup;
use Maatwebsite\Excel\Concerns\ToModel;

class PgsoMedDentalSupImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PgsoMedDentalSup([
            //
        ]);
    }
}
