@extends('cashier.page')

@section('index')
<div class="d-flex justify-content-center my-3 mt-0 bg-sa-b-l" style="height: 100vh">
    <div class="w-50 mx-2 rounded-2 bg-sa-o-vl bo-sa-o-h" style="max-height: 90%;overflow-y: scroll">
        <br>
        <p class="text-center my-f-15 my-font-IYM co-sa-b-h"><b>لیست طلبکاری</b></p>
        <br>
        <div class="d-flex justify-content-center align-items-center my-3">
            <input type="text" v-model="name_creditor" @keyup="search_name_creditor" class="w-75 text-center my-font-IYL rounded-2 my-f-12 bg-sa-o-vl bo-sa-o-h co-sa-b-h" placeholder="جستوجو نام بدهکار..." dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
        </div>
        <form action="{{route('cashier.creditor.delete' , ['model'=> 'creditor'])}}" method="POST">
        @csrf
        <div dir="rtl" class="d-flex justify-content-center">
            <button type="button" @click="open_page_new_creditor" class="btn btn-sa-re mx-3 my-font-IYL my-f-12-i"><i class="bi bi-plus-lg my-f-15-i ps-2"></i>اضافه نمودن</button>
            <button type="submit" class="btn btn-sa mx-3 my-font-IYL my-f-12-i "><i class="bi bi-trash3 my-f-15-i ps-2"></i>حذف</button>
        </div>
        <br>
        <table dir="rtl" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ردیف</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">نام بدهکار</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">توضیحات</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">جمع کل</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تاریخ ثبت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ساعت ثبت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">عملیات</th>
                </tr>
            </thead>
            <tbody v-if="data_search_creditor == null">
                @forelse ($creditors as $creditor)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{$creditor->name}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{$creditor->des}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{ number_format($creditor->price , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{substr(jdate($creditor->created_at) , 0 , 11)}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{ ($seting->where('type' , 'time')->first()->status == 1) ? $creditor->created_at->addHours(3)->addMinutes(30)->format('H:i:s') : $creditor->created_at->format('H:i:s')}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="check_delete[]" value="{{$creditor->id}}" id="flexCheckDefault{{$creditor->id}}">
                                <label class="form-check-label" for="flexCheckDefault{{$creditor->id}}">
                                حذف
                                </label>
                            </div>
                            @if($creditors)
                                <a class="btn btn-b my-f-8-i mx-1 btn-sm" href="{{route('cashier.creditor.edit' , ['data' =>$creditor->id])}}">ویرایش</a>
                            @endif
                        </td>
                    </tr>
                @empty
                <tr>
                    <th scope="row"></th>
                    <th scope="row"></th>
                    <th scope="row"></th>
                    <th scope="row" class="my-font-ISL my-f-12 my-color-b-600">موردی یافت نشد</th>
                    <th scope="row"></th>
                    <th scope="row"></th>
                    <th scope="row"></th>
                </tr>
                @endforelse
            </tbody>
            <tbody v-else>
                <tr v-for="(creditor , index) in data_search_creditor" @key="index">
                    <th scope="row">--</th>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.name}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.des}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{ToRial(creditor.price)}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.created_at}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.time}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_delete[]" :value="creditor.id" :id="'flexCheckDefault'+creditor.id">
                            <label class="form-check-label" :for="'flexCheckDefault'+creditor.id">
                            حذف
                            </label>
                        </div>
                        <a v-if="creditor" class="btn btn-b my-f-8-i mx-1 btn-sm" :href="'/cashier/creditor/edit/'+creditor.id">ویرایش</a>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
    </div>
    <div class="w-50 mx-2 rounded-2 bg-sa-o-vl bo-sa-o-h" style="max-height: 90%;overflow-y: scroll">
        <br>
        <p class="text-center my-f-15 my-font-IYM co-sa-b-h"><b>لیست دریافتی</b></p>
        <br>
        <div class="d-flex justify-content-center align-items-center my-3">
            <input type="text" v-model="name_receipt" @keyup="search_name_receipt" class="w-75 text-center my-font-IYL rounded-2 my-f-12 bg-sa-o-vl bo-sa-o-h co-sa-b-h" placeholder="جستوجو نام دریافتی..." dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
        </div>
        <form action="{{route('cashier.creditor.delete' , ['model'=> 'receipt'])}}" method="POST">
            @csrf
        <div class="d-flex justify-content-center">
            <button type="button" @click="open_page_new_receipt" class="btn btn-sa-re mx-3 my-font-IYL my-f-12-i"><i class="bi bi-plus-lg my-f-15-i ps-2"></i>اضافه نمودن</button>
            <button type="submit" class="btn btn-sa mx-3 my-font-IYL my-f-12-i "><i class="bi bi-trash3 my-f-15-i ps-2"></i>حذف</button>
        </div>
        <br>
        <table dir="rtl" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ردیف</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">نام </th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">مقدار</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تاریخ ثبت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ساعت ثبت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">عملیات</th>
                </tr>
            </thead>
            <tbody v-if="data_search_receipt == null">
                @forelse ($receipts as $receipt)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{$receipt->name}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{ number_format($receipt->price , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{substr(jdate($receipt->created_at) , 0 , 11)}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{ ($seting->where('type' , 'time')->first()->status == 1) ? $receipt->created_at->addHours(3)->addMinutes(30)->format('H:i:s') : $receipt->created_at->format('H:i:s')}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="check_delete_2[]" value="{{$receipt->id}}" id="flexCheckDefault2{{$receipt->id}}">
                                <label class="form-check-label" for="flexCheckDefault2{{$receipt->id}}">
                                حذف
                                </label>
                            </div>
                            <a class="btn btn-b my-f-8-i mx-1 btn-sm" href="{{route('cashier.receipt.edit' , ['data' => $receipt->id])}}">ویرایش</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row" class="my-font-ISL my-f-12 my-color-b-600">موردی یافت نشد</th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                    </tr>
                    @endforelse
            </tbody>
            <tbody v-else>
                <tr v-for="(receipt , index) in data_search_receipt" @key="index">
                    <th scope="row">--</th>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{receipt.name}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{ToRial(receipt.price)}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{receipt.created_at}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{receipt.time}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_delete_2[]" :value="receipt.id" :id="'flexCheckDefault2'+receipt.id">
                            <label class="form-check-label" :for="'flexCheckDefault2'+receipt.id">
                            حذف
                            </label>
                        </div>
                        <a class="btn btn-b my-f-8-i mx-1 btn-sm" :href="'/cashier/receipt/edit/'+receipt.id">ویرایش</a>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
    </div>
</div>
<div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
<div class="page-new-product p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یک طلبکار جدید</p>
    <hr>
    <form action="{{route('cashier.creditor.new')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
            <input type="text" value="{{old('name')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام محصول برای نمایش ..." name="name">
        </div>
        <div class="input-group mb-3 w-100 ">
            <label dir="rtl" for="edit_price_product" class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">قیمت </label>
            <script>
                function separateNum(value, input) {
                    /* seprate number input 3 number */
                    var nStr = value + '';
                    nStr = nStr.replace(/\,/g, "");
                    x = nStr.split('.');
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                    }
                    if (input !== undefined) {

                        input.value = x1 + x2;
                    } else {
                        return x1 + x2;
                    }
                }
            </script>
            <input type="text" class="form-control my-font-IYL my-f-12-i"  name="price" id="edit_price_product"  placeholder="قیمت بر اساس {{($seting->where('type','unit')->first()->status == 1) ? 'ریال' : 'تومان'}} می باشد..." onkeyup="separateNum(this.value,this);">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">توضیحات</span>
            <input type="text" value="{{old('des')}}"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="محصولاتی که برده یا هر نوع توضیحاتی ...." name="des">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت محصول جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>

<div class="page-new-product-2 p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یک دریافتی جدید</p>
    <hr>
    <form action="{{route('cashier.receipt.new')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
            <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام محصول برای نمایش ..." name="name">
        </div>
        <div class="input-group mb-3 w-100 ">
            <label dir="rtl" for="edit_price_product" class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">قیمت </label>
            <script>
                function separateNum(value, input) {
                    /* seprate number input 3 number */
                    var nStr = value + '';
                    nStr = nStr.replace(/\,/g, "");
                    x = nStr.split('.');
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                    }
                    if (input !== undefined) {

                        input.value = x1 + x2;
                    } else {
                        return x1 + x2;
                    }
                }
            </script>
            <input type="text" class="form-control my-font-IYL my-f-12-i"  name="price" id="edit_price_product"  placeholder="قیمت بر اساس {{($seting->where('type','unit')->first()->status == 1) ? 'ریال' : 'تومان'}} می باشد..." onkeyup="separateNum(this.value,this);">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت محصول جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>
@endsection
