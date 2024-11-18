<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuBook extends Model
{
    protected $fillable = ['name'];

    public function books()
    {

        return $this->hasMany(Book::class, 'menu_book_id', 'id');

    }
}
