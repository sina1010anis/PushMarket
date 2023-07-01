@extends('welcome')

@section('index')
<div class="w-100" style="height: 100vh;">
    <div class="w-100 d-flex justify-content-center align-items-center my-f-15 my-font-IYM text-secondary " dir="rtl" style="height: 5%;background-color: #efefef">نرم افزار مدریتی PushMarket</div>
    <div class="w-100 d-flex justify-content-center align-items-center my-font-IYM" style="height: 90%;">
        <a href="" class="btn btn-danger btn-lg m-3 shadow">انبارداری</a>
        <a href="{{route('cashier.index')}}" class="btn btn-success btn-lg m-3 shadow">صندوقداری</a>
    </div>
    <div class="w-100 d-flex justify-content-center align-items-center my-f-14 my-font-IYM text-secondary " dir="rtl" style="height: 5%;background-color: #efefef">نسخه اجرایی 0.0.5</div>
</div>
@endsection
