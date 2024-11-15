<template>
    <div dir="rtl" class="row" >
        <div class="col-12 box-date"  >
            <form style="background-color: #efdbca;"  class=" text-center border p-1">
                <!-- action="{{route('cashier.reprot.products')}}" -->
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
                        <button type="button" @click="see_factor('bet')" class="btn btn-b btn-cus my-font-IYM-i my-f-9-i"><span class="my-f-15-i ms-2"><i class="bi bi-eye"></i></span><span class="btn-text"><b>برسی فاکتور</b></span></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 box-date mt-5">
            <form style="background-color: #efdbca;" method="post" class="text-center border p-1">
                <!-- action="{{route('cashier.reprot.products')}}"  -->
                <p class="text-center my-f-12 my-font-IYM my-color-b-800">گزارش تاریخ</p>
                <div class="d-flex justify-content-between flex-column align-items-center my-3">
                    <div class="my-3">
                        <label for="as_date" class="my-font-IYL my-f-11 my-color-b-600 mx-2"> تاریخ</label>
                        <date-picker v-model="date_in" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" @click="see_factor('sin')" class="btn btn-b btn-cus my-font-IYM-i my-f-9-i"><span class="my-f-15-i ms-2"><i class="bi bi-eye"></i></span><span class="btn-text"><b>برسی فاکتور</b></span></button>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-12 p-2 d-flex align-items-center">
            <button title="باز و بسته کردن تاریخ ها"@click="cls_page()" type="button" class="btn btn-r btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-15-i"><i class="bi bi-arrow-down-up"></i></span><span class="btn-text"><b></b></span></button>
            <button @click="open_chart()" title="نمودار فروش" type="button" class="btn btn-r btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-15-i"><i class="bi bi-bar-chart-fill"></i></span><span class="btn-text"><b></b></span></button>
            <button @click="open_report()" title="محصولات فروخته شده" type="button" class="btn btn-r btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-17-i"><i class="bi bi-card-list"></i></span><span class="btn-text"><b></b></span></button>
            <button @click="sin_product()" title="برسی فروش یک محصول" type="button" class="btn btn-r btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-17-i"><i class="bi bi-zoom-in"></i></span><span class="btn-text"><b></b></span></button>
            <button title="فاکتور های روز قبل" type="button" class="btn btn-r btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-17-i"><i class="bi bi-arrow-right"></i></span><span class="btn-text"><b></b></span></button>
            <button title="فاکتور های روز بعد" type="button" class="btn btn-r btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-17-i"><i class="bi bi-arrow-left"></i></span><span class="btn-text"><b></b></span></button>
            <span v-if="new_data == null" class="btn btn-bl btn-cus my-font-IYM-i btn-lg my-f-15-i me-auto">فاکتور های تاریخ : {{set_date(factors[0].created_at)}}</span>
            <span v-else class="btn btn-bl btn-cus my-font-IYM-i btn-lg my-f-15-i me-auto">از  {{date_as}} - تا  {{date_ta}}</span>
        </div>

        <div class="col-12 mt-3">
        <table dir="rtl" class="table table-striped table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ردیف</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">جمع قیمت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">جمع تعداد محصولات</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">محصولات</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تاریخ ثبت</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="new_data == null" class="table-secondary" v-for="(item, index) in factors">
                    <th scope="row">{{index+1}}</th>
                    <td class="my-font-ISL my-f-13 my-color-b-600"><b>{{ set_split(item.total_price)}}</b></td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">{{item.total_number}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div v-for="(product) in item.products" class="w-100  my-1 d-flex justify-content-between align-items-center border-bottom" >
                                <img :src="'/'+product.image" width="35" height="35" alt="">
                                <p class="my-f-9 my-font-ISL my-color-b-600">{{product.total_number + ' - ' +  set_split(product.total_price)}}</p>
                            </div>
                    </td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">{{set_date(item.created_at)}}</td>
                </tr>
                <tr v-else class="table-secondary" v-for="(item, index) in new_data">
                    <th scope="row">{{index+1}}</th>
                    <td class="my-font-ISL my-f-13 my-color-b-600"><b>{{ set_split(item.total_price)}}</b></td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">{{item.total_number}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div v-for="(product) in item.products" class="w-100  my-1 d-flex justify-content-between align-items-center border-bottom" >
                                <img :src="'/'+product.image" width="35" height="35" alt="">
                                <p class="my-f-9 my-font-ISL my-color-b-600">{{product.total_number + ' - ' +  set_split(product.total_price)}}</p>
                            </div>
                    </td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">{{set_date(item.created_at)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
<div class="page-news p-3">
    <div class="w-100 h-100 p-2" >
        <p class="text-center p-0 m-0  my-font-IYM my-f-12 my-color-b-600">نمودار تاریخ</p>
        <hr>
        <span class="w-100 d-block d-flex justify-content-center align-items-center p-3 " style="height: 90%!important;background-color: rgb(168 184 201)">
            <Line :data="data" v-if="renderComponent" />
        </span>

        <div dir="rtl" class="w-100 d-flex justify-content-end align-items-center" style="height: 5%;">
            <button @click="cls_page_chart" type="button" class="btn btn-bl my-f-11-i my-font-IYM-i mx-2 ms-auto">بستن پنچره</button>
        </div>
    </div>
