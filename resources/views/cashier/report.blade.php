@extends('cashier.page')

@section('index')

<div class="row" >
    <div class="col-12 my-2">
        @if(!isset($date))
            <p dir="rtl" class="text-center pb-2 border-bottom my-f-20 my-font-IYM my-color-b-800">فاکتور های تاریخ : <span class="my-f-18 my-font-IYM my-color-b-500">{{jdate()->format('%B %d، %Y')}}</span></p>
        @else
            <p dir="rtl" class="text-center pb-2 border-bottom my-f-20 my-font-IYM my-color-b-800">{{$date}}</p>
        @endif
    </div>
    <div class="col-6" >
        <form style="background-color: rgb(252, 249, 255)" action="{{route('cashier.reprot.products')}}" method="post" class=" text-center border p-1">
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
        <form style="background-color: rgb(249, 249, 255)" action="{{route('cashier.reprot.products')}}" method="post" class="text-center border p-1">
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

    <div class="col-12 mt-3">
        <table dir="rtl" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ردیف</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ایدی</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">جمع قیمت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">جمع تعداد محصولات</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">محصولات</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تاریخ ثبت</th>
                </tr>
            </thead>
            <tbody>

                    @csrf
                    @foreach ($factors as $factor)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{$factor->id}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{ number_format($factor->total_price , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{$factor->total_number}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                                @foreach ($factor->products as $product)
                                    <div class="w-100  my-1 d-flex justify-content-between align-items-center border-bottom" >
                                        <img src="/{{$product->image}}" width="35" height="35" alt="">
                                        <p class="my-f-9 my-font-ISL my-color-b-600">{{$product->total_number . ' - ' .  number_format($product->total_price , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></p>
                                    </div>
                                @endforeach
                            </td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{jdate($factor->created_at)->format('%A, %d %B %y')}}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- <div class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
<div class="page-new-product p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">@{{barcode_new_product}}</p>
    <hr>
    <form action="{{route('cashier.u_new.products')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
            <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام محصول برای نمایش ..." name="name">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">قیمت</span>
            <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="قیمت محصول به ریال می باشد..." name="price">
        </div>
        <div class="mb-3 input-group-sm">
            <input class="form-control my-font-IYL my-f-11-i" name="image" type="file" id="formFile">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-success btn-sm my-font-IYL my-f-11-i mb-3">ثبت محصول جدید</button>
        </div>
    </form>
</div> --}}
@endsection
