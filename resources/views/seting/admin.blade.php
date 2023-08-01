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
            <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked2" {{($seting->find(11)->status == 1) ? 'checked' : ''}} @click="edit_setting(11)">
            <label dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800 my-pointer" for="flexSwitchCheckChecked2">چندکاربر کردن صندوقداری<span class="my-f-10-i my-color-b-500">(با فعال بودن این گزینه صندوقدار های مختلف میتوانید اضافه کنید)</span></label>
        </div>
        @if ($seting->find(11)->status == 1)
            <div>
                <div class=" d-flex justify-content-between align-items-center my-4">
                    <button @click="new_store" class="btn btn-g btn-sm my-f-11-i my-font-IYM-i">اضافه کردن </button>
                    <span dir="rtl" class="form-check-label my-select-none my-f-12 my-font-IYL my-color-b-800"> ایجاد یک صندوقدار جدید  </span>
                </div>
                <div class=" my-4">
                    <p dir="rtl" class="form-check-label my-f-14 my-font-IYM my-color-b-800 text-end"> مدریت صندوقدار ها</p>
                    <div class="w-100 p-3  border rounded-2" style="height: 300px;overflow-y: scroll">
                        @forelse ($cashires as $cashire)
                            <div dir="rtl" class="d-flex p-2 border-bottom">
                                <span class="ms-auto my-f-13 my-font-IYM my-color-b-600 my-select-none">{{$cashire->name}}
                                    @if ($cashire->stuats == 1)
                                        <span class="badge bg-success">انلاین</span>
                                    @else
                                        <span class="badge bg-danger">افلاین</span>
                                    @endif
                                </span>
                                <form action="{{route('seting.delete.cashire' , ['id'=>$cashire->id])}}" method="post">
                                    @csrf
                                    <button class="btn btn-r my-f-10-i my-font-IYM-i mx-1 btn-sm" type="submit">حذف</button>
                                </form>
                            </div>
                        @empty
                            <p dir="rtl" class="my-f-13 my-font-IYM my-color-b-500 text-center">موردی یافت نشد...!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
<div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
<div class="page-new-product p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یک حسابدار جدید</p>
    <hr>
    <form action="{{route('seting.new.cashire')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
            <input type="text" value="{{old('name')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام صندوقدار  ..." name="name">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام کاربری برای ورد</span>
            <input type="text" value="{{old('username')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام کاربری ..." name="username">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">رمزعبور</span>
            <input type="password" value="{{old('password')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="رمزعبور ..." name="password">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت محصول جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>


@endsection
