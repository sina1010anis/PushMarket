@extends('cashier.page')

@section('index')
<div dir="rtl" class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="w-100 p-2 border rounded-5 shadow">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">{{$data->name}}</p>
            <hr>
            <br>
            <form action="{{route('cashier.edit.product.p' , ['name' => $data->name])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput1" class="form-label">نام محصول</label>
                    <input type="text" class="form-control text-center" name="name" id="exampleFormControlInput1" placeholder="نام محصول" value="{{$data->name}}">
                </div>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="edit_price_product" class="form-label">قیمت محصول</label>
                    <input type="text" class="form-control text-center"  name="price" id="edit_price_product"  placeholder="قیمت محصول" :value="input_rile({{$data->price}})">
                </div>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput3" class="form-label">بارکد محصول</label>
                    <input type="number" class="form-control text-center" name="barcode" id="exampleFormControlInput3"  placeholder="بارکد محصول" value="{{$data->barcode}}">
                </div>
                <div class="d-flex justify-content-center">
                    <img src="/{{$data->image}}" width="150" height="150" alt="">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-b my-font-IYM my-f-12-i">اعمال تغییرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
