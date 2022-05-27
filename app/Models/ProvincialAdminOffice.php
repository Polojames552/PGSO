<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvincialAdminOffice extends Model
{
    use HasFactory;
    protected $fillable = [
        'Property_No',
        'Date_Aquired',
        'Particulars',
        'Quantity',
        'Unit_Cost',
        'Total_Cost',
        'Accumulated_Depreciation',
        'NetBookValue',
        'Remark',
    ];
}
