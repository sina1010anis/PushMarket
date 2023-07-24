@extends('welcome')

@section('index')
<div dir="rtl" class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="w-100 p-2 border rounded-5 shadow">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">ویرایش محصولی از انبار</p>
            <hr>
            <br>
            @if (session('msg'))
            <div class="page-msg-session px-4 py-2 my-font-IYM my-f-12 rounded-3 shadow text-center" dir="rtl">
                {{session('msg')}}
            </div>
        @endif
            <form action="{{route('store.edit.product.post' , ['id' => $data->id])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput1" class="form-label">نام محصول</label>
                    <input type="text" class="form-control text-center" name="name" id="exampleFormControlInput1" placeholder="نام محصول " value="{{$data->name}}">
                </div>
                @error ('name')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput3" class="form-label">محل محصول </label>
                    <input type="text" class="form-control text-center" name="location" id="exampleFormControlInput3"  placeholder=" محل محصول" value="{{$data->location}}">
                </div>
                @error ('location')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput4" class="form-label">تعداد جعبه </label>
                    <input type="number" class="form-control text-center" name="box" id="exampleFormControlInput4"  placeholder=" تعداد جعبه" value="{{$data->box}}">
                </div>
                @error ('box')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput5" class="form-label">تعداد محصولات تک </label>
                    <input type="number" class="form-control text-center" name="total_number" id="exampleFormControlInput5"  placeholder=" تعداد محصولات تک" value="{{$data->total_number}}">
                </div>
                @error ('total_number')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput2" class="form-label">بارکد  </label>
                    <input type="number" class="form-control text-center" name="barcode" id="exampleFormControlInput2"  placeholder="بارکد  " value="{{$data->barcode}}">
                </div>
                @error ('barcode')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-b my-font-IYL my-f-12-i">اعمال تغییرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
