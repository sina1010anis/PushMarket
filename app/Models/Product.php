<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guardad = [];

    public function product_simpels()
    {
        return $this->hasMany(ProductSimpel::class , 'factor_id' , 'id');
    }
}
