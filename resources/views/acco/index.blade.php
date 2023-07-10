@extends('welcome')

@section('index')
    <div class="row h-100" >
        <div class="col-8 p-2" style="background-color: rgb(255, 240, 240)">
            <p class="my-font-IYM my-f-15 my-color-b-700 text-center">مدریت حساب اصلی</p>
            <hr>
            <div style="overflow-y: scroll;height: 657px;">
                <table dir="rtl" class="table">
                    <thead>
                    <tr  class="my-font-IYL my-f-14 my-color-b-900">
                        <th scope="col">ردیف</th>
                        <th scope="col">موجودی کل حساب</th>
                        <th scope="col">بدهکاری</th>
                        <th scope="col">طلبکاری</th>
                        <th scope="col">تاریخ ثبت</th>
                        <th scope="col">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($accounts as $account)
                        <tr dir="rtl" class="my-font-IYL my-f-13 my-color-b-700">
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{number_format($account->total , 0 , '.' , ',') }} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></td>
                            <td>{{number_format($account->indebted , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></td>
                            <td>{{number_format($account->creditor , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></td>
                            <td>{{jdate($account->created_at)->format('%A, %d %B %y')}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                                <a class="btn btn-b my-f-8-i mx-1 btn-sm" href="{{route('cashier.receipt.edit' , ['data' => $account->id])}}">ویرایش</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-4">
            <div class="h-50  p-2" style="background-color: rgb(240, 255, 245)">
                <p class="my-font-IYM my-f-13 my-color-b-700 text-center">لیست حساب نقدی</p>
                <hr>
                <div class="overflow-y-scroll" style="max-height: 300px;height: 100%">
                    @forelse ($account_cashs as $account_cash)
                        <div class="w-100 my-3 border-bottom border-top p-2">
                            @if($account_cash->status == 0)
                                <del>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($account_cash->created_at)->format('%A, %d %B %y')}}</span>
                                        <span class="my-f-10 my-font-IYM my-color-b-900">{{$account_cash->des }}</span>
                                        <span class="my-f-10 my-font-IYM my-color-b-900">{{number_format($account_cash->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                                    </div>
                                </del>
                            @else
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($account_cash->created_at)->format('%A, %d %B %y')}}</span>
                                    <span class="my-f-10 my-font-IYM my-color-b-900">{{$account_cash->des }}</span>
                                    <span class="my-f-10 my-font-IYM my-color-b-900">{{number_format($account_cash->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
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
                <p class="my-font-IYM my-f-13 my-color-b-700 text-center">لیست حساب بانکی</p>
                <hr>
                <div class="overflow-y-scroll" style="max-height: 300px;height: 100%">
                @forelse ($account_bancks as $account_banck)
                <div class="w-100 my-3 border-bottom border-top p-2">
                    @if($account_banck->stauts == 0)
                        <del>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($account_banck->created_at)->format('%A, %d %B %y')}}</span>
                                <span class="my-f-10 my-font-IYM my-color-b-900">{{$account_banck->des }}</span>
                                <span class="my-f-10 my-font-IYM my-color-b-900">{{number_format($account_banck->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                            </div>
                        </del>
                    @else
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="my-f-10 my-font-IYM my-color-b-900">{{jdate($account_banck->created_at)->format('%A, %d %B %y')}}</span>
                            <span class="my-f-10 my-font-IYM my-color-b-900">{{$account_banck->des }}</span>
                            <span class="my-f-10 my-font-IYM my-color-b-900">{{number_format($account_banck->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
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
@endsection
