<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hdc extends Model
{
    use HasFactory;
    protected $fillable = [
        'hdc_name',
        'number',
    ];
}
