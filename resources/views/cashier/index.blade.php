@extends('cashier.page')

@section('index')
<div class="d-flex justify-content-center align-items-center my-3">
    <input type="text" v-model="barcode" @keyup.enter="send_product" class="w-75 text-center my-font-IYL my-f-11" placeholder="با استفاده از بارکد خوان بارکد را وارد کنید...!" dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
</div>
@if (session('msg'))
<div class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="alert alert-success text-center my-f-13 my-font-IYM">{{session('msg')}}</div>
    </div>
</div>
@endif
<div class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div v-if="first_product != null" dir="rtl" class="d-flex justify-content-between align-items-center p-2 mb-2 border" style="height: 100px;">
            <img :src="first_product.image" width="90" height="90" alt="">
            <span class="my-font-IYL my-f-11 my-color-b-800">نام: @{{first_product.name}}</span>
            <span class="my-font-IYL my-f-11 my-color-b-800">قیمت تک: @{{first_product.price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
        </div>
        <div v-else dir="rtl" class="d-flex justify-content-center align-items-center p-2 mb-2 border" style="height: 100px;">

            <span class="my-font-IYL my-f-11 my-color-b-800">محصولی یافت نشد</span>
        </div>
        <div v-if="factor_product != null" dir="rtl" class="w-100  px-2" style="overflow-y: scroll;height: 300px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
            <div v-for="(item , index) in factor_product" @key="index" class="d-flex justify-content-between align-items-center p-2 border-bottom" style="height: 75px;">
                <img :src="item.image" width="65" height="65" alt="">
                <span class="my-font-IYL my-f-12 my-color-b-800">نام: @{{item.name}}</span>
                <span class="my-font-IYL my-f-12 my-color-b-800">تعداد: @{{item.total_number}} <input style="width: 40px" class="text-center" @keyup.enter="edit_product(item.id)" type="number" v-model="number_edit"></span>
                <span class="my-font-IYL my-f-12 my-color-b-800">قیمت تک: @{{item.price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                <span class="my-font-IYL my-f-12 my-color-b-800">قیمت کل: @{{item.total_price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
            </div>
        </div>

        <div v-else dir="rtl" class="w-100  px-2" style="overflow-y: scroll;height: 300px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
            @foreach ($data as $item)
                <div class="d-flex justify-content-between align-items-center p-2 border-bottom" style="height: 75px;">
                    <img src="{{$item->image}}" width="65" height="65" alt="">
                    <span class="my-font-IYL my-f-12 my-color-b-800">نام: {{$item->name}}</span>
                    <span class="my-font-IYL my-f-12 my-color-b-800">تعداد: {{$item->total_number}} <input style="width: 40px" class="text-center" @keyup.enter="edit_product(item.id)" type="number" v-model="number_edit"></span>
                    <span class="my-font-IYL my-f-12 my-color-b-800">قیمت تک: {{$item->price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                    <span class="my-font-IYL my-f-12 my-color-b-800">قیمت کل: {{$item->total_price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                </div>
            @endforeach
        </div>
        <div dir="rtl" class="d-flex my-font-IYM my-f-15 justify-content-between align-items-center p-2 mt-2 shadow-sm" style="height: 30px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
            <span >قیمت کل:@{{(total_price != null) ? total_price : 0}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
            <span >تعداد اقلام: @{{(number != null) ? number : 0}}</span>
            <span >تعداد کل: @{{(total_number != null) ? total_number : 0}}</span>
        </div>
        <div dir="rtl" class="d-flex my-font-IYM my-f-13 justify-content-center align-items-center p-2 mt-2" style="height: 30px">
            <a href="{{route('cashier.save.factor')}}" class="btn btn-success btn my-font-IYL my-f-9 mt-2">ثبت فاکتور</a>
        </div>
    </div>
</div>
<div class="page-creditor border shadow-sm rounded-2 p-1 overflow-hidden">
    <div class="d-flex justify-content-between align-items-center">
        <i class="bi bi-caret-down my-pointer" @click="cls_page_creditor"></i>
        <span class="my-font-IYL my-f-10 my-color-b-500">لیست بدهکار ها</span>
    </div>
    <div class="overflow-y-scroll" style="max-height: 350px;height: 100%">
        @foreach ($creditors as $creditor)
            <div class="w-100 my-3 border-bottom border-top p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="my-f-10 my-font-IYL my-color-b-700">{{jdate($creditor->created_at)->format('%A, %d %B %y')}}</span>
                    <span class="my-f-10 my-font-IYL my-color-b-700">{{$creditor->price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></span>
                    <span class="my-f-10 my-font-IYL my-color-b-700">{{$creditor->name}}</span>
                </div>
                <div class="w-100 d-flex justify-content-center align-items-center my-f-10 my-font-IYL my-color-b-700">
                    {{$creditor->des}}
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="page-price border shadow-sm rounded-2 p-1 overflow-hidden">
    <div class="d-flex justify-content-between align-items-center">
        <i class="bi bi-caret-down my-pointer" @click="cls_page_price"></i>
        <span class="my-font-IYL my-f-10 my-color-b-500">استعلام قیمت</span>
    </div>
    <div style="height: 100%">
        <input type="text" v-model="search_number" @keyup.enter="search_price" class="w-100 text-center mt-3 my-font-IYL my-f-11" placeholder="برای استعلام قیمت لطفا این بخش را انتخاب کنید" dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
        <div v-if="price_product != null" class="w-100 d-flex align-items-center flex-column ">
            <img :src="price_product.image" width="100" class="my-3" height="100" alt="">
            <p class="my-f-12 my-color-b-600 my-font-IYM">@{{price_product.name}}</p>
            <p class="my-f-12 my-color-b-600 my-font-IYL">@{{price_product.price}}</p>
        </div>
    </div>
</div>
@endsection
