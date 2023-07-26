@extends('welcome')

@section('index')
    <div class="w-100 d-flex justify-content-center align-items-center my-font-IYM" style="height: 80%;">
        <a href="{{route('seting.index')}}"  class="btn btn-bl btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
            <i class="bi bi-gear" style="font-size: 65px"></i>
            <span class="my-f-15">تنظیمات</span>
        </a>
        @if($seting->find(7)->status == 1)
            <a href="{{route('store.index')}}"  class="btn btn-r btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
                <i class="bi bi-box-seam" style="font-size: 65px"></i>
                <span class="my-f-15">انبارداری</span>
            </a>
        @endif
        <a href="{{route('acco.index')}}"  class="btn-b btn btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
            <i class="bi bi-safe" style="font-size: 65px"></i>
            <span class="my-f-15">حسابداری</span>
        </a>
        <a href="{{route('cashier.index')}}"  class="btn-g btn btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
            <i class="bi bi-person-video3" style="font-size: 65px"></i>
            <span class="my-f-15">صندوقداری</span>
        </a>
    </div>
@endsection
