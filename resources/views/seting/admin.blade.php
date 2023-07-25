@extends('seting.page')

@section('index')
<div class='px-5'>
    <div class="d-flex justify-content-between align-items-center ">
        <span class="my-font-IYM my-f-18 my-color-b-600"> مدریتی</span>
        <i class="bi bi-person-gear my-color-bl" style="font-size: 55px"></i>
    </div>
    <hr>
    <div class=" my-4">
        <div class="form-check form-switch d-flex justify-content-between align-items-center my-3">
            <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked2" checked>
            <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2">چندکاربر کردن صندوقداری<span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه صندوقدار های مختلف میتوانید اضافه کنید)</span></label>
        </div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button class="btn btn-g btn-sm my-f-11-i my-font-IYM-i">اضافه کردن </button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> ایجاد یک صندوقدار جدید  </span>
        </div>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> مدریت صندوقدار ها</p>
            <div class="w-100 p-3  border rounded-2" style="height: 300px;overflow-y: scroll">
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
                <div dir="rtl" class="d-flex p-2 border-bottom">
                    <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">صندوقدار یک</span>
                    <a class="btn btn-b my-f-10-i my-font-IYM-i mx-1 btn-sm">ویرایش</a>
                    <a class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm">حذف</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
