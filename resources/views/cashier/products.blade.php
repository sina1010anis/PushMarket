@extends('cashier.page')

@section('index')
<div class="row m-0 p-0" style="height: 100vh">
    <div class="col-9 bg-sa-b-l" >
        <div class="row my-3">
            <div class="col-6">
                <input dir="rtl" v-model="text_search_product" @keyup.enter="search_product('barcode')" type="text" style="font-size: 12px!important;border: 1px solid #ec6b05;background-color: #ebd5bd" class=" form-control form-control-sm my-font-ISL p-1 my-color-b-500" id="code_sus_1" placeholder="جستجو محصولات با بارکد...">
            </div>
            <div class="col-6">
                <input dir="rtl" v-model="text_search_product_name" @keyup.enter="search_product('name')" type="text" style="font-size: 12px!important;border: 1px solid #ec6b05;background-color: #ebd5bd" class=" form-control form-control-sm my-font-ISL p-1 my-color-b-500" id="code_sus_1" placeholder="جستجو محصولات با نام...">
            </div>
        </div>

        <form action="{{route('cashier.delete.products')}}" method="post">
        <div class="d-flex justify-content-center my-2">
            <button class="btn btn-sa-re my-font-IYL my-f-10-i btn-sm"><i class="bi bi-trash3 px-2 my-f-14-i"></i>حذف محصولات</button>
        </div>
        <table dir="rtl" class="table table-hover">
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
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{ number_format($item->price , 0 , '.' , ',')}} <span class="my-f-10 my-color-b-500 my-font-IYL">({{($seting->find(2)->status == 1) ? 'ریال' : 'تومان'}})</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                                @if ($item->status == 1)
                                    تعدادی
                                @else
                                    کیلویی
                                @endif
                            </td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">{{jdate($item->created_at)}}</td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="check_delete[]" value="{{$item->id}}" id="flexCheckDefault{{$item->id}}">
                                    <label class="form-check-label" for="flexCheckDefault{{$item->id}}">
                                    حذف
                                    </label>
                                </div>
                                <a class="btn btn-b my-f-8-i mx-1 btn-sm" href="{{route('cashier.edit.product' , ['name' => ($item->name != null) ?$item->name : 'none'])}}">ویرایش</a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        </form>
        <div class="col-12 d-flex justify-content-center align-items-center">
            {{$data->links()}}
        </div>
    </div>
    <div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>

    <div class="col-3 bg-sa-o-vl"  >
        <div class="w-100 h-50">
            <div class="my-3">
                <p class="text-center  my-font-IS my-f-12 my-color-b-800">ساخت محصول جدید</p>
                <input type="text" v-model="barcode_new_product" @keyup.enter="new_products" class="w-100 bg-sa-o-vl rounded-2 bo-sa-o-h text-center my-font-IYL my-f-11" placeholder="برای ساخت محصول جدید ابتدا بارکد را وارد کنید...!" dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
            </div>

            <div class="page-new-product p-3">
                <p class="text-center my-font-IYM my-f-12 my-color-b-600">@{{barcode_new_product}}</p>
                <hr>
                <form action="{{route('cashier.u_new.products')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div  class="input-group mb-3 w-100 ">
                        <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
                        <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام محصول برای نمایش ..." name="name">
                    </div>
                    {{-- <div  class="input-group mb-3 w-100 ">
                        <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">قیمت</span>
                        <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="قیمت محصول به ریال می باشد..." name="price">
                    </div> --}}
                    <div class="input-group mb-3 w-100 ">
                        <label dir="rtl" for="edit_price_product" class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">  قیمت محصول</label>
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
                        <input type="text" class="form-control my-font-IYL my-f-12-i"  name="price" id="edit_price_product"  placeholder="قیمت محصول بر اساس {{($seting->where('type','unit')->first()->status == 1) ? 'ریال' : 'تومان'}} می باشد..." onkeyup="separateNum(this.value,this);">
                    </div>
                    <div class="mb-3 input-group-sm">
                        <input class="form-control my-font-IYL my-f-11-i" name="image" type="file" id="formFile">
                    </div>

                    <select name="status" class="form-select form-select-sm my-f-11-i my-font-IYL my-color-b-700 my-3" aria-label=".form-select-sm example">
                        <option value="1" selected>تعدادی</option>
                        <option value="0">کیلویی</option>
                    </select>
                    <div class="col-auto d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-g btn-sm my-font-IYL my-f-11-i mb-3">ثبت محصول جدید</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-100 h-50 border-top">
            <div v-if="data_search_product != null" class="d-flex flex-column align-items-center my-3">
                <div v-if="data_search_product != 'none'" class="w-100">
                    <div  dir="rtl" class=" p-2 mb-2 border" style="height: auto;">
                        <div class="w-100 text-center">
                            <img :src="'/'+data_search_product.image" width="90" height="90" alt="">
                        </div>
                        <p class="my-font-IYL my-f-13 co-sa-b-h text-center"> @{{data_search_product.name}}</p>
                        <p class="my-font-IYL my-f-13 co-sa-b-h price-one text-center" >قیمت تک: @{{ToRial(data_search_product.price)}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-sa my-font-IS-i my-f-10-i mx-1 btn-sm" :href="'/cashier/delete/product/'+data_search_product.id"><i class="bi bi-trash3 ps-2 my-f-13-i"></i>حذف</a>
                            <a class="btn btn-sa-re my-font-IS-i my-f-10-i mx-1 btn-sm" :href="'/cashier/edit/product/'+data_search_product.name"><i class="bi bi-pencil ps-2 my-f-13-i"></i>ویرایش</a>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div  dir="rtl" class="d-flex justify-content-between align-items-center p-2 mb-2 border" style="height: 100px;">
                        <span class="my-font-IYL my-f-11 my-color-b-800"> محصول مورد نظر یافت نشد </span>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


@endsection
