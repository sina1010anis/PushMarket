@extends('welcome')

@section('index')
<div dir="rtl" class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="w-100 p-2 border rounded-5 shadow">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">ویرایش داده حساب اصلی</p>
            <hr>
            <br>
            @if (session('msg'))
                <div class="d-flex justify-content-center align-items-center my-3">
                    <div class="w-75">
                        <div class="alert alert-success text-center my-f-13 my-font-IYM">{{session('msg')}}</div>
                    </div>
                </div>
            @endif
            <form action="{{route('acco.edit.acco.post' , ['id' => $data->id])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput1" class="form-label">مانده موجودی</label>
                    <input type="number" class="form-control text-center" name="total" id="exampleFormControlInput1" placeholder="مانده موجودی " value="{{$data->total}}">
                </div>
                @error ('total')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput2" class="form-label">بدهکاری  </label>
                    <input type="number" class="form-control text-center" name="indebted" id="exampleFormControlInput2"  placeholder="مقدار بدهکاری " value="{{$data->indebted}}">
                </div>
                @error ('indebted')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput3" class="form-label">بستانکاری </label>
                    <input type="number" class="form-control text-center" name="creditor" id="exampleFormControlInput3"  placeholder=" بستانکاری" value="{{$data->creditor}}">
                </div>
                @error ('creditor')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput4" class="form-label">توضیحات </label>
                    <input type="text" class="form-control text-center" name="des" id="exampleFormControlInput4"  placeholder=" توضیحات" value="{{$data->des}}">
                </div>
                @error ('des')
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
