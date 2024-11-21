<template>


    <div class="d-flex justify-content-center bg-sa-b-l" style="height: 100vh">
    <div class="w-50 mx-2 rounded-2 bg-sa-o-vl bo-sa-o-h" style="max-height: 90%;overflow-y: scroll">
        <form action="/store/store/delete" method="post">
            <div class="col-12 d-flex align-items-center">
                <button type="submit" class="btn btn-sa-re btn-cus m-2 my-font-IYM-i my-f-10-i"><span class="my-f-15-i ms-2"><i class="bi bi-trash3"></i></span><span class="btn-text"><b> حذف داده </b></span></button>
                <button @click="new_store"  type="button" class="m-2 btn btn-sa btn-cus my-font-IYM-i my-f-10-i"><span class="my-f-15-i ms-2"><i class="bi bi-plus-lg"></i></span><span class="btn-text"><b> اضافه نمودن </b></span></button>
                <button @click="new_export" type="button" class="btn btn-sa btn-cus m-2 my-font-IYM-i my-f-10-i"><span class="my-f-15-i ms-2"><i class="bi bi-file-earmark-spreadsheet"></i></span><span class="btn-text"><b> خروجی اکسل  </b></span></button>
                <button @click="new_report" type="button" class="btn btn-sa btn-cus m-2 my-font-IYM-i my-f-10-i"><span class="my-f-15-i ms-2"><i class="bi bi-file-earmark-break"></i></span><span class="btn-text"><b> گزارش ورودی  </b></span></button>

                <p class="my-font-IYB my-f-15 co-sa-b-h text-center p-0 me-2 ms-auto">ورودی ها</p>
            </div>
            <hr>
            <div style="overflow-y: scroll;height: 600px;">
                <table dir="rtl" class="table">
                    <thead>
                        <tr  class="my-font-IYL my-f-14 my-color-b-900">
                            <th scope="col">ردیف</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">محل انبار</th>
                            <th scope="col">تعداد جعبه</th>
                            <th scope="col"> تعداد محصولات تک</th>
                            <th scope="col">تاریخ ورود</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody v-if="new_data == null">
                        <tr v-for="(item, index) in stores" dir="rtl" class="my-font-IYL my-f-13 my-color-b-700">
                            <th scope="row">{{index+1}}</th>
                            <td>{{item.name }} </td>
                            <td>{{item.location }} </td>
                            <td>{{item.box }} </td>
                            <td>{{item.total_number }} </td>
                            <td><span class="my-f-10 my-font-IYM my-color-b-900">{{set_date(item.created_at)}}</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div class="form-check ">
                                <input class="form-check-input my-pointer" type="checkbox" name="id_store[]" :value="item.id" :id="'flexCheckDefault'+item.id">
                                <label class="form-check-label" :for="'flexCheckDefault'+item.id">
                                حذف
                                </label>
                            </div>
                                <a class="btn btn-b my-f-8-i mx-1 btn-sm" :href="'/store/store/edit/product/'+item.id">ویرایش</a>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr v-for="(item, index) in new_data" dir="rtl" class="my-font-IYL my-f-13 my-color-b-700">
                            <th scope="row">{{index+1}}</th>
                            <td>{{item.name }} </td>
                            <td>{{item.location }} </td>
                            <td>{{item.box }} </td>
                            <td>{{item.total_number }} </td>
                            <td><span class="my-f-10 my-font-IYM my-color-b-900">{{set_date(item.created_at)}}</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div class="form-check ">
                                <input class="form-check-input my-pointer" type="checkbox" name="id_store[]" :value="item.id" :id="'flexCheckDefault'+item.id">
                                <label class="form-check-label" :for="'flexCheckDefault'+item.id">
                                حذف
                                </label>
                            </div>
                                <a class="btn btn-b my-f-8-i mx-1 btn-sm" :href="'/store/store/edit/product/'+item.id">ویرایش</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>







    <div class="w-50 mx-2 rounded-2 bg-sa-o-vl bo-sa-o-h" style="max-height: 90%;overflow-y: scroll">
        <form action="/store/exit/delete" method="post">
            <div class="col-12 d-flex align-items-center">
                <button type="submit" class="btn btn-sa-re btn-cus m-2 my-font-IYM-i my-f-10-i"><span class="my-f-15-i ms-2"><i class="bi bi-trash3"></i></span><span class="btn-text"><b> حذف داده </b></span></button>
                <button @click="new_exit"  type="button" class="m-2 btn btn-sa btn-cus my-font-IYM-i my-f-10-i"><span class="my-f-15-i ms-2"><i class="bi bi-plus-lg"></i></span><span class="btn-text"><b> اضافه نمودن </b></span></button>
                <button @click="new_export_exit" type="button" class="btn btn-sa btn-cus m-2 my-font-IYM-i my-f-10-i"><span class="my-f-15-i ms-2"><i class="bi bi-file-earmark-spreadsheet"></i></span><span class="btn-text"><b> خروجی اکسل  </b></span></button>
                <button @click="new_report_exit" type="button" class="btn btn-sa btn-cus m-2 my-font-IYM-i my-f-10-i"><span class="my-f-15-i ms-2"><i class="bi bi-file-earmark-break"></i></span><span class="btn-text"><b> گزارش ورودی  </b></span></button>

                <p class="my-font-IYB my-f-15 co-sa-b-h text-center p-0 me-2 ms-auto">خروجی ها</p>
            </div>
            <hr>
            <div style="overflow-y: scroll;height: 600px;">
                <table dir="rtl" class="table">
                    <thead>
                        <tr  class="my-font-IYL my-f-14 my-color-b-900">
                            <th scope="col">ردیف</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col"> توضیحات</th>
                            <th scope="col">تعداد جعبه</th>
                            <th scope="col"> تعداد محصولات تک</th>
                            <th scope="col">تاریخ ورود</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody v-if="new_data_exit == null">
                        <tr v-for="(item, index) in exits" dir="rtl" class="my-font-IYL my-f-13 my-color-b-700">
                            <th scope="row">{{index+1}}</th>
                            <td>{{item.name }} </td>
                            <td>{{item.desc }} </td>
                            <td>{{item.box }} </td>
                            <td>{{item.total_number }} </td>
                            <td><span class="my-f-10 my-font-IYM my-color-b-900">{{set_date(item.created_at)}}</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div class="form-check ">
                                <input class="form-check-input my-pointer" type="checkbox" name="id_store[]" :value="item.id" :id="'flexCheckDefault'+item.id">
                                <label class="form-check-label" :for="'flexCheckDefault'+item.id">
                                حذف
                                </label>
                            </div>
                                <a class="btn btn-b my-f-8-i mx-1 btn-sm" :href="'/store/store/edit/product/'+item.id">ویرایش</a>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr v-for="(item, index) in new_data_exit" dir="rtl" class="my-font-IYL my-f-13 my-color-b-700">
                            <th scope="row">{{index+1}}</th>
                            <td>{{item.name }} </td>
                            <td>{{item.location }} </td>
                            <td>{{item.box }} </td>
                            <td>{{item.total_number }} </td>
                            <td><span class="my-f-10 my-font-IYM my-color-b-900">{{set_date(item.created_at)}}</span></td>
                            <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div class="form-check ">
                                <input class="form-check-input my-pointer" type="checkbox" name="id_store[]" :value="item.id" :id="'flexCheckDefault'+item.id">
                                <label class="form-check-label" :for="'flexCheckDefault'+item.id">
                                حذف
                                </label>
                            </div>
                                <a class="btn btn-b my-f-8-i mx-1 btn-sm" :href="'/store/store/edit/product/'+item.id">ویرایش</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

 <div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
