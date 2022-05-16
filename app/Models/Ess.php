<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ess extends Model
{
    use HasFactory;
    protected $fillable = [
        'ess_name',
        'number',
    ];
}
