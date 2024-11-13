<?php

namespace App\Repository\Products;

use App\Models\Product;
use App\Models\ProductSimpel;

class ProductCore
{

    private $product;

    public function __construct(private string $code){}

    public function hasProduct(): bool
    {

        if (Product::whereBarcode($this->code)->count() == 1) {

            return true;

        }

        return false;

    }

    public function firstProduct(): null|Product
    {

        if ($this->hasProduct()) {

            $data = Product::whereBarcode($this->code)->first();

            $this->product = $data;

            return $data;

        }

        return null;

    }

    public function countProductSimpel(): int
    {

        return ProductSimpel::where('product_id' , $this->product->id)->where('factor_id' , null)->count();

    }

    public function createProductSimpel(): void
    {

        ProductSimpel::create([

            'product_id' => $this->product->id,

            'total_number' => 1,

            'total_price' => $this->product->price,

            'name' => $this->product->name,

            'image' => $this->product->image,

            'price' => $this->product->price,

            'factor_id' => null,
        ]);

    }

    public function incrementProductSimpel(): void
    {

        ProductSimpel::where('product_id' ,$this->product->id)->where('factor_id' , null)->increment('total_number' , 1);

        ProductSimpel::where('product_id' ,$this->product->id)->where('factor_id' , null)->increment('total_price' , $this->product->price);

    }

    private function getProductSimpelNew()
    {

        return ProductSimpel::latest('id')->where('factor_id' , null);

    }

    public function buildOutput(): array
    {

        return ['first' => $this->product , 'factor' => $this->getProductSimpelNew()->get() , 'total_number'=> $this->getProductSimpelNew()->get()->sum('total_number'), 'total_price'=> $this->getProductSimpelNew()->get()->sum('total_price') , 'number'=>$this->getProductSimpelNew()->count()];

    }

}
