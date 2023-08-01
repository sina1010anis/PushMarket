@extends('acco.page')

@section('index')
    <div class="row h-100" >
        <div class="col-8 p-2" style="background-color: rgb(255, 240, 240)">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <button @click="new_acco" class="btn btn-g my-font-IYM-i my-f-9 my-2 btn-sm">
                    اضافه نمودن
                </button>
                <p class="my-font-IYM my-f-15 my-color-b-700 text-center p-0 m-0 my-select-none">
                    <span class="my-f-12 my-color-b-500 ">({{$acco->name}} : {{$acco->number}})</span>
                    مدریت حساب اصلی
                </p>
            </div>
            <hr>

            <div style="overflow-y: scroll;height: 600px;">
                <table dir="rtl" class="table">
                    <thead>
                    <tr  class="my-font-IYL my-f-14 my-color-b-900">
                        <th scope="col">ردیف</th>
                        <th scope="col">موجودی کل حساب</th>
                        <th scope="col">بدهکاری</th>
                        <th scope="col">طلبکاری</th>
                        <th scope="col">تاریخ ثبت</th>
                        <th scope="col"> توضیحات</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($accounts as $account)
                        <tr dir="rtl" class="my-font-IYL my-f-13 my-color-b-700">
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{number_format($account->total , 0 , '.' , ',') }} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                            <td>{{number_format($account->indebted , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                            <td>{{number_format($account->creditor , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                            <td>{{jdate($account->created_at)->format('%A, %d %B %y')}}</td>
                            <td>{{($account->des !=Null) ? $account->des : '--'}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                                <a class="btn btn-b my-f-8-i mx-1 btn-sm" href="{{route('acco.edit.acco' , ['DataAcco' => $account->id])}}">ویرایش</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-4">
            <div class="h-50  p-2" style="background-color: rgb(240, 255, 245)">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <button @click="new_cash" class="btn btn-g my-font-IYM-i my-f-9 my-2 btn-sm">
                        اضافه نمودن
                    </button>
                    <p class="my-font-IYM my-f-15 my-color-b-700 text-center p-0 m-0">مدریت حساب های نقدی</p>
                </div>
                <hr>
                <div class="overflow-y-scroll" style="max-height: 300px;height: 100%">
                    @forelse ($account_cashs as $account_cash)
                        <div class="w-100 my-3 border-bottom border-top p-2">
                            @if($account_cash->stauts == 0)
                                <del>
                                    <div style="background-color: rgb(255, 233, 233)" class="d-flex justify-content-between align-items-center my-pointer" @click="edit_status_cash({{$account_cash->stauts}} , {{$account_cash->id}} , 'cash')">
                                        <span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($account_cash->created_at)->format('%A, %d %B %y')}}</span>
                                        <span class="my-f-10 my-font-IYM my-color-b-900">{{$account_cash->des }}</span>
                                        <span class="my-f-10 my-font-IYM my-color-b-900">{{number_format($account_cash->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></span>
                                    </div>
                                </del>
                            @else
                                <div class="d-flex justify-content-between align-items-center my-pointer" @click="edit_status_cash({{$account_cash->stauts}} , {{$account_cash->id}} , 'cash')">
                                    <span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($account_cash->created_at)->format('%A, %d %B %y')}}</span>
                                    <span class="my-f-10 my-font-IYM my-color-b-900">{{$account_cash->des }}</span>
                                    <span class="my-f-10 my-font-IYM my-color-b-900">{{number_format($account_cash->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></span>
                                </div>
                            @endif
                        </div>
                    @empty
                    <div class="d-flex justify-content-center align-items-center">
                        <div dir="rtl" class="my-f-10 my-font-IYM my-color-b-900 text-center">چیزی یافت نشد...!</div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="h-50 p-2"  style="background-color: rgb(251, 255, 240)">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <button @click="new_bank" class="btn btn-g my-font-IYM-i my-f-9 my-2 btn-sm">
                        اضافه نمودن
                    </button>
                    <p class="my-font-IYM my-f-15 my-color-b-700 text-center p-0 m-0">لیست حساب بانکی</p>
                </div>                <hr>
                <div class="overflow-y-scroll" style="max-height: 255px;height: 100%">
                @forelse ($account_bancks as $account_banck)
                <div class="w-100 my-3 border-bottom border-top p-2 my-pointer">
                    @if($account_banck->stauts == 0)
                        <del>
                            <div style="background-color: rgb(255, 233, 233)" class="d-flex justify-content-between align-items-center" @click="edit_status_cash({{$account_banck->stauts}} , {{$account_banck->id}} , 'bank')">
                                <span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($account_banck->created_at)->format('%A, %d %B %y')}}</span>
                                <span class="my-f-10 my-font-IYM my-color-b-900">{{$account_banck->des }}</span>
                                <span class="my-f-10 my-font-IYM my-color-b-900">{{number_format($account_banck->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></span>
                            </div>
                        </del>
                    @else
                        <div class="d-flex justify-content-between align-items-center" @click="edit_status_cash({{$account_banck->stauts}} , {{$account_banck->id}} , 'bank')">
                            <span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($account_banck->created_at)->format('%A, %d %B %y')}}</span>
                            <span class="my-f-10 my-font-IYM my-color-b-900">{{$account_banck->des }}</span>
                            <span class="my-f-10 my-font-IYM my-color-b-900">{{number_format($account_banck->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></span>
                        </div>
                    @endif
                </div>
            @empty
                <div class="d-flex justify-content-center align-items-center">
                    <div dir="rtl" class="my-f-10 my-font-IYM my-color-b-900 text-center">چیزی یافت نشد...!</div>
                </div>
            @endforelse
                </div>
            </div>
        </div>
    </div>

<div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;position: fixed;top:0;left:0"></div>
<div class="page-new-product-2 p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یک داده جدید</p>
    <hr>
    <form action="{{route('acco.new.acco')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">مانده حساب</span>
            <input type="number" value="{{old('total')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="مانده حساب ..." name="total">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">بدهکاری</span>
            <input type="number" value="{{old('indebted')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="بدهکاری..." name="indebted">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">بستانکاری</span>
            <input type="number" value="{{old('creditor')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="بستانکاری ...." name="creditor">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">توضیحات</span>
            <input type="text" value="{{old('des')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="توضیحات ...." name="des">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت داده جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>

<div class="page-new-product-3 page-new p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یک داده جدید</p>
    <hr>
    <form action="{{route('acco.new.cash')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">مقدار </span>
            <input type="number" value="{{old('total')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="مقدار  ..." name="total">

        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">توضیحات</span>
            <input type="text" value="{{old('des')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="توضیحات ...." name="des">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت داده جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>

<div class="page-new-product-4 page-new p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یک داده جدید</p>
    <hr>
    <form action="{{route('acco.new.bank')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">مقدار </span>
            <input type="number" value="{{old('total')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="مقدار  ..." name="total">

        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">توضیحات</span>
            <input type="text" value="{{old('des')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="توضیحات ...." name="des">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت داده جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>
@endsection
