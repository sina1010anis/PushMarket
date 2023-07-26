@extends('seting.page')

@section('index')
<div class='px-5'>
    <div class="d-flex justify-content-between align-items-center ">
        <span class="my-font-IYM my-f-18 my-color-b-600"> حسابداری</span>
        <i class="bi bi-person-vcard my-color-bl" style="font-size: 55px"></i>
    </div>
    <hr>
    <div>
        <div class="form-check form-switch d-flex justify-content-between align-items-center my-4">
            <input @click="edit_setting(1)" class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{($seting->find(1)->status == 1) ? 'checked' : ''}} >
            <label class="form-check-label my-pointer my-select-none my-f-12 my-font-IYL my-color-b-800" for="flexSwitchCheckChecked"><span class="my-f-11-i my-color-b-500">(با فعال بودن این گزینه فقط بخش صندوقداری قابل نمایش می باشد)</span>  نمایش پنچره صندوقداری تنها</label>
        </div>
        <div class="form-check form-switch d-flex justify-content-between align-items-center my-4">
            <input @click="edit_setting(2)" class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked1" {{($seting->find(2)->status == 1) ? 'checked' : ''}}>
            <label dir="rtl" class="form-check-label my-select-none my-pointer my-f-12 my-font-IYL my-color-b-800" for="flexSwitchCheckChecked1"> واحد نمایش قیمت ها <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه به صورت ریال نمایش داده می شود غیر فعال بودن به صورت تومان نمایش داده می شود)</span></label>
        </div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button @click="delete_all('\\App\\Models\\Product')" class="btn btn-sm my-f-11-i my-font-IYM-i {{(\App\Models\Product::count() > 0) ? 'btn-r' : 'btn-bl' }}" {{(\App\Models\Product::count() > 0) ? '' : 'disabled' }}>حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> حذف تمام محصولات داخل دیتابیس <span class="my-f-10-i my-color-b-500">(با زدن دکم حذف همه دیتا های محصولات حذف شده و قابلیت برگشت ندارد)</span></span>
        </div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button @click="delete_all('\\App\\Models\\Creditor')" class="btn btn-sm my-f-11-i my-font-IYM-i {{(\App\Models\Creditor::count() > 0) ? 'btn-r' : 'btn-bl' }}" {{(\App\Models\Creditor::count() > 0) ? '' : 'disabled' }}>حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800" > حذف تمام دیتاهای   طلبکاری  از بخش صندوقداری <span class="my-f-10-i my-color-b-500">(قابلیت برگشت ندارد)</span></span>
        </div>
        <div class=" d-flex justify-content-between align-items-center my-4">
            <button @click="delete_all('\\App\\Models\\Receipt')" class="btn btn-sm my-f-11-i my-font-IYM-i {{(\App\Models\Receipt::count() > 0) ? 'btn-r' : 'btn-bl' }}" {{(\App\Models\Receipt::count() > 0) ? '' : 'disabled' }}>حذف دیتا</button>
            <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800" > حذف تمام دیتاهای   هزینه دریافتی  از بخش صندوقداری <span class="my-f-10-i my-color-b-500">(قابلیت برگشت ندارد)</span></span>
        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> تنظیمات منو صندوقدار</p>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input @click="edit_setting(3)" class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked2" {{($seting->find(3)->status == 1) ? 'checked' : ''}}>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2"> فروش محصولات <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر فعال می شود)</span></label>
            </div>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input  class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked3" {{($seting->find(4)->status == 1) ? 'checked' : ''}} @click="edit_setting(4)">
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked3">  گزارش فرایند <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر فعال می شود)</span></label>
            </div>

            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input @click="edit_setting(5)" class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked4" {{($seting->find(5)->status == 1) ? 'checked' : ''}}>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked4"> مدریت محصولات <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر فعال می شود)</span></label>
            </div>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input @click="edit_setting(6)" class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked5" {{($seting->find(6)->status == 1) ? 'checked' : ''}}>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked5">   بستانکاری <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر فعال می شود)</span></label>
            </div>
        </div>
    </div>
</div>
@endsection