<div class="page-new-product page-new-product-11 page-new p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد  ورودی جدید</p>
    <hr>
    <form action="/store/store/new" method="post">
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
            <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام محصول" name="name">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">محل انبار</span>
            <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="محل انبار محصول" name="location">
        </div>
        <div class="input-group mb-3 w-100 ">
            <label dir="rtl" for="edit_price_product" class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">  تعداد محصول تک </label>
            <input type="text" class="form-control my-font-IYL my-f-12-i"  name="total_number" id="edit_price_product"  placeholder="تعداد محصو تک">
        </div>
        <div class="input-group mb-3 w-100 ">
            <label dir="rtl" for="edit_price_product" class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">  تعداد جعبه محصول</label>
            <input type="text" class="form-control my-font-IYL my-f-12-i"  name="box" id="edit_price_product"  placeholder="تعداد جعبه محصول">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت محصول جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>
<div class="page-new-product page-new-product-12 page-new p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد  خروجی جدید</p>
    <hr>
    <form action="/store/exit/new" method="post">
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام</span>
            <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام محصول" name="name">
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1"> توضیحات</span>
            <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="  توضیحات" name="desc">
        </div>
        <div class="input-group mb-3 w-100 ">
            <label dir="rtl" for="edit_price_product" class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">  تعداد محصول تک </label>
            <input type="text" class="form-control my-font-IYL my-f-12-i"  name="total_number" id="edit_price_product"  placeholder="تعداد محصو تک">
        </div>
        <div class="input-group mb-3 w-100 ">
            <label dir="rtl" for="edit_price_product" class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">  تعداد جعبه محصول</label>
            <input type="text" class="form-control my-font-IYL my-f-12-i"  name="box" id="edit_price_product"  placeholder="تعداد جعبه محصول">
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت محصول جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>
<div class="page-new-product page-new-product-2 page-new p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">گزارش</p>
    <hr>
    <div class="w-100 box-date"  >
            <form style="background-color: #efdbca;"  class=" text-center border p-1">
                <p class="text-center my-f-12 my-font-IYM my-color-b-800">گزارش بین دو تاریخ</p>
                <div class="d-flex justify-content-between flex-column align-items-center my-3">
                    <div class="my-3">
                        <label for="as_date" class="my-font-IYL my-f-11 my-color-b-600 mx-2">از تاریخ</label>
                        <date-picker v-model="date_as" />
                    </div>
                    <div class="my-3">
                        <label for="ta_date" class="my-font-IYL my-f-11 my-color-b-600 mx-2">تا تاریخ</label>
                        <date-picker v-model="date_ta" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" @click="see_factor()" class="btn btn-sa btn-cus my-font-IYM-i my-f-9-i"><span class="my-f-15-i ms-2"><i class="bi bi-eye"></i></span><span class="btn-text"><b>برسی فاکتور</b></span></button>
                    </div>
                </div>
            </form>
            <br>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
