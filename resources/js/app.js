import './bootstrap';
import { createApp, h } from "vue";
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import  Version from './components/Version'
import axios from 'axios';


const app = createApp({
    data:()=>({
        text:'Vue',
        barcode:null,
        first_product:null,
        factor_product:null,
        total_number:null,
        total_price:null,
        number:null,

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
        }
    }
})


app.mount('#app')
