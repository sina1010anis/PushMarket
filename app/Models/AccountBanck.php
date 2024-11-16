<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountBanck extends Model
{
    use HasFactory;

    public $fillable = ['total' , 'des' , 'stauts'] ;

}
