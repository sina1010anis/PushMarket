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
            <span class="my-font-IYL my-f-11 my-color-b-800">قیمت تک: @{{first_product.price}}</span>
        </div>
        <div v-else dir="rtl" class="d-flex justify-content-center align-items-center p-2 mb-2 border" style="height: 100px;">

            <span class="my-font-IYL my-f-11 my-color-b-800">محصولی یافت نشد</span>
        </div>
        <div v-if="factor_product != null" dir="rtl" class="w-100  px-2" style="overflow-y: scroll;height: 300px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
            <div v-for="(item , index) in factor_product" @key="index" class="d-flex justify-content-between align-items-center p-2 border-bottom" style="height: 75px;">
                <img :src="item.image" width="65" height="65" alt="">
                <span class="my-font-IYL my-f-12 my-color-b-800">نام: @{{item.name}}</span>
                <span class="my-font-IYL my-f-12 my-color-b-800">تعداد: @{{item.total_number}} <input style="width: 20px" class="text-center" @keyup.enter="edit_product(item.id)" type="number" v-model="number_edit"></span>
                <span class="my-font-IYL my-f-12 my-color-b-800">قیمت تک: @{{item.price}}</span>
                <span class="my-font-IYL my-f-12 my-color-b-800">قیمت کل: @{{item.total_price}}</span>
            </div>
        </div>

        <div v-else dir="rtl" class="w-100  px-2" style="overflow-y: scroll;height: 300px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
            @foreach ($data as $item)
                <div class="d-flex justify-content-between align-items-center p-2 border-bottom" style="height: 75px;">
                    <img src="{{$item->image}}" width="65" height="65" alt="">
                    <span class="my-font-IYL my-f-12 my-color-b-800">نام: {{$item->name}}</span>
                    <span class="my-font-IYL my-f-12 my-color-b-800">تعداد: {{$item->total_number}} <input style="width: 20px" class="text-center" @keyup.enter="edit_product(item.id)" type="number" v-model="number_edit"></span>
                    <span class="my-font-IYL my-f-12 my-color-b-800">قیمت تک: {{$item->price}}</span>
                    <span class="my-font-IYL my-f-12 my-color-b-800">قیمت کل: {{$item->total_price}}</span>
                </div>
            @endforeach
        </div>
        <div dir="rtl" class="d-flex my-font-IYM my-f-15 justify-content-between align-items-center p-2 mt-2 shadow-sm" style="height: 30px;background-color:  rgb(246, 246, 246);border: 1px solid rgb(187, 187, 187)">
            <span >قیمت کل:@{{(total_price != null) ? total_price : 0}}</span>
            <span >تعداد اقلام: @{{(number != null) ? number : 0}}</span>
            <span >تعداد کل: @{{(total_number != null) ? total_number : 0}}</span>
        </div>
        <div dir="rtl" class="d-flex my-font-IYM my-f-13 justify-content-center align-items-center p-2 mt-2" style="height: 30px">
            <a href="{{route('cashier.save.factor')}}" class="btn btn-success btn my-font-IYL my-f-9 mt-2">ثبت فاکتور</a>
        </div>

    </div>
</div>
@endsection