</div>
<div class="page-report p-3">
    <div class="w-100 h-100 p-2" >
        <p class="text-center p-0 m-0  my-font-IYM my-f-12 my-color-b-600">گزارش فروش محصولات</p>
        <hr>
        <div class="w-100 p-3 overflow-y-scroll" style="height: 90%!important;max-height: 90%!important;min-height: 90%!important;background-color: #fff">
            <div v-for="(i) in data_report"  class=" my-2 bg-secondary bg-opacity-25">
                <div v-for="j in i" class=" my-5">
                    <p class="text-center my-font-IYB my-f-20">{{ set_date(j.created_at) }}</p>
                    <div v-for="w in j.products" class="d-flex justify-content-between align-items-center border-2 border-top-0 border-start-0 border-end-0">
                        <img height="100" :src="'/'+w.image" :alt="w.name">
                        <span>{{ w.total_number }} تعداد : </span>
                        <span>{{ w.name }}</span>
                    </div>
                    <hr>
                </div>
            </div>

        </div>

        <div dir="rtl" class="w-100 d-flex justify-content-end align-items-center" style="height: 5%;">
            <button @click="cls_page_chart" type="button" class="btn btn-bl my-f-11-i my-font-IYM-i mx-2 ms-auto">بستن پنچره</button>
        </div>
    </div>
</div>
<div class="page-new-product p-3 shadow">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">گزارش گیری تک محصول</p>
    <hr>
        <div  class="input-group mb-3 w-100 ">
            <input type="text" v-model="code_report" @keyup.enter="send_code_report" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="جستوجو با کد محصول" name="code">
        </div>
        <div dir="rtl" class="col-auto d-flex align-items-center">
            <button @click="cls_page_chart" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
        <p class="my-font-IYM my-f-15 my-color-b-700 text-center"><b>نام محصول : </b><span class=" my-f-13 my-color-b-700">{{ data_code_report.name }}</span></p>
        <p class="my-font-IYM my-f-15 my-color-b-700 text-center"><b> فروش کل : </b><span class=" my-f-13 my-color-b-700">{{ data_code_report.total_price }}</span></p>
        <p class="my-font-IYM my-f-15 my-color-b-700 text-center"><b>تعداد فروش : </b><span class=" my-f-13 my-color-b-700">{{ data_code_report.total_number }}</span></p>
</div>
</template>

  <script>


  import DatePicker from 'vue3-persian-datetime-picker'
  import * as moment from 'jalali-moment';
  import $ from 'jquery'
  import { Line } from 'vue-chartjs'
  import {getCurrentInstance,ref, nextTick } from 'vue';
  import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
} from 'chart.js'
import axios from 'axios';
ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
)
  export default {
      name:'Report',
      data:()=>({
        code_report:null,
        renderComponent: true,
        date_as:'',
        date_ta:'',
        date_in:'',
        new_data: null,
        data_report:null,
        data_code_report: {'name': 'خالی', 'total_price' : 'خالی', 'total_number' : 'خالی'},
        data : {
            labels: ['test'],
            datasets: [
                {
                    label: 'جمع کل',
                    backgroundColor: '#f87979',
                    data: [50]
                }
            ]
        },


      }),components: { DatePicker, Line, LinearScale, getCurrentInstance},
      props:{
        factors:Object
      },methods:{
        send_code_report(){

            axios.post('/cashier/search/product/code/report', {code:this.code_report}).then((res)=>{

                this.data_code_report = res.data;

            })

        },
        sin_product(){

            $('.page-hiden').fadeIn();
            $('.page-new-product').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

        },
        async see_factor(mode)
        {

            axios.post('/cashier/report/products', {mode:mode, date_as:this.date_as, date_ta:this.date_ta, date_in:this.date_in}).then((res)=>{

                console.log(res.data.report);


                this.createData(res.data)

            })

        },
        async createData(data){


            this.renderComponent = false;

            this.data_report = data.report

            var ret=  [];

            var ret_p=  [];

            data.chart.map(function (item){

                ret.push(set_date(item[0]))

                ret_p.push(item[1])

            })


            function set_date(date) {
                var gy = date.substring(0, 4);
                var gm = date.substring(5, 7);
                var gd = date.substring(8, 10);
                let persianDate = moment(gy+'-'+gm+'-'+gd).locale('fa').format('YYYY-MM-DD');
                return persianDate;
            }

            this.data.labels = []

            this.data.datasets[0].data = []

            this.data.labels = ret

            this.data.datasets[0].data = ret_p

            await this.$nextTick();

            this.new_data = ''

            this.new_data = data.factors

            this.renderComponent = true;


        },
        open_chart()
        {
            $('.page-hiden').fadeIn();
            $('.page-news').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },

        open_report()
        {
            $('.page-hiden').fadeIn();
            $('.page-report').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        cls_page_chart()
        {
            $('.page-hiden').fadeOut();
            $(".page-news").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
            $(".page-report").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
            $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
        },

        cls_page(){
            $('.box-date').stop().slideToggle()
        },
        set_split(price){

            const numStr = price.toString();

            // عبارت منظم برای پیدا کردن گروه‌های سه تایی ارقام از سمت راست
            const regex = /(\d)(?=(\d{3})+$)/g;

            // جایگزینی هر تطابق با همان رقم به همراه کاما
            const formattedNum = numStr.replace(regex, '$1,');

            return formattedNum;

        },
        set_date(date){
            var gy = date.substring(0, 4);
            var gm = date.substring(5, 7);
            var gd = date.substring(8, 10);
            let persianDate = moment(gy+'-'+gm+'-'+gd).locale('fa').format('YYYY-MM-DD'); // 1367/11/4
            return persianDate;
        }
      }

  }
  </script>
