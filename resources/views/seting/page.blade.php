<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>تنظیمات</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <link href="/storage/images/v.jpg" rel="shortcut icon" />
        <script src="{{mix('js/app.js')}}" defer></script>
    </head>
    <body class="antialiased">
                    {{-- Loding Start --}}
                    @if ($seting->where('type' , 'loding')->first()->status == 1)
                    <div class="loding" id="loding_id" style="height: 100vh;z-index: 20;position:fixed;top:0;left:0;width: 100%;background-color: white">
                        <img id="img_loding" src="/storage/images/v.jpg" alt="logo" style="">
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
                <div class="row">

                    <div class="col-12 d-flex justify-content-center align-items-center my-pos-rel" dir="rtl" style="height: 4.5%;background-color: #ffffff">
                        {{-- <span class="my-f-13 my-font-IYM my-color-b-700 my-select-none">نرم افزار مدریتی PushMarket</span> --}}
                        <div class="box-view-logo" dir="rtl" style="height:150px">
                            <a href="/"><img src="/{{'storage/images/logo.png'}}" width="30" alt="logo"></a>
                        </div>
                    </div>

                    <div class="col-12 back-page-as" style="height: 91.5vh;">
                            <div class="row my-4 "  style="height: 670px;">
                                <div class="col-10 offset-1 row mt-5">
                                    <div class="col-8 p-2" style="background-color: rgb(249, 249, 249)">
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
                                    <div class="col-4 p-3" style="background-color: rgb(234, 234, 234)">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="my-font-IYM my-f-18 my-color-b-600"> تنظیمات</span>
                                            <i class="bi bi-gear my-color-bl" style="font-size: 55px"></i>
                                        </div>
                                        <hr>
                                        <a href="{{route('seting.index')}}" class="w-100 d-flex justify-content-between align-items-center px-5 my-pointer">
                                            <span class="my-font-IYM my-f-12 my-color-b-600"> صندوقدار</span>
                                            <i class="bi bi-person-vcard my-color-bl" style="font-size: 25px"></i>
                                        </a>
                                        <a href="{{route('seting.store')}}" class="w-100 d-flex justify-content-between align-items-center px-5 mt-3 my-pointer">
                                            <span class="my-font-IYM my-f-12 my-color-b-600"> انبارداری</span>
                                            <i class="bi bi-box-seam my-color-bl" style="font-size: 25px"></i>
                                        </a>
                                        <a href="{{route('seting.acco')}}" class="w-100 d-flex justify-content-between align-items-center px-5 mt-3 my-pointer">
                                            <span class="my-font-IYM my-f-12 my-color-b-600"> حسابدار</span>
                                            <i class="bi bi-cash-coin my-color-bl" style="font-size: 25px"></i>
                                        </a>
                                        <a href="{{route('seting.admin')}}" class="w-100 d-flex justify-content-between align-items-center px-5 mt-3 my-pointer">
                                            <span class="my-font-IYM my-f-12 my-color-b-600"> مدریتی</span>
                                            <i class="bi bi-person-gear my-color-bl" style="font-size: 25px"></i>
                                        </a>
                                        <a href="{{route('seting.lock')}}" class="w-100 d-flex justify-content-between align-items-center px-5 mt-3 my-pointer">
                                            <span class="my-font-IYM my-f-12 my-color-b-600"> قفلگذاری</span>
                                            <i class="bi bi-key my-color-bl" style="font-size: 25px"></i>
                                        </a>
                                        <a href="{{route('seting.about')}}" class="w-100 d-flex justify-content-between align-items-center px-5 mt-3 my-pointer">
                                            <span class="my-font-IYM my-f-12 my-color-b-600"> درباره نرم افزار </span>
                                            <i class="bi bi-clipboard my-color-bl" style="font-size: 21px"></i>
                                        </a>
                                        <a href="{{route('index.page')}}" class="w-100 d-flex justify-content-between align-items-center px-5 mt-3 my-pointer">
                                            <span class="my-font-IYM my-f-12 my-color-b-600"> صفحه اصلی</span>
                                            <i class="bi bi-house-door my-color-bl" style="font-size: 21px"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
