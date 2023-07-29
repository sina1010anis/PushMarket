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
                <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked2" {{($seting->find(12)->status == 1) ? 'checked' : ''}} @click="edit_setting(12)">
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2"> قفل کردن منو  <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر قفل میشود و باید با پسورد مورد نظر وارد شودیذ)</span></label>
            </div>
            @if ($seting->find(12)->status == 1)
                <form action="{{route('seting.edit.lock' , ['type' => 'lock_cashire'])}}" method="POST">@csrf
                    <div class="d-flex justify-content-center align-items-center">
                        <input type="text" class="form-control form-control-sm my-f-11-i p-2 my-font-IYM my-color-b-500 m-2 text-center" name="username" placeholder="نام کاربری ">
                        <input type="password" class="form-control form-control-sm my-f-11-i  p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password" placeholder="پسورد">
                        <button type="submit" class="btn btn-g my-f-12-i my-font-IYM my-color-b-700-i m-2">ذخیره</button>
                    </div>
                </form>
            @endif

        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> قفل کردن بخش حسابداری</p>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked3" {{($seting->find(13)->status == 1) ? 'checked' : ''}} @click="edit_setting(13)">
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked3"> قفل کردن منو  <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر قفل میشود و باید با پسورد مورد نظر وارد شودیذ)</span></label>
            </div>
            @if ($seting->find(13)->status == 1)
                <form action="{{route('seting.edit.lock' , ['type' => 'lock_acco'])}}" method="POST">@csrf
                    <div class="d-flex justify-content-center align-items-center">
                        <input type="text" class="form-control form-control-sm my-f-11-i p-2 my-font-IYM my-color-b-500 m-2 text-center" name="username" placeholder="نام کاربری ">
                        <input type="password" class="form-control form-control-sm my-f-11-i  p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password" placeholder="پسورد">
                        <button type="submit" class="btn btn-g my-f-12-i my-font-IYM my-color-b-700-i m-2">ذخیره</button>
                    </div>
                </form>
            @endif
        </div>
        <hr>
        <div class=" my-4">
            <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> قفل کردن بخش انبارداری</p>
            <div class="form-check form-switch d-flex justify-content-between align-items-center my-3 px-4">
                <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked4" {{($seting->find(14)->status == 1) ? 'checked' : ''}} @click="edit_setting(14)">
                <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked4"> قفل کردن منو  <span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه منو مورد نظر قفل میشود و باید با پسورد مورد نظر وارد شودیذ)</span></label>
            </div>
            @if ($seting->find(14)->status == 1)
                <form action="{{route('seting.edit.lock' , ['type' => 'lock_store'])}}" method="POST">@csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <input type="text" class="form-control form-control-sm my-f-11-i p-2 my-font-IYM my-color-b-500 m-2 text-center" name="username" placeholder="نام کاربری ">
                            <input type="password" class="form-control form-control-sm my-f-11-i  p-2 my-font-IYM my-color-b-500 m-2 text-center" name="password" placeholder="پسورد">
                        <button type="submit" class="btn btn-g my-f-12-i my-font-IYM my-color-b-700-i m-2">ذخیره</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@if (session('msg'))
<div class="page-msg-session px-4 py-2 my-font-IYM my-f-12 rounded-3 shadow text-center" dir="rtl">
    {{session('msg')}}
</div>
@endif


@endsection
