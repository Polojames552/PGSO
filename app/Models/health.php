<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class health extends Model
{
    use HasFactory;
    protected $fillable = [
        'Property_No',
        'Description',
        'Date_Aquired',
        'Aquisition_Cost',
        'Accountable_Person',
        'Location',
        'Med_dental_equipment',
        'Office_Eq',
        'Hospital_Eq',
        'FurnitureNFixtures',
        'Motor_Vehicles',
        'Info_Tech',
        'Other_Machine_Eq',
        'Other_Asset',
        'Remark',
       
    ];
}
