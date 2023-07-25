@extends('seting.page')

@section('index')
<div class='px-5'>
    <div class="d-flex justify-content-between align-items-center ">
        <span class="my-font-IYM my-f-18 my-color-b-600"> صندوقداری</span>
        <i class="bi bi-cash-coin my-color-bl" style="font-size: 55px"></i>
    </div>
    <hr>
    <div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button class="btn btn-r btn-sm my-f-11-i my-font-IYM-i">حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> حذف تمام دیتا های حساب اصلی <span class="my-f-10-i my-color-b-500">(با زدن دکم حذف همه دیتا های محصولات حذف شده و قابلیت برگشت ندارد)</span></span>
        </div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button class="btn btn-r btn-sm my-f-11-i my-font-IYM-i">حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> حذف تمام دیتا های حساب بانکی <span class="my-f-10-i my-color-b-500">(با زدن دکم حذف همه دیتا های محصولات حذف شده و قابلیت برگشت ندارد)</span></span>
        </div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button class="btn btn-r btn-sm my-f-11-i my-font-IYM-i">حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> حذف تمام دیتا های حساب نقدی <span class="my-f-10-i my-color-b-500">(با زدن دکم حذف همه دیتا های محصولات حذف شده و قابلیت برگشت ندارد)</span></span>
        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> حساب بانکی</p>
            <div class=" d-flex justify-content-between align-items-center px-3">
                <select dir="rtl" class="form-select form-select-sm shadow-none my-font-IYM my-f-13 my-color-b-600" style="width: 120px" aria-label="Default select example">
                    <option value="1">حساب اول</option>
                    <option value="2">حساب دوم</option>
                    <option value="3">حساب سوم</option>
                </select>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2"> انتخاب به عنوان حساب پیشفرض </label>
            </div>
            <div class=" d-flex justify-content-between align-items-center my-4 px-3">
                <button class="btn btn-g btn-sm my-f-11-i my-font-IYM-i">اضافه کردن </button>
                <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> ایجاد یک حساب جدید  <span class="my-f-10-i my-color-b-500">(بعد از اضافه کردن امکان انتخاب  حساب بانکی به عنوان حساب پیشفرض را دارید)</span></span>
            </div>
        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> تنظیمات منو های حسابداری </p>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked4" checked>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked4"> مدریت حساب ها </label>
            </div>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked5" checked>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked5">   گزارش کار </label>
            </div>
        </div>
    </div>
</div>



@endsection
