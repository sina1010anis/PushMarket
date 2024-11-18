<?php

namespace App\Repository\Products;

use App\Models\ProductSimpel as ModelsProductSimpel;

class ProductSimpel
{
    public static function getNullProduct()
    {

        return ModelsProductSimpel::where('factor_id' ,null)->latest('id')->get();

    }

    public static function deleteProductSimpleForId($id): void
    {

        ModelsProductSimpel::whereId($id)->delete();

    }

    public static function updateTotalPriceTotalNumberProductSimpleForId($id, $number, $price): void
    {

        ModelsProductSimpel::where('id',$id)->update(['total_number' => $number , 'total_price' => $number*$price]);

    }
}