</div>
<div class="page-new-product page-new-product-13 page-new p-3">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">گزارش</p>
    <hr>
    <div class="w-100 box-date"  >
            <form style="background-color: #efdbca;"  class=" text-center border p-1">
                <p class="text-center my-f-12 my-font-IYM my-color-b-800">گزارش بین دو تاریخ</p>
                <div class="d-flex justify-content-between flex-column align-items-center my-3">
                    <div class="my-3">
                        <label for="as_date" class="my-font-IYL my-f-11 my-color-b-600 mx-2">از تاریخ</label>
                        <date-picker v-model="date_as" />
                    </div>
                    <div class="my-3">
                        <label for="ta_date" class="my-font-IYL my-f-11 my-color-b-600 mx-2">تا تاریخ</label>
                        <date-picker v-model="date_ta" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" @click="see_factor_exit()" class="btn btn-sa btn-cus my-font-IYM-i my-f-9-i"><span class="my-f-15-i ms-2"><i class="bi bi-eye"></i></span><span class="btn-text"><b>برسی فاکتور</b></span></button>
                    </div>
                </div>
            </form>
            <br>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
</div>
<div class="page-new-product page-new-product-3 p-3 shadow d-flex justify-content-center align-items-center">
    <marquee class="my-font-IYM my-f-12" direction="right">
        ... در حال انجام عملیات لطفا صبر کنید
    </marquee>
</div>
<div class="page-new-product page-new-product-8 p-3 shadow ">
    <p class="my-font-IYM my-f-12" dir="rtl">
        عملیات با موفقیت انجام شد برای دنلود فایل استخراج شده در همین صفحه دکمه <span @click="file_excel()" class="co-sa-o-h my-pointer my-font-IYM"><b>دانلود خروجی اکسل</b></span> را بزنید
    </p>
    <div dir="rtl" class="col-auto d-flex align-items-center">
        <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
    </div>
</div>

