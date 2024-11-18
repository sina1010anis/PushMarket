<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'body', 'menu_book_id'];

    public function menu()
    {

        return $this->belongsTo(MenuBook::class, 'menu_book_id', 'id');

    }
}
