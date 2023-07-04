<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factors extends Model
{
    use HasFactory;

    public $fillable = [ 'total_number' , 'total_price' ];
    public function products()
    {
        return $this->hasMany(ProductSimpel::class , 'factor_id' , 'id');
    }

}
