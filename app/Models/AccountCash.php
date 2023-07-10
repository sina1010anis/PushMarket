<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCash extends Model
{
    use HasFactory;
    public $fillable = ['total' , 'des' , 'stuats'] ;

}
