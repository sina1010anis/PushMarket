@extends('welcome')

@section('index')
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
<div class="w-100 d-flex bg-sa-b-l justify-content-center align-items-center my-font-IYM" style="height: 100vh;">

<div dir="rtl" class="d-flex justify-content-center align-items-center my-3" >
    <div class="w-75">
        <div class="w-100 p-2 border rounded-5  bg-sa-o-vl shadow" style="width: 750px!important;max-width: 100%!important">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">ویرایش داده حساب اصلی</p>
            <hr>
            <br>
            <form action="{{route('acco.edit.acco.post' , ['id' => $data->id])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label dir="rtl" for="edit_price_product" class="form-label co-sa-b-h my-f-13-i my-font-IYB"> {{ToRilP($data->total)}}   مانده موجودی فعلی: قیمت موجودی</label>
                    <input type="text" class="form-control text-center"  name="total" id="edit_price_product"  placeholder="مقدار فعلی مانده {{ToRilP($data->total)}}" onkeyup="separateNum(this.value,this);">
                </div>

                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label dir="rtl" for="edit_price_product" class="form-label co-sa-b-h my-f-13-i my-font-IYB"> {{ToRilP($data->indebted)}}   بدهکاری  فعلی: قیمت بدهکاری</label>
                    <input type="text" class="form-control text-center"  name="indebted" id="edit_price_product"  placeholder="مقدار فعلی بدهکاری {{ToRilP($data->indebted)}}" onkeyup="separateNum(this.value,this);">
                </div>

                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label dir="rtl" for="edit_price_product" class="form-label co-sa-b-h my-f-13-i my-font-IYB"> {{ToRilP($data->creditor)}}   بستانکاری  فعلی: قیمت بستانکاری</label>
                    <input type="text" class="form-control text-center"  name="creditor" id="edit_price_product"  placeholder="مقدار فعلی بستانکاری {{ToRilP($data->creditor)}}" onkeyup="separateNum(this.value,this);">
                </div>

                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput4" class="form-label co-sa-b-h my-f-13-i my-font-IYB">توضیحات </label>
                    <input type="text" class="form-control text-center" name="des" id="exampleFormControlInput4"  placeholder=" توضیحات" value="{{$data->des}}">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-b my-font-IYL-i my-f-12-i">اعمال تغییرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
@endsection
