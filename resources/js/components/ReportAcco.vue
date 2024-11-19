<template>
    <div dir="rtl" class="row m-0 p-0"  >
        <div class="col-12 box-date"  >
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
                        <button type="button" @click="see_factor('bet')" class="btn btn-sa btn-cus my-font-IYM-i my-f-9-i"><span class="my-f-15-i ms-2"><i class="bi bi-eye"></i></span><span class="btn-text"><b>برسی فاکتور</b></span></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 p-2 d-flex align-items-center" dir="rtl">
            <button title="باز و بسته کردن تاریخ ها"@click="cls_page()" type="button" class="btn btn-sa btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-15-i"><i class="bi bi-arrow-down-up"></i></span><span class="btn-text px-2 my-f-10"><b>باز و بستن تاریخ</b></span></button>
            <button @click="sin_product()" title="نمودار فروش" type="button" class="btn btn-sa btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-15-i"><i class="bi bi-card-list"></i></span><span class="btn-text p-x2 my-f-10"><b> امار حساب  </b></span></button>
        </div>

        <div class="col-12 mt-3">
            <table dir="rtl" class="table table-striped table-hover">
                <thead>
                    <tr class="table-dark">
                        <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ردیف</th>
                        <th scope="col" class="my-f-12 my-font-IYL my-color-b-700"> میزان مجموع</th>
                        <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">میزان طلبکاری</th>
                        <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">میزان بستانکاری</th>
                        <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تاریخ ثبت</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="new_data == null" class="table-secondary" v-for="(item, index) in factors">
                        <th scope="row">{{index+1}}</th>
                        <td class="my-font-ISL my-f-13 my-color-b-600"><b>{{ set_split(item.total)}}</b></td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{set_split(item.indebted)}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{set_split(item.creditor)}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{set_date(item.created_at)}}</td>
                    </tr>
                    <tr v-else-if="new_data != null" class="table-secondary" v-for="(item, index) in accos">
                        <th scope="row">{{index+1}}</th>
                        <td class="my-font-ISL my-f-13 my-color-b-600"><b>{{ set_split(item.total)}}</b></td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{set_split(item.indebted)}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{set_split(item.creditor)}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{set_date(item.created_at)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>
<div class="page-new-product p-3 shadow">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">امار حساب بر اساس تاریخ</p>
    <hr>

        <p class="my-font-IYM my-f-15 my-color-b-700 text-center"><b>نام محصول : </b><span class=" my-f-13 my-color-b-700">{{ data_code_report.name }}</span></p>
        <p class="my-font-IYM my-f-15 my-color-b-700 text-center"><b> فروش کل : </b><span class=" my-f-13 my-color-b-700">{{ ToRial(data_code_report.total_price) }}</span></p>
        <p class="my-font-IYM my-f-15 my-color-b-700 text-center"><b>تعداد فروش : </b><span class=" my-f-13 my-color-b-700">{{ data_code_report.total_number }}</span></p>
        <div dir="rtl" class="col-auto d-flex align-items-center">
            <button @click="cls_page_chart" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
</div>
</template>

  <script>


  import DatePicker from 'vue3-persian-datetime-picker'
  import moment from 'jalali-moment';
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
      name:'ReportAcco',
      data:()=>({
        code_report:null,
        renderComponent: true,
        date_as:'',
        date_ta:'',
        date_in:'',
        new_data: null,
        data_report:null,
        accos:null,
        data_code_report: {'name': 'خالی', 'total_price' : 0, 'total_number' : 0},
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
        ToRial(str) {
            return str.toLocaleString("en");;
        },
        send_code_report(){

            axios.post('/cashier/search/product/code/report', {code:this.code_report}).then((res)=>{

                this.code_report = null

                this.data_code_report = res.data;

            })

        },
        sin_product(){

            $('.page-hiden').fadeIn();
            $('.page-new-product').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});

        },
        async see_factor(mode)
        {

            axios.post('/acco/report', {mode:mode, date_as:this.date_as, date_ta:this.date_ta}).then((res)=>{

                console.log(res.data);


                this.accos = res.data

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
            var inputElem = document.getElementById("input_sin_product");
            window.addEventListener('click', function(e) {
                inputElem.blur();
            })
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
      },

  }
  </script>
