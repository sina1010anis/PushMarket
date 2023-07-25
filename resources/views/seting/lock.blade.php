@extends('seting.page')

@section('index')
<div class='px-5'>
    <div class="d-flex justify-content-between align-items-center ">
        <span class="my-font-IYM my-f-18 my-color-b-600"> قفلگذاری</span>
        <i class="bi bi-key my-color-bl" style="font-size: 55px"></i>
    </div>
    <hr>
    <div>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> قفل کردن بخش صندوقداری</p>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked2" checked>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2"> قفل کردن منو  <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر قفل میشود و باید با پسورد مورد نظر وارد شودیذ)</span></label>
            </div>
            <form>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-g my-f-12-i my-font-IYM my-color-b-700-i m-2">ذخیره</button>
                    <input type="password" class="form-control form-control-sm my-f-11-i  p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password_aft" placeholder="پسورد جدید">
                    <input type="password" class="form-control form-control-sm my-f-11-i p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password_bef" placeholder="پسورد فعالی">
                </div>
            </form>
        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> قفل کردن بخش حسابداری</p>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked2" checked>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2"> قفل کردن منو  <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر قفل میشود و باید با پسورد مورد نظر وارد شودیذ)</span></label>
            </div>
            <form>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-g my-f-12-i my-font-IYM my-color-b-700-i m-2">ذخیره</button>
                    <input type="password" class="form-control form-control-sm my-f-11-i  p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password_aft" placeholder="پسورد جدید">
                    <input type="password" class="form-control form-control-sm my-f-11-i p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password_bef" placeholder="پسورد فعالی">
                </div>
            </form>
        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> قفل کردن بخش انبارداری</p>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked2" checked>
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2"> قفل کردن منو  <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر قفل میشود و باید با پسورد مورد نظر وارد شودیذ)</span></label>
            </div>
            <form>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-g my-f-12-i my-font-IYM my-color-b-700-i m-2">ذخیره</button>
                    <input type="password" class="form-control form-control-sm my-f-11-i  p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password_aft" placeholder="پسورد جدید">
                    <input type="password" class="form-control form-control-sm my-f-11-i p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password_bef" placeholder="پسورد فعالی">
                </div>
            </form>
        </div>
        <hr>
    </div>
</div>



@endsection
