@extends('welcome')

@section('index')
    <div class="row" style="height: 721px;">
        <div class="col-12  p-2" style="background-color: rgb(255, 240, 240)">
            <form action="{{route('store.delete.store')}}" method="post">
                @csrf
                <div class="col-12 d-flex align-items-center">
                    <button type="button" @click="new_store" class="btn mx-2 btn-g my-font-IYM-i my-f-9 my-2 btn-sm">
                        اضافه نمودن
                    </button>
                    <button type="submit" class="btn btn-r my-font-IYM-i my-f-9 my-2 btn-sm">
                        حذف نمودن
                    </button>
                    <p class="my-font-IYM my-f-15 my-color-b-700 text-center p-0 m-0 ms-auto">ورودی ها</p>
                </div>
                <hr>
                <div style="overflow-y: scroll;height: 600px;">
                    <table dir="rtl" class="table">
                        <thead>
                        <tr  class="my-font-IYL my-f-14 my-color-b-900">
                            <th scope="col">ردیف</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">محل انبار</th>
                            <th scope="col">تعداد جعبه</th>
                            <th scope="col"> تعداد محصولات تک</th>
                            <th scope="col">تاریخ ورود</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($stores as $store)
                            <tr dir="rtl" class="my-font-IYL my-f-13 my-color-b-700">
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$store->name }} </td>
                                <td>{{$store->location }} </td>
                                <td>{{$store->box }} </td>
                                <td>{{$store->total_number }} </td>
                                <td><span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($store->created_at)->format('%A, %d %B %y')}}</span></td>
                                <td class="my-font-ISL my-f-12 my-color-b-600">
                                    <div class="form-check ">
                                        <input class="form-check-input my-pointer" type="checkbox" name="id_store[]" value="{{$store->id}}" id="flexCheckDefault{{$store->id}}">
                                        <label class="form-check-label" for="flexCheckDefault{{$store->id}}">
                                        حذف
                                        </label>
                                    </div>
                                    <a class="btn btn-b my-f-8-i mx-1 btn-sm" href="{{route('store.edit.product' , ['data' => $store->id])}}">ویرایش</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </form>
        </div>
    </div>
<div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
<div class="page-new-product page-new p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یک طلبکار جدید</p>
    <hr>
    <form action="{{route('store.new.store')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
            <input type="text" value="{{old('name')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام محصول برای نمایش ..." name="name">
        </div>
        @error ('name')
            <div class="d-flex justify-content-center align-items-center my-3">
                <div class="w-75">
                    <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                </div>
            </div>
        @endif
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">قیمت</span>
            <input type="text" value="{{old('price')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="قیمت محصول به ریال می باشد..." name="price">
        </div>
        @error ('price')
            <div class="d-flex justify-content-center align-items-center my-3">
                <div class="w-75">
                    <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                </div>
            </div>
        @endif
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">موقعیت در انبار</span>
            <input type="text" value="{{old('location')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="موضقعیت در انبار" name="location">
        </div>
        @error ('location')
            <div class="d-flex justify-content-center align-items-center my-3">
                <div class="w-75">
                    <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                </div>
            </div>
        @endif
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">تعداد کل (تک)</span>
            <input type="text" value="{{old('total_number')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="تعداد کل" name="total_number">
        </div>
        @error ('total_number')
            <div class="d-flex justify-content-center align-items-center my-3">
                <div class="w-75">
                    <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                </div>
            </div>
        @endif
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">تعداد کل جعبه ها</span>
            <input type="text" value="{{old('box')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="تعداد کل جعبه ها" name="box">
        </div>
        @error ('box')
            <div class="d-flex justify-content-center align-items-center my-3">
                <div class="w-75">
                    <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                </div>
            </div>
        @endif
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL my-f-11-i mb-3">ثبت محصول جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>

@endsection
