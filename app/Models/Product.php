<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = ['name' , 'barcode' , 'image' ,  'price' , 'status'];

    public function product_simpels()
    {
        return $this->hasMany(ProductSimpel::class , 'factor_id' , 'id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
