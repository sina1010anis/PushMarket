<?php


namespace App\View;


use App\Models\Seting;

class Set
{
    public function compose(\Illuminate\View\View $view)
    {
        return $view->with('seting', Seting::get());
    }
}
