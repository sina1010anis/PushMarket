<?php

namespace App\Repository\Products;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchProduct
{

    private function searchByNameFirst(string $name)
    {

        $data = Product::where('name' , 'LIKE' , '%'.$name.'%');

        return ($data->count() >= 1) ? $data->first() : 'none';

    }

    private function searchByCodeFirst(int $code)
    {

        $data = Product::whereBarcode($code);

        return ($data->count() ==1) ? $data->first() : 'none';

    }

    private function searchByNameGet(string $name)
    {

        $data = Product::where('name' , 'LIKE' , '%'.$name.'%');

        return ($data->count() >= 1) ? $data->get() : null;

    }

    private function searchByCodeGet(int $code)
    {

        $data = Product::whereBarcode($code);

        return ($data->count() ==1) ? $data->get() : null;

    }

    public function searchProductFirst(Request $request)
    {

        return ($request->type == 'barcode') ? $this->searchByCodeFirst($request->code) : $this->searchByNameFirst($request->name);

    }

    public function searchProductGet(Request $request)
    {

        return ($request->type == 'barcode') ? $this->searchByCodeGet($request->code) : $this->searchByNameGet($request->name);

    }

}
