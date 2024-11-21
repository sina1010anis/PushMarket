<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExitProduct extends Model
{
    protected $fillable = [
        'name',
        'price',
        'desc',
        'total_number',
        'box',
    ];
}
