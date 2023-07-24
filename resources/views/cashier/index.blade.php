@extends('cashier.page')

@section('index')
<div class="row">
    <div class="col-8" style="background-color: rgb(250, 255, 250)">
        <div dir="rtl" class="row" style="background-color: rgb(255, 255, 247)">
            <div class="col-4">
                <div class="mb-3">
                    <label for="code_sus_1" class="form-label my-font-ISL my-f-11 my-color-b-600">کد مشتری</label>
                    <input type="number" class="form-control form-control-sm my-font-ISL my-f-9 p-1 my-color-b-600" id="code_sus_1" placeholder="مثل 26570014">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="code_sus_2" class="form-label my-font-ISL my-f-11 my-color-b-600">شماره همراه مشتری</label>
                    <input type="number" class="form-control form-control-sm my-font-ISL my-f-9 p-1 my-color-b-600" id="code_sus_2" placeholder="مثل 09150000000">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="code_sus_3" class="form-label my-font-ISL my-f-11 my-color-b-600">شماره تلفن مشتری</label>
                    <input type="number" class="form-control form-control-sm my-font-ISL my-f-9 p-1 my-color-b-600" id="code_sus_3" placeholder="مثل 05100000000">
                </div>
            </div>
            <div class="col-8">
                <div class="mb-3">
                    <label for="code_sus_4" class="form-label my-font-ISL my-f-11 my-color-b-600">ادرس مشتری</label>
                    <input type="text" class="form-control form-control-sm my-font-ISL my-f-9 p-1 my-color-b-600" id="code_sus_4" placeholder="مثل بلوار اول - کوچه سوم - پلاک ششم">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="code_sus_5" class="form-label my-font-ISL my-f-11 my-color-b-600">  نوع پرداخت</label>
                    <select id="code_sus_5"  class="form-select form-select-sm form-label my-font-ISL my-f-11 my-color-b-600"  aria-label="Default select example">
                        <option class="form-label my-font-ISL my-f-11 my-color-b-600" value="1">نقدی</option>
                        <option class="form-label my-font-ISL my-f-11 my-color-b-600" value="2">غیر نقدی</option>
                        <option class="form-label my-font-ISL my-f-11 my-color-b-600" value="3">چک</option>
                      </select>
                </div>
            </div>
        </div>
        <div class=" my-3">
            <input type="text" v-model="barcode" id="input_send" @keyup.enter="send_product" class="w-100 text-center my-font-IYL my-f-11" placeholder="با استفاده از بارکد خوان بارکد را وارد کنید...!" dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
        </div>
        <div class="my-3">
            <div class="w-100">
                <div v-if="first_product != null" dir="rtl" class="d-flex justify-content-between align-items-center p-2 mb-2 border" style="height: 100px;">
                    <img :src="first_product.image" width="90" height="90" alt="">
                    <span class="my-font-ISM my-f-12 my-color-b-800">@{{first_product.name}}</span>
                    <span class="my-font-ISM my-f-12 my-color-b-800">قیمت تک: @{{ToRial(first_product.price)}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                </div>
                <div v-else dir="rtl" class="d-flex justify-content-center align-items-center p-2 mb-2 border" style="height: 100px;">

                    <span class="my-font-IYL my-f-11 my-color-b-800">محصولی یافت نشد</span>
                </div>


                <div v-if="factor_product != null" dir="rtl" class="w-100  px-2" style="overflow-y: scroll;height: 300px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
                    <table class="table table-striped">
                        <thead>
                      <tr>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">ردیف</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">تصویر محصول</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">نام محصول</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">تعداد</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">قیمت واحد</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">قیمت کل</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item , index) in factor_product" @key="index">
                            <td>@{{index+1}}</td>
                            <td><img :src="item.image" width="30" height="30" alt=""></td>
                            <td><span class="my-font-IYL my-f-12 my-color-b-800">نام: @{{item.name}}</span></td>
                            <td><button class="btn-r border-0 rounded-2 mx-2" @click="number_edit--">-</button><span class="my-font-IYL my-f-12 my-color-b-800"> @{{item.total_number}} <input style="width: 40px" class="text-center" @keyup.enter="edit_product(item.id)" type="number" v-model="number_edit"></span><button class="btn-g border-0 rounded-2 mx-2" @click="number_edit++">+</button></td>
                            <td><span class="my-font-IYL my-f-12 my-color-b-800"> @{{ToRial(item.price)}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span></td>
                            <td><span class="my-font-IYL my-f-12 my-color-b-800"> @{{ToRial(item.total_price)}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span></td>
                        </tr>
                    </tbody>

                    </table>
                </div>



                <div v-else dir="rtl" class="w-100  px-2" style="overflow-y: scroll;height: 300px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
                    <table class="table table-striped">
                        <thead>
                      <tr>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">ردیف</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">تصویر محصول</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">نام محصول</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">تعداد</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">قیمت واحد</th>
                        <th scope="col" class="my-font-ISL my-f-12 my-color-b-900">قیمت کل</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row" class="my-font-IYL my-f-12 my-color-b-800">{{$loop->index+1}}</th>
                                <td><img src="{{$item->image}}" width="30" height="30" alt=""></td>
                                <td><span class="my-font-IYL my-f-12 my-color-b-800">{{$item->name}}</span></td>
                                <td><span class="my-font-IYL my-f-12 my-color-b-800"> {{$item->total_number}} <input style="width: 40px" class="text-center" @keyup.enter="edit_product(item.id)" type="number" v-model="number_edit"></span></td>
                                <td><span class="my-font-IYL my-f-12 my-color-b-800">{{number_format($item->price , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span></td>
                                <td><span class="my-font-IYL my-f-12 my-color-b-800"> {{number_format($item->total_price , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span></td>
                            </tr>
                        @endforeach
                    </tbody>

                    </table>
                </div>
                <div dir="rtl" class="d-flex my-font-IYM my-f-15 justify-content-between align-items-center p-2 mt-2 shadow-sm" style="height: 30px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
                    <span >قیمت کل:@{{(total_price != null) ? total_price : 0}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                    <span >تعداد اقلام: @{{(number != null) ? number : 0}}</span>
                    <span >تعداد کل: @{{(total_number != null) ? total_number : 0}}</span>
                </div>
                <div v-if="total_price != null && total_price != 0" dir="rtl" class="d-flex my-font-IYM my-f-13 justify-content-center align-items-center p-2 mt-2" style="height: 30px">
                    <a href="{{route('cashier.save.factor')}}" class="btn btn-g btn my-font-IYL my-f-9 mt-2">ثبت فاکتور</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4" >
        <div style="background-color: rgb(250, 250, 255)" class="h-50 w-100 p-3">
            <div dir="rtl" class="d-flex justify-content-between align-items-center">
                <span class="my-font-ISL my-f-11 my-color-b-700">لیست بدهکار ها</span>
            </div>
            <div class="overflow-y-scroll" style="max-height: 350px;height: 100%">
                @foreach ($creditors as $creditor)
                    <div class="w-100 my-3 border-bottom border-top p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="my-f-10 my-font-IYL my-color-b-700">{{jdate($creditor->created_at)->format('%A, %d %B %y')}}</span>
                            <span class="my-f-10 my-font-IYL my-color-b-700">{{number_format($creditor->price , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                            <span class="my-f-10 my-font-IYL my-color-b-700">{{$creditor->name }}</span>
                        </div>
                        <div class="w-100 d-flex justify-content-center align-items-center my-f-10 my-font-IYL my-color-b-700">
                            {{$creditor->des}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div style="background-color: rgb(241, 241, 255)" class="h-25 w-100 p-3 pt-2">
            <div dir="rtl" class="d-flex justify-content-between align-items-center">
                <span class="my-font-ISL my-f-11 my-color-b-700">استعلام قیمت</span>
            </div>
            <div>
                <div class="row">
                    <div class="col-6 p-1">
                        <input type="text" v-model="search_number" @keyup.enter="search_price" class="w-100 text-center mt-3 my-font-IYL my-f-11" placeholder="استعلام با بارکد محصول" dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
                    </div>
                    <div class="col-6 p-1">
                        <input type="text" v-model="search_name" @keyup.enter="search_price_by_name" class="w-100 text-center mt-3 my-font-IYL my-f-11" placeholder="استعلام با نام محصول" dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
                    </div>
                </div>
                <div v-if="price_product != null"  style="overflow-y: scroll;max-height: 90px!important;min-height: 90px!important;height: 90px!imporatn;">
                    <div v-for="(item , index) in price_product" @key="index" class="w-100 d-flex justify-content-between align-items-center ">
                        <img :src="item.image" width="30" class="my-3" height="30" alt="">
                        <p class="my-f-12 my-color-b-600 my-font-IYM">@{{item.name}}</p>
                        <p dir="rtl" class="my-f-12 my-color-b-600 my-font-IYL">@{{ToRial(item.price)}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: rgb(255, 241, 251)" class="h-25 w-100 p-3 pt-2">
            <div dir="rtl" class="d-flex justify-content-between align-items-center">
                <span class="my-font-ISL my-f-11 my-color-b-700">جدیدترین اخبار </span>
            </div>
            <div style="overflow-y: scroll;max-height: 135px!important;min-height: 135px!important;height: 135px!imporatn;">
                @foreach ($news as $new)
                    <div class="w-100 my-3 border-bottom border-top p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="my-f-10 my-font-IYL my-color-b-700">{{number_format( $new->body, 0 , '.' , ',')}}</span>
                            <span class="my-f-10 my-font-IYL my-color-b-700">{{$new->title}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@if (session('msg'))
    <div class="page-msg-session px-4 py-2 my-font-IYM my-f-12 rounded-3 shadow text-center" dir="rtl">
        {{session('msg')}}
    </div>
@endif
@endsection
