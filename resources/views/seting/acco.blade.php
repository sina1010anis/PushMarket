@extends('seting.page')

@section('index')
<div class='px-5'>
    <div class="d-flex justify-content-between align-items-center ">
        <span class="my-font-IYM my-f-18 my-color-b-600"> حسابداری</span>
        <i class="bi bi-cash-coin my-color-bl" style="font-size: 55px"></i>
    </div>
    <hr>
    <div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button @click="open_win_delete('\\App\\Models\\Account')" class="btn btn-sm my-f-11-i my-font-IYM-i {{(\App\Models\Account::count() > 0) ? 'btn-r' : 'btn-bl' }}" {{(\App\Models\Account::count() > 0) ? '' : 'disabled' }}>حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> حذف تمام دیتا های حساب اصلی <span class="my-f-10-i my-color-b-500">(با زدن دکم حذف همه دیتا های محصولات حذف شده و قابلیت برگشت ندارد)</span></span>
        </div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button @click="open_win_delete('\\App\\Models\\AccountBanck')" class="btn btn-sm my-f-11-i my-font-IYM-i {{(\App\Models\AccountBanck::count() > 0) ? 'btn-r' : 'btn-bl' }}" {{(\App\Models\AccountBanck::count() > 0) ? '' : 'disabled' }}>حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> حذف تمام دیتا های حساب بانکی <span class="my-f-10-i my-color-b-500">(با زدن دکم حذف همه دیتا های محصولات حذف شده و قابلیت برگشت ندارد)</span></span>
        </div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button @click="open_win_delete('\\App\\Models\\AccountCash')" class="btn  btn-sm my-f-11-i my-font-IYM-i {{(\App\Models\AccountCash::count() > 0) ? 'btn-r' : 'btn-bl' }}" {{(\App\Models\AccountCash::count() > 0) ? '' : 'disabled' }} >حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> حذف تمام دیتا های حساب نقدی <span class="my-f-10-i my-color-b-500">(با زدن دکم حذف همه دیتا های محصولات حذف شده و قابلیت برگشت ندارد)</span></span>
        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> حساب بانکی</p>
            <div class=" d-flex justify-content-between align-items-center px-3">
                <select @change="edit_def_acco" v-model="id_acco" dir="rtl" class="form-select form-select-sm shadow-none my-font-IYM my-f-13 my-color-b-600" style="width: 120px" aria-label="Default select example">
                    @foreach ($all_acco as $acco)
                        @if($acco->id != $seting->where('type' , 'def_acco')->first()->status)
                            <option  value="{{$acco->id}}">{{$acco->name}}</option>
                        @endif
                    @endforeach
                </select>
                <label class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2">(حساب انتخاب شده : {{\App\Models\AllAccount::where('id' , $seting->where('type' , 'def_acco')->first()->status)->first()->name}}) انتخاب به عنوان حساب پیشفرض </label>
            </div>
            <div class=" d-flex justify-content-between align-items-center my-4 px-3">
                <button @click="new_store" class="btn btn-g btn-sm my-f-11-i my-font-IYM-i">اضافه کردن </button>
                <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> ایجاد یک حساب جدید  <span class="my-f-10-i my-color-b-500">(بعد از اضافه کردن امکان انتخاب  حساب بانکی به عنوان حساب پیشفرض را دارید)</span></span>
            </div>
        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> تنظیمات منو های حسابداری </p>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input  class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked4" {{($seting->find(8)->status == 1) ? 'checked' : ''}} @click="edit_setting(8)">
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked4"> مدریت حساب ها </label>
            </div>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input  class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked5" {{($seting->find(9)->status == 1) ? 'checked' : ''}} @click="edit_setting(9)">
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked5">   گزارش کار </label>
            </div>
        </div>
    </div>
</div>

<div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
<div class="page-new-product p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یک حساب بانکی جدید</p>
    <hr>
    <form action="{{route('seting.new.acco')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
            <input type="text" value="{{old('name')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام حساب بانکی ..." name="name">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">شماره کارت</span>
            <input type="text" value="{{old('number')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="شماره کار ..." name="number">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت محصول جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>

<div class="page-news page-delete p-3">
    <div class="d-flex justify-content-between align-items-center">
        <span><i class="bi bi-exclamation-circle my-f-22" style="color: rgb(255, 73, 73)"></i></span>
        <span class="text-center my-font-IYM my-f-12 my-color-b-600">اخطار</span>
    </div>
    <hr>
    <div class="my-3">
        <p dir="rtl" class="text-center my-font-IYM my-f-13 my-color-b-600">ایا از حذف همه دیتا ها اطمینان دارید...</p>
    </div>
    <div dir="rtl" class="col-auto d-flex align-items-center">
        <button @click="delete_all()" type="button" class="btn btn-r btn-sm my-font-IYL-i my-f-11-i mb-3">بله</button>
        <button @click="cls_page" type="button" class="btn btn-bl mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن بنچره</button>
    </div>
</div>
@endsection
