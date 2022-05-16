<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sw extends Model
{
    use HasFactory;
    protected $fillable = [
        'sw_name',
        'number',
    ];
}
