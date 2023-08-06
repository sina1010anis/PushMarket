<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>صندوقداری </title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <script src="{{mix('js/app.js')}}" defer></script>
    </head>
    <body class="antialiased">
                    {{-- Loding Start --}}
                    @if ($seting->where('type' , 'loding')->first()->status == 1)
                    <div class="loding" id="loding_id" style="height: 100vh;z-index: 20;position:fixed;top:0;left:0;width: 100%;background-color: white">
                        <img id="img_loding" src="/storage/images/logo.png" alt="logo" style="">
                    </div>
                    <style>
                        #img_loding{
                            transform: translate(-50%,-50%);position: absolute;top:50%;right: 50%;width: 75px;transition: 0.2s;
                            animation: loding 3.5s linear forwards;
                        }
                        @keyframes loding{
                            0%{
                                transform: scale(1)
                            }
                            25%{
                                transform: scale(0.75)
                            }
                            50%{
                                transform: scale(0.50)
                            }
                            75%{
                                transform: scale(0.25)
                            }
                            100%{
                                transform: scale(0)
                            }
                        }
                    </style>
                    <script>
                        setTimeout(()=>{
                            document.getElementById("loding_id").style.display = "none";
                        } , 1500)
                    </script>
                {{-- Loding End --}}
                    @endif
        <div id="app">
            <div class="container-xxl">
                <div dir="rtl" class="w-100 d-flex align-items-center my-f-11 my-color-b-900 my-font-IS p-2" style="height: 50px;background-color: #efefef">
                    <a href="/" class="me-4 pb-2" style="text-decoration: none!important;color:#323232;">صفحه اصلی</a>
                    @if($seting->find(3)->status == 1)  <a href="{{route('cashier.index')}}" class="me-4 pb-2  @if($menu == 'index') border-bottom @endif" style="text-decoration: none!important;color:#323232;">فروش محصول</a>@endif
                    @if($seting->find(4)->status == 1) <a href="{{route('cashier.report')}}" class="me-4 pb-2 my-f-11 @if($menu == 'report') border-bottom @endif" style="text-decoration: none!important;color:#323232">گزارش فرایند ها</a>@endif
                    @if($seting->find(5)->status == 1) <a href="{{route('cashier.products')}}" class="me-4 pb-2 my-f-11 @if($menu == 'products') border-bottom @endif" style="text-decoration: none!important;color:#323232">مدریت محصولات</a>@endif
                    @if($seting->find(6)->status == 1) <a href="{{route('cashier.creditor')}}" class="me-4 pb-2 my-f-11 @if($menu == 'creditor') border-bottom @endif" style="text-decoration: none!important;color:#323232">لیست بستانکارها</a>@endif
                    @if($seting->find(11)->status == 1) <a href="{{route('seting.exit.cashire')}}" class="me-4 pb-2 my-f-11 @if($menu == 'creditor') border-bottom @endif" style="text-decoration: none!important;color:#ff7777">خروج از محیط</a>@endif
                    @if($seting->where('type' , 'time')->first()->status == 1)
                        <span dir="rtl" class="me-auto">{{jdate(Carbon\Carbon::now()->addHours(3)->addMinutes(30))}}</span>
                    @else
                        <span dir="rtl" class="me-auto">{{jdate()->now()}}</span>
                    @endif
                </div>
                @if (session('msg'))
                    <div class="page-msg-session px-4 py-2 my-font-IYM my-f-12 rounded-3 shadow text-center" dir="rtl">
                        <div @click="cls_msg" class="cls-msg d-flex justify-content-center align-items-center"><i class="bi bi-arrow-bar-right my-f-22 my-pointer"></i></div>
                        {{session('msg')}}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="page-msg-session page-error px-4 py-2  rounded-3 shadow text-center" style="z-index: 5;    background-color: rgb(255 222 222)!important;color: rgb(214 0 0)!important;border: 1px solid rgb(136 0 0)!important" dir="rtl">
                        <div @click="cls_msg" class="cls-msg d-flex justify-content-center align-items-center"><i class="bi bi-arrow-bar-right my-f-22 my-pointer"></i></div>
                        @foreach ($errors->all() as $error)
                            <div dir="rtl" class="my-font-IYM my-f-12 my-2">{{ $error}}</div>
                        @endforeach
                    </div>
                @endif
                @yield('index')
            </div>
        </div>
    </body>
</html>
