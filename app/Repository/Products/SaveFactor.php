<?php

namespace App\Repository\Products;

use App\Models\Factors;
use App\Models\ProductSimpel;
use App\Repository\Products\ProductSimpel as ProductsProductSimpel;

class SaveFactor
{

    private $product_simpel_null;

    private $new_factor;



    private function getNullProduct(): void
    {

        $this->product_simpel_null = ProductsProductSimpel::getNullProduct();

    }

    private function createFactor(): void
    {

        $this->new_factor = Factors::create([

            'total_price'=> $this->product_simpel_null->sum('total_price'),

            'total_number'=> $this->product_simpel_null->sum('total_number')

        ]);

    }

    private function updateProductNull(): void
    {

        ProductSimpel::where('factor_id' ,null)->update(['factor_id' => $this->new_factor->id]);

    }

    private function backReturn(string $msg)
    {

        return back()->with('msg' , $msg);

    }

    public function builderSaveProduct(string $msg)
    {

        $this->getNullProduct();

        $this->createFactor();

        $this->updateProductNull();

        return $this->backReturn($msg);

    }

}
