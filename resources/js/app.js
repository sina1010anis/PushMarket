import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import  Version from './components/Version.vue'
import  Load from './components/Load.vue'
import  Report from './components/Report.vue'
import axios from 'axios';
import $ from 'jquery'
import moment from 'jalali-moment';
import DatePicker from 'vue3-persian-datetime-picker'


const app = createApp({
    data:()=>({
        date:'',
        value:'',
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
        text_search_product_name:null,
        data_search_product:null,
        data_search_creditor:null,
        data_search_receipt:null,
        name_creditor:null,
        name_receipt:null,
        status_menu:true,
        status_menu_2:true,
        search_number:null,
        search_name:null,
        status_loding:false,
        id_acco:null,
        modele_delete:null,
        price_product:null,
        id_delete_book:null

    }),
    components:{
        Version,
        Load,
        Report,
        DatePicker
    },
    methods:{
        open_book_delete(id)
        {
            this.id_delete_book = id
            $(".page-news").css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
            $('.page-hiden').fadeIn();

        },

        open_book_new()
        {
            $(".page-new-product").css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
            $('.page-hiden').fadeIn();

        },
        delete_menu_book(){

            axios.post('/notbook/delete/menu', {id:this.id_delete_book}).then((res)=>{

                // console.log(res.data);


                location.reload()

            })

        },
        slid_table(id){

            $("#items_notbook_"+id).stop().slideToggle()

        },
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
            axios.post('/cashier/search/price' , {code:this.search_number , type:'barcode'}).then((res)=>{
                this.search_number = null
                this.price_product = null
                this.price_product = res.data
            }).catch((res)=>{
                this.first_product = null
                this.factor_product = null
                this.search_number = null
                console.error(res.data)
            })
        },

        new_products()
        {
            axios.post('/cashier/new/products' , {code:this.barcode_new_product}).then((res)=>{
                if(res.data == 'ok')
                {
                    $('.page-hiden').fadeIn();
                    $('.page-new-product').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
                }else{
                    alert('این بارکد قبلا ثبت شده است.')
                }

            }).catch((res)=>{
                console.error(res.data)
            })
        },
        search_product(type){
            axios.post('/cashier/search/product' , {code:this.text_search_product,name:this.text_search_product_name,type:type}).then((res)=>{
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
            $('.page-new-product').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },

        open_page_new_receipt()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product-2').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        ToRial(str) {
            return str.toLocaleString("en");;
        },
        search_price_by_name()
        {
            axios.post('/cashier/search/price' , {name:this.search_name , type:'name'}).then((res)=>{
                //return console.log(res.data

                this.search_name = null
                this.price_product = null
                this.price_product = res.data
            }).catch((res)=>{
                this.first_product = null
                this.factor_product = null
                this.search_number = null
                console.error(res.data)
            })
        },
        new_acco()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product-2').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        new_news()
        {
            $('.page-new-product').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        win_news()
        {
            $('.page-hiden').fadeIn();
            $(".page-news").css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        cls_page()
        {
            $('.page-hiden').fadeOut();
            $('.page-new-product').css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
            $('.page-new-product-2').css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
            $('.page-new').css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});;
            $(".page-news").css({"transform": "translate(-50%,-50%) scale(0)" , "transition" : '0.2s'});
        },
        open_win_delete(model)
        {
            this.modele_delete = model;
            $(".page-news").css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
            $('.page-hiden').fadeIn();

        },
        new_store()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        new_cash()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product-3').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        new_bank()
        {
            $('.page-hiden').fadeIn();
            $('.page-new-product-4').css({"transform": "translate(-50%,-50%) scale(1)" , "transition" : '0.2s'});
        },
        edit_status_cash(status_n , id , type)
        {
            //return console.log(status_n+' '+id+' '+type);
            var status = (status_n == 1) ? 0 : 1;
            axios.post('/acco/edit/status/cash' , {status:status , id:id , type:type}).then((res)=>{
                //console.log(res.data)
                location.reload()
            }).catch((res)=>{
                console.error(res)
            })
        },
        edit_setting(id)
        {
            axios.post('/setting/edit/setting' , {id:id}).then((res)=>{
                //console.log(res.data)
                location.reload()
            }).catch((res)=>{
                console.error(res)
            })
        },
        edit_unit()
        {
            axios.post('/setting/edit_unit').then((res)=>{
                //console.log(res.data)
                location.reload()
            }).catch((res)=>{
                console.error(res)
            })
        },
        delete_all(){
            axios.post('/setting/delete' , {model:this.modele_delete}).then((res)=>{
                //console.log(res.data)
                location.reload()
            }).catch((res)=>{
                console.error(res)
            })
        },
        test(){
            console.log(this.id_acco);
        },
        edit_def_acco()
        {
            axios.post('/setting/edit/acco' , {id:this.id_acco}).then((res)=>{
                //console.log(res.data)
                location.reload()
            }).catch((res)=>{
                console.error(res)
            })
        },
        edit_number(id , mode){
            this.status_loding = true
            axios.post('/cashier/edit/total/number' , {id:id , mode:mode}).then((res)=>{
                //console.log(res.data)
                this.number_edit = null
                this.first_product = res.data.first
                this.factor_product = res.data.factor
                this.total_number = res.data.total_number
                //this.total_price = res.data.total_price
                this.total_price = this.ToRial(res.data.total_price)
                this.status_loding = false
            }).catch((res)=>{
                console.error(res)
                this.status_loding = false
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
        cls_msg(){
            $('.page-msg-session').animate({
                right: '-500px'
            });
        },
        open_news()
        {

        },
        input_rile(mynumber)
        {
            return mynumber.toLocaleString("en");
        }
    },
    mounted:()=>{
        var inputElem = document.getElementById("input_send");
        window.addEventListener('load', function(e) {
            inputElem.focus();
        })
        setTimeout(()=>{
            $('.page-msg-session').animate({
                right: '-500px'
            });
        } , 4500)

    },

    created() {
        window.addEventListener('keydown', (e) => {
            if (e.key == 'Tab') {

                axios.get('cashier/save/factor').then(()=>{
                    window.location.reload();
                })

            }

        });
      },

})


app.mount('#app');
