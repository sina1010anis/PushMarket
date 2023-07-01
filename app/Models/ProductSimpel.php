<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSimpel extends Model
{
    use HasFactory;

    //protected $guardad = [];

    public $fillable = ['product_id' , 'total_number' , 'total_price' ,  'name' ,'image', 'price' , 'status' , 'factor_id' ];

    public $timestamps = false;

    public function factor()
    {
        return $this->belongsTo(Factors::class , 'factor_id' , 'id');
    }
}
