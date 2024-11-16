@extends('welcome')

@section('index')

<div class="w-100 d-flex bg-sa-b-l justify-content-center align-items-center my-font-IYM" style="height: 100vh;">

    <div dir="rtl" class="d-flex  justify-content-center align-items-center my-3" >
        <div class="w-75">
            <div class="w-100 p-2 border rounded-5  bg-sa-o-vl shadow" style="width: 750px!important;max-width: 100%!important">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">{{$data->name}}</p>
            <hr>
            <br>
            <form action="{{route('cashier.edit.product.p' , ['name' => $data->name])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput1" class="form-label co-sa-b-h my-f-13-i my-font-IYB">نام محصول</label>
                    <input type="text" class="form-control text-center bg-sa-o-vl bo-sa-o-h " name="name" id="exampleFormControlInput1" placeholder="نام محصول" value="{{$data->name}}">
                </div>
                <script>

                </script>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label dir="rtl" for="edit_price_product" class="form-label co-sa-b-h my-f-13-i my-font-IYB"> {{ToRilP($data->price)}} قیمت فعلی محصول: قیمت محصول</label>
                    <script>
                        function separateNum(value, input) {
                            /* seprate number input 3 number */
                            var nStr = value + '';
                            nStr = nStr.replace(/\,/g, "");
                            x = nStr.split('.');
                            x1 = x[0];
                            x2 = x.length > 1 ? '.' + x[1] : '';
                            var rgx = /(\d+)(\d{3})/;
                            while (rgx.test(x1)) {
                                x1 = x1.replace(rgx, '$1' + ',' + '$2');
                            }
                            if (input !== undefined) {

                                input.value = x1 + x2;
                            } else {
                                return x1 + x2;
                            }
                        }
                    </script>
                    <input type="text" class="form-control text-center bg-sa-o-vl bo-sa-o-h "  name="price" id="edit_price_product"  placeholder="قیمت فعلی محصول {{ToRilP($data->price)}}" onkeyup="separateNum(this.value,this);">
                </div>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput3" class="form-label co-sa-b-h my-f-13-i my-font-IYB">بارکد محصول</label>
                    <input type="number" class="form-control text-center bg-sa-o-vl bo-sa-o-h " name="barcode" id="exampleFormControlInput3"  placeholder="بارکد محصول" value="{{$data->barcode}}">
                </div>
                <div class="d-flex justify-content-center">
                    <img src="/{{$data->image}}" width="150" height="150" alt="">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-sa-re my-font-IYM my-f-12-i">اعمال تغییرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
