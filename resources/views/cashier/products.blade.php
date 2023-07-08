@extends('cashier.page')

@section('index')
<div class="d-flex justify-content-center align-items-center my-3">
    <input type="text" v-model="barcode_new_product" @keyup.enter="new_products" class="w-75 text-center my-font-IYL my-f-11" placeholder="ایجاد یک محصول جدید برای فروشگاه...!" dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
</div>
@if (session('msg'))
<div class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="alert alert-success text-center my-f-13 my-font-IYM">{{session('msg')}}</div>
    </div>
</div>
@endif
<br>
<hr>
<br>
<div class="d-flex justify-content-center align-items-center my-3">
    <input type="text" v-model="text_search_product" @keyup.enter="search_product" class="w-75 text-center my-font-IYL my-f-11" placeholder="جستوجو محصولات از پایگاه داده...!" dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
</div>
<div v-if="data_search_product != null" class="d-flex justify-content-center align-items-center my-3">
    <div v-if="data_search_product != 'none'" class="w-75">
        <div  dir="rtl" class="d-flex justify-content-between align-items-center p-2 mb-2 border" style="height: 100px;">
            <img :src="'/'+data_search_product.image" width="90" height="90" alt="">
            <span class="my-font-IYL my-f-11 my-color-b-800">نام: @{{data_search_product.name}}</span>
            <span class="my-font-IYL my-f-11 my-color-b-800 price-one" >قیمت تک: @{{data_search_product.price}}</span>
            <a class="btn btn-danger my-font-IYB my-f-8 mx-1 btn-sm" :href="'/cashier/delete/product/'+data_search_product.id">حذف</a>
            <a class="btn btn-info my-font-IYB my-f-8 mx-1 btn-sm" :href="'/cashier/edit/product/'+data_search_product.name">ویرایش</a>
        </div>
    </div>
    <div v-else>
        <div  dir="rtl" class="d-flex justify-content-between align-items-center p-2 mb-2 border" style="height: 100px;">
            <span class="my-font-IYL my-f-11 my-color-b-800"> محصول مورد نظر یافت نشد </span>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <form action="{{route('cashier.delete.products')}}" method="post">
        <div class="d-flex justify-content-center">
            <button class="btn btn-danger my-font-IYL my-f-10-i btn-sm">حذف محصولات</button>
        </div>

        <table dir="rtl" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ردیف</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تصویر</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">بارکد</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">نام</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">قیمت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">واحد</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تاریخ ثبت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">عملیات ها</th>
                </tr>
            </thead>
            <tbody>

                    @csrf
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td class="my-font-ISL my-f-12 my-color-b-600"><img src="/{{$item->image}}" width="60" height="60" alt=""></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{$item->barcode}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{$item->name}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{$item->price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                                @if ($item->status == 1)
                                    تعدادی
                                @else
                                    کیلویی
                                @endif
                            </td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{jdate($item->created_at)->format('%A, %d %B %y')}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="check_delete[]" value="{{$item->id}}" id="flexCheckDefault{{$item->id}}">
                                    <label class="form-check-label" for="flexCheckDefault{{$item->id}}">
                                    حذف
                                    </label>
                                </div>
                                <a class="btn btn-info my-f-8-i mx-1 btn-sm" href="{{route('cashier.edit.product' , ['name' => ($item->name != null) ?$item->name : 'none'])}}">ویرایش</a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </form>

        {{$data->links()}}
    </div>
</div>
<div class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
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

        <select name="status" class="form-select form-select-sm my-f-11-i my-font-IYL my-color-b-700 my-3" aria-label=".form-select-sm example">
            <option value="1" selected>تعدادی</option>
            <option value="0">کیلویی</option>
        </select>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-success btn-sm my-font-IYL my-f-11-i mb-3">ثبت محصول جدید</button>
        </div>
    </form>
</div>


@endsection
