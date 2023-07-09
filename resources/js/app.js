import './bootstrap';
import { createApp, h } from "vue";
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import  Version from './components/Version'
import axios from 'axios';
import $ from 'jquery'
import moment from 'jalali-moment';

const app = createApp({
    data:()=>({
        text:'Vue',
        barcode:null,
        first_product:null,
        factor_product:null,
        total_number:null,
        total_price:null,
        number:null,
        number_edit:null,
        barcode_new_product:null,
        text_search_product:null,
        data_search_product:null,
        data_search_creditor:null,
        data_search_receipt:null,
        name_creditor:null,
        name_receipt:null,
        status_menu:true,
        status_menu_2:true,
        search_number:null,

    }),
    components:{
        Version
    },
    methods:{
        send_product(){
            axios.post('/cashier/save/product' , {code:this.barcode}).then((res)=>{
                //return console.log(res.data)
                this.barcode = null
                this.first_product = res.data.first
                this.factor_product = res.data.factor
                this.total_number = res.data.total_number
                //this.total_price = res.data.total_price
                this.total_price = this.ToRial(res.data.total_price)
                this.number = res.data.number
            }).catch((res)=>{
                this.first_product = null
                this.factor_product = null
                console.error(res.data)
            })
        },
        search_price(){
            axios.post('/cashier/search/price' , {code:this.search_number}).then((res)=>{
                //return console.log(res.data)
                this.search_number = null
                this.price_product = res.data
            }).catch((res)=>{
                this.first_product = null
                this.factor_product = null
                this.search_number = null
                console.error(res.data)
            })
        },
        edit_product(id){
            axios.post('/cashier/edit/number' , {id:id,number:this.number_edit}).then((res)=>{
                this.number_edit = null
                this.first_product = res.data.first
                this.factor_product = res.data.factor
                this.total_number = res.data.total_number
                //this.total_price = res.data.total_price
                this.total_price = this.ToRial(res.data.total_price)

            }).catch((res)=>{
                this.first_product = null
                this.factor_product = null
                console.error(res.data)
            })
        },
        new_products()
        {
            axios.post('/cashier/new/products' , {code:this.barcode_new_product}).then((res)=>{
                if(res.data == 'ok')
                {
                    $('.page-hiden').fadeIn();
                    $('.page-new-product').fadeIn();
                }else{
                    alert('این بارکد قبلا ثبت شده است.')
                }

            }).catch((res)=>{
                console.error(res.data)
            })
        },
        search_product(){
            axios.post('/cashier/search/product' , {code:this.text_search_product}).then((res)=>{
                this.data_search_product = res.data
                console.log(res.data);
            }).catch((res)=>{
                console.error(res.data)
            })
        },
        search_name_creditor()
        {
            axios.post('/cashier/creditor/search/name' , {name:this.name_creditor}).then((res)=>{
                this.data_search_creditor = res.data
                console.log(res.data);
            }).catch((res)=>{
                console.error(res.data)
            })
        },
        search_name_receipt()
        {
            axios.post('/cashier/receipt/search/name' , {name:this.name_receipt}).then((res)=>{
                this.data_search_receipt = res.data
                console.log(res.data);
            }).catch((res)=>{
                console.error(res.data)
            })
        },
        cls_page_creditor()
        {
            if(this.status_menu)
            {
                this.status_menu = false;
                $('.page-creditor').stop().animate({height: '30px',})
            }else{
                this.status_menu = true;
                $('.page-creditor').stop().animate({height: '400px',})
            }

        },
        cls_page_price()
        {
            if(this.status_menu_2)
            {
                this.status_menu_2 = false;
                $('.page-price').stop().animate({height: '400px',})
            }else{
                this.status_menu_2 = true;
                $('.page-price').stop().animate({height: '30px',})
            }

        },
        open_page_new_creditor()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product').fadeIn();
        },
        cls_page()
        {
            $('.page-hiden').fadeOut();
            $('.page-new-product').fadeOut();
            $('.page-new-product-2').fadeOut();
        },
        open_page_new_receipt()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product-2').fadeIn();
        },
        ToRial(str) {
            return str.toLocaleString("en");;
        }

    },
    mounted:()=>{
        var inputElem = document.getElementById("input_send");
        window.addEventListener('load', function(e) {
            inputElem.focus();
        })
    }
})


app.mount('#app')
