import './bootstrap';
import { createApp, h } from "vue";
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-icons/font/bootstrap-icons.css'
import  Version from './components/Version'


const app = createApp({
    data:()=>({
        text:'Vue'
    }),
    components:{
        Version
    }
})


app.mount('#app')
