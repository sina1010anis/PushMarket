@extends('welcome')

@section('index')
    <div class="w-100 d-flex justify-content-center align-items-center my-font-IYM" style="height: 80%;">
        <a href="{{route('seting.index')}}"  class="btn btn-bl btn-lg m-3 shadow">تنظیمات</a>
        <a href="{{route('store.index')}}"  class="btn btn-r btn-lg m-3 shadow">انبارداری</a>
        <a href="{{route('acco.index')}}"  class="btn-b btn btn-lg m-3 shadow">حسابداری</a>
        <a href="{{route('cashier.index')}}"  class="btn-g btn btn-lg m-3 shadow">صندوقداری</a>
    </div>
@endsection
