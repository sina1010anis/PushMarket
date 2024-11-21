@extends('welcome')

@section('index')


<div class="w-100 d-flex bg-sa-b-l justify-content-center align-items-center my-font-IYM" style="height: 100vh;">

    <div dir="rtl" class="d-flex  justify-content-center align-items-center my-3" >
        <div class="w-75">
            <div class="w-100 p-2 border rounded-5  bg-sa-o-vl shadow" style="width: 750px!important;max-width: 100%!important">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">ویرایش محصولی از انبار</p>
            <hr>
            <br>
            <form action="{{route('store.edit.product.post' , ['id' => $data->id])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput1" class="form-label co-sa-b-h my-f-13-i my-font-IYB">نام محصول</label>
                    <input type="text" class="form-control text-center  bg-sa-o-vl bo-sa-o-h" name="name" id="exampleFormControlInput1" placeholder="نام محصول " value="{{$data->name}}">
                </div>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput3" class="form-label co-sa-b-h my-f-13-i my-font-IYB">محل محصول</label>
                    <input type="text" class="form-control text-center  bg-sa-o-vl bo-sa-o-h" name="location" id="exampleFormControlInput3"  placeholder=" محل محصول" value="{{$data->location}}">
                </div>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput4" class="form-label co-sa-b-h my-f-13-i my-font-IYB">تعداد حعبه</label>
                    <input type="number" class="form-control text-center  bg-sa-o-vl bo-sa-o-h" name="box" id="exampleFormControlInput4"  placeholder=" تعداد جعبه" value="{{$data->box}}">
                </div>
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput5" class="form-label co-sa-b-h my-f-13-i my-font-IYB">تعداد تک محصول</label>
                    <input type="number" class="form-control text-center  bg-sa-o-vl bo-sa-o-h" name="total_number" id="exampleFormControlInput5"  placeholder=" تعداد محصولات تک" value="{{$data->total_number}}">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-sa-re my-font-IYL-i my-f-12-i">اعمال تغییرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
