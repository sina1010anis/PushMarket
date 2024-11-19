<?php

namespace App\Repository\Setting;

use App\Models\Seting;

class SettingClass
{

    public static function getAll(string $type)
    {

        return Seting::whereType($type)->first();

    }

    public static function get(string $type)
    {

        return Seting::whereType($type)->first()->status;

    }

}
