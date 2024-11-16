<?php


namespace App\View;
use  \Illuminate\Support\Facades\View as V;

class View
{
    public function handle()
    {
        V::composer(['*'] , Set::class);
    }

}

?>
