@extends('welcome')

@section('index')
    <div class=" d-flex justify-content-center flex-wrap m-0 p-0 align-items-center my-font-IYM" style="height: 100vh;width: 100wh;background-color: #011f33">
        <a href="{{route('seting.index')}}"  class="btn btn-sa-re btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
            <i class="bi bi-gear" style="font-size: 65px"></i>
            <span class="my-f-15">تنظیمات</span>
        </a>
        <a href="{{route('notbook.index')}}"  class="btn btn-sa btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
            <i class="bi bi-calendar2-date" style="font-size: 65px"></i>
            <span class="my-f-15"> تقویم کاری</span>
        </a>
        <a href="{{route('notbook.index')}}"  class="btn btn-sa btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
            <i class="bi bi-journal" style="font-size: 65px"></i>
            <span class="my-f-15">یادداشت ها</span>
        </a>
        @if($seting->find(7)->status == 1)
            <a href="{{route('store.index')}}"  class="btn btn-sa btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
                <i class="bi bi-box-seam" style="font-size: 65px"></i>
                <span class="my-f-15">انبارداری</span>
            </a>
        @endif
        <a href="{{route('acco.index')}}"  class="btn-sa btn btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
            <i class="bi bi-safe" style="font-size: 65px"></i>
            <span class="my-f-15">حسابداری</span>
        </a>
        <a href="{{route('cashier.index')}}"  class="btn-sa btn btn-lg m-3 px-5 shadow d-flex btn-menu-as flex-column">
            <i class="bi bi-person-video3" style="font-size: 65px"></i>
            <span class="my-f-15">صندوقداری</span>
        </a>
    </div>
@endsection
