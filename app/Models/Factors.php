<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factors extends Model
{
    use HasFactory;

    public $fillable = [ 'total_number' , 'total_price' ];


}
