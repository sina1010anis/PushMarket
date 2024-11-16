<?php

namespace App\Repository\Products;

use App\Models\Product;
use App\Models\ProductSimpel;
use Illuminate\Http\Request;

class ProductCore
{

    private $product;
    private $product_simpel;

    public function __construct(private string|null $code = null){}

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

    public function findProductSimpel(int $id)
    {

        return ProductSimpel::find($id);

    }

    public function decrementCountProductSimpel(int $id): void
    {

        if($this->findProductSimpel($id)->total_number > 1){

            $this->findProductSimpel($id)->decrement('total_number');

        }else{

            $this->findProductSimpel($id)->delete();

        }

    }

    public function incrementCountProductSimpel(int $id): void
    {

        $this->findProductSimpel($id)->increment('total_number');

    }

    public function updateProductSimpel(int $id)
    {

        $this->findProductSimpel($id)->update(['total_price' => $this->findProductSimpel($id)->total_number * $this->findProductSimpel($id)->price]);

    }

    public static function searchProduct(Request $request)
    {

        return ($request->model == 'price') ? Product::whereBarcode($request->code)->get() : Product::where('name','LIKE','%'.$request->name.'%')->get();

    }

}
