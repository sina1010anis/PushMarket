@extends('cashier.page')

@section('index')

<div dir="rtl" class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="w-100 p-2 border rounded-5 shadow">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">ویرایش بدهکاری</p>
            <hr>
            <br>
            <form action="{{route('cashier.creditor.edit.post' , ['id' => $data->id])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput1" class="form-label">نام بدهکار</label>
                    <input type="text" class="form-control text-center" name="name" id="exampleFormControlInput1" placeholder="نام بدهکار" value="{{$data->name}}">
                </div>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label dir="rtl" for="edit_price_product" class="form-label"> {{ToRilP($data->price)}}   مقدار فعلی: قیمت بدهکاری</label>
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
                    <input type="text" class="form-control text-center"  name="price" id="edit_price_product"  placeholder="مقدار فعلی بدهکاری {{ToRilP($data->price)}}" onkeyup="separateNum(this.value,this);">
                </div>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput3" class="form-label">توضیحات </label>
                    <input type="text" class="form-control text-center" name="des" id="exampleFormControlInput3"  placeholder=" توضیحات" value="{{$data->des}}">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-b my-font-IYL my-f-12-i">اعمال تغییرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
