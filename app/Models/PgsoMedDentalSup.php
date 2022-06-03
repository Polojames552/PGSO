<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PgsoMedDentalSup extends Model
{
    use HasFactory;
    protected $fillable = [
        'article',
        'description',
        'stockno',
        'unitofmeasurement',
        'unitvalue',
        'balancecard',
        'onhandcount',
        'shortageqty',
        'shortagevalue',
        'remark',
    ];
}