<div class="page-new-product page-new-product-14 p-3 shadow ">
    <p class="my-font-IYM my-f-12" dir="rtl">
        عملیات با موفقیت انجام شد برای دنلود فایل استخراج شده در همین صفحه دکمه <span @click="file_excel_exit()" class="co-sa-o-h my-pointer my-font-IYM"><b>دانلود خروجی اکسل</b></span> را بزنید
    </p>
    <div dir="rtl" class="col-auto d-flex align-items-center">
        <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
    </div>
</div>
<div class="page-new-product page-new-product-9 p-3 shadow ">
    <p class="my-font-IYM my-f-12" dir="rtl">
        مشکلی پیش امده لطفا بعدا تلاش کنید
    </p>
            <div dir="rtl" class="col-auto d-flex align-items-center">
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
</div>
<div class="page-new-product page-new-product-10 page-new-product-1 p-3 shadow">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">فایل های اکسل فاکتور</p>
    <hr>

        <div>
            <slot name="view_file_excle"/>
        </div>
        <div dir="rtl" class="col-auto d-flex align-items-center">
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
</div>
<div class="page-new-product page-new-product-15 page-new-product-1 p-3 shadow">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">فایل های اکسل فاکتور</p>
    <hr>

        <div>
            <slot name="view_file_excle_exit"/>
        </div>
        <div dir="rtl" class="col-auto d-flex align-items-center">
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
</div>
</template>

  <script>
    import moment from 'jalali-moment';
    import $ from 'jquery'
    import DatePicker from 'vue3-persian-datetime-picker'

  export default {
      name:'ReportStore',

      data:()=>({
        numberVersion:3,
        date_as:null,
        date_ta:null,
        new_data:null,
        new_data_exit:null
      }),components:{
        DatePicker:DatePicker
      }
      ,methods:{

         separateNum(value, input) {
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
                },

        file_excel(){

            $('.page-hiden').fadeIn();

            $('.page-new-product-10').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

        },

        file_excel_exit(){

            $('.page-hiden').fadeIn();

            $('.page-new-product-15').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

        },

        new_export(){

            const data = (this.new_data == null) ? this.stores : this.new_data;

            $('.page-hiden').fadeIn();

            $('.page-new-product-3').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

            axios.post('/store/export/excel', {data:data}).then((res)=>{

                $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});

                $('.page-new-product-8').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

            }).catch((res) => {

                $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});

                $('.page-new-product-9').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

                console.log(res.data);

            })

        },

        new_export_exit(){

            const data = (this.new_data_exit == null) ? this.exits : this.new_data_exit;

            $('.page-hiden').fadeIn();

            $('.page-new-product-3').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

            axios.post('/store/exit/export/excel', {data:data}).then((res)=>{

                $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});

                $('.page-new-product-14').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

            }).catch((res) => {

                $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});

                $('.page-new-product-9').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

                console.log(res.data);

            })

        },
        cls_page()
        {
            $('.page-hiden').fadeOut();
            $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
            $(".page-new-product-1").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
            $(".page-new-product-2").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
        },
        new_report(){

            $('.page-hiden').fadeIn();
            $('.page-new-product-2').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

        },
        new_report_exit(){

            $('.page-hiden').fadeIn();
            $('.page-new-product-13').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

        },
        new_store()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product-11').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        new_exit()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product-12').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        set_date(date){
            var gy = date.substring(0, 4);
            var gm = date.substring(5, 7);
            var gd = date.substring(8, 10);
            let persianDate = moment(gy+'-'+gm+'-'+gd).locale('fa').format('YYYY-MM-DD'); // 1367/11/4
            return persianDate;
        },
        async see_factor()
        {

            $('.page-new-product-3').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

            axios.post('/store/report', {date_as:this.date_as, date_ta:this.date_ta}).then((res)=>{

                $('.page-hiden').fadeOut();
                $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});

                this.new_data = res.data
                this.date_ta = null
                this.date_as = null

            })

        },
        async see_factor_exit()
        {

            $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});

            $('.page-new-product-3').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

            axios.post('/store/exit/report', {date_as:this.date_as, date_ta:this.date_ta}).then((res)=>{

                $('.page-hiden').fadeOut();
                $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});

                this.new_data_exit = res.data
                this.date_ta = null
                this.date_as = null

            })

        },
      },props:{
        stores:Object,
        exits:Object
      }
  }
  </script>

  <style>

  </style>
