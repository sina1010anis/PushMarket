<?php

namespace App\Repository\Delete;

use Illuminate\Database\Eloquent\Model;

class DeleteItem
{

    public function deleteForSingelId($class, int $id)
    {

        $class::find($id)->delete();

        return $this;

    }

    public function deleteForMultlId($class, array $id)
    {

        $class::whereIn('id', $id)->delete();

        return $this;

    }

    public function deleteCustumeWhere($class, array $where)
    {

        $class::where($where)->delete();

        return $this;

    }

}
