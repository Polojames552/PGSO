<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aip extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'contact',
        'age',
    ];
}
