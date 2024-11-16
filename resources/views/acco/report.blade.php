@extends('acco.page')

@section('index')

<div class="row" >
    <div class="col-12">
        @if(!isset($date))
            <p dir="rtl" class="text-center border-bottom my-f-20 my-font-IYM my-color-b-800">فاکتور های تاریخ {{jdate()->now()}}</p>
        @else
            <p dir="rtl" class="text-center border-bottom my-f-20 my-font-IYM my-color-b-800">{{$date}}</p>
        @endif
    </div>
    <div class="col-6" >
        <form style="background-color: rgb(252, 249, 255)" action="{{route('acco.report.acco')}}" method="post" class=" text-center border p-1">
            <p class="text-center my-f-12 my-font-IYM my-color-b-800">گزارش بین دو تاریخ</p>
            <div class="d-flex justify-content-between align-items-center my-3">
                @csrf
                <div class="my-3">
                    <label for="as_date" class="my-font-IYL my-f-11 my-color-b-600 mx-2">از تاریخ</label>
                    <input type="date" id="as_date" name="as_date">
                </div>
                <div class="my-3">
                    <label for="ta_date" class="my-font-IYL my-f-11 my-color-b-600 mx-2">تا تاریخ</label>
                    <input type="date" id="ta_date" name="ta_date">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-bl my-font-IS my-f-10-i btn-sm">برسی فاکتور ها</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-6">
        <form style="background-color: rgb(249, 249, 255)" action="{{route('acco.report.acco')}}" method="post" class="text-center border p-1">
            <p class="text-center my-f-12 my-font-IYM my-color-b-800">گزارش تاریخ</p>
            <div class="d-flex justify-content-between align-items-center my-3">
                @csrf
                <div class="my-3">
                    <label for="as_date" class="my-font-IYL my-f-11 my-color-b-600 mx-2"> تاریخ</label>
                    <input type="date" id="as_date" name="date">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-bl my-font-IS my-f-10-i btn-sm">برسی فاکتورها</button>
                </div>
            </div>
        </form>

    </div>
    <div class="col-12">
        @if(isset($accounts))
            <div class="d-flex justify-content-center my-3">
                <span class="border p-2 rounded-2 mx-2">
                    <span dir="rtl" class="text-center border-bottom my-f-20 my-font-IYM my-color-b-800">جمع کل موجودی : {{ToRilP($accounts->sum('total'))}} </span>
                </span>
                <span class="border p-2 rounded-2 mx-2">
                    <span dir="rtl" class="text-center border-bottom my-f-20 my-font-IYM my-color-b-800">جمع کل بدهکاری ها : {{ToRilP($accounts->sum('indebted'))}} </span>
                </span>
                <span class="border p-2 rounded-2 mx-2">
                    <span dir="rtl" class="text-center border-bottom my-f-20 my-font-IYM my-color-b-800">جمع کل طلبکاری ها : {{ToRilP($accounts->sum('creditor'))}} </span>
                </span>
            </div>
        @endif
    </div>
    <div class="col-12 mt-3">
        <table dir="rtl" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ردیف</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ایدی</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">موجودی کل</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">بدهکاری</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">طلبکاری</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تاریخ ثبت</th>
                </tr>
            </thead>
            <tbody>

                    @csrf
                    @foreach ($accounts as $account)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{$account->id}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{ number_format($account->total , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{ number_format($account->indebted , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{ number_format($account->creditor , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{substr(jdate($account->created_at) , 0 , 11)}}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
