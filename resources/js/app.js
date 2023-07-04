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
        name_receipt:null

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
                this.total_price = res.data.total_price
                this.number = res.data.number
            }).catch((res)=>{
                this.first_product = null
                this.factor_product = null
                console.error(res.data)
            })
        },
        edit_product(id){
            axios.post('/cashier/edit/number' , {id:id,number:this.number_edit}).then((res)=>{
                this.number_edit = null
                this.first_product = res.data.first
                this.factor_product = res.data.factor
                this.total_number = res.data.total_number
                this.total_price = res.data.total_price
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
    }
})


app.mount('#app')
