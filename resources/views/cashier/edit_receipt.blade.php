@extends('cashier.page')

@section('index')
<div dir="rtl" class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="w-100 p-2 border rounded-5 shadow">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">ویرایش دریافتی ها</p>
            <hr>
            <br>
            @if (session('msg'))
                <div class="d-flex justify-content-center align-items-center my-3">
                    <div class="w-75">
                        <div class="alert alert-success text-center my-f-13 my-font-IYM">{{session('msg')}}</div>
                    </div>
                </div>
            @endif
            <form action="{{route('cashier.receipt.edit.post' , ['id' => $data->id])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput1" class="form-label">نام </label>
                    <input type="text" class="form-control text-center" name="name" id="exampleFormControlInput1" placeholder="نام " value="{{$data->name}}">
                </div>
                @error ('name')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput2" class="form-label">مقدار دریافتی </label>
                    <input type="number" class="form-control text-center" name="price" id="exampleFormControlInput2"  placeholder="مقدار دریافتی " value="{{$data->price}}">
                </div>
                @error ('price')
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
