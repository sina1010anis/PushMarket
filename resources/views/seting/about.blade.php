@extends('seting.page')

@section('index')
    <div class='px-5'>
        <div class="d-flex justify-content-between align-items-center ">
            <span class="my-font-IYM my-f-18 my-color-b-600"> درباره نرم افزار</span>
            <i class="bi bi-clipboard my-color-bl" style="font-size: 55px"></i>
        </div>
        <hr>
        <div class="my-select-none">
            <div class="d-flex justify-content-between align-items-center my-4">
                <span class="my-font-IYM my-color-b-400 my-f-13"> {{$seting->where('type' , 'name')->first()->status}}</span>
                <span class="my-font-IYM my-color-b-800 my-f-14">:نام نرم نرم افزار</span>
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <span class="my-font-IYM my-color-b-400 my-f-14"> {{$seting->where('type' , 'type')->first()->status}}</span>
                <span class="my-font-IYM my-color-b-800 my-f-14">:نوع نرم افزار</span>
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <span class="my-font-IYM my-color-b-400 my-f-14"> 1.0.3 </span>
                <span class="my-font-IYM my-color-b-800 my-f-14">:نسخه نرم افزار</span>
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <span class="my-font-IYM my-color-b-400 my-f-14"> {{$seting->where('type' , 'key')->first()->status}}</span>
                <span class="my-font-IYM my-color-b-800 my-f-14">:قفل نرم افزار</span>
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <span class="my-font-IYM my-color-b-400 my-f-14"> {{$seting->where('type' , 'devloper')->first()->status}}</span>
                <span class="my-font-IYM my-color-b-800 my-f-14">:توسعه دهنده نرم افزار</span>
            </div>
            <div class="d-flex justify-content-between align-items-center my-4">
                <a href="{{$seting->where('type' , 'Git Hub')->first()->status}}" class="my-font-IYM my-color-b-400" style="color: rgb(52, 143, 255)"> {{$seting->where('type' , 'Git Hub')->first()->type}}</a>
                <span class="my-font-IYM my-color-b-800 my-f-14">:لینک گیت هاب توسعه دهنده</span>
            </div>
        </div>
        <hr>
        <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
            <input  class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked5" {{($seting->find(19)->status == 1) ? 'checked' : ''}} @click="edit_setting(19)">
            <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" dir="rtl" for="flexSwitchCheckChecked5">ساعت جهانی 3:30+ به وقت ایران</label>
        </div>
        <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
            <input  class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked6" {{($seting->find(22)->status == 1) ? 'checked' : ''}} @click="edit_setting(22)">
            <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" dir="rtl" for="flexSwitchCheckChecked6"> نمایش لودینگ</label>
        </div>
    </div>

@endsection
