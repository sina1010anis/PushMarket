<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <script src="{{mix('js/app.js')}}" defer></script>
    </head>
    <body class="antialiased">
        <div id="app">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center my-f-15 my-font-IYM text-secondary p-3" dir="rtl" style="height: 5%;background-color: #efefef">نرم افزار مدریتی PushMarket</div>
                    <div class="col-12" style="height: 87vh;">
                        <div class="row my-4"  style="height: 670px;">
                            <div class="col-10 offset-1 row">
                                <div class="col-8 p-2" style="background-color: rgb(249, 249, 249)">
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
                                    <a href="{{route('index.page')}}" class="w-100 d-flex justify-content-between align-items-center px-5 mt-3 my-pointer">
                                        <span class="my-font-IYM my-f-12 my-color-b-600"> صفحه اصلی</span>
                                        <i class="bi bi-house-door my-color-bl" style="font-size: 21px"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center my-f-14 my-font-IYM text-secondary p-3" dir="rtl" style="height: 5%;background-color: #efefef">نسخه اجرایی 0.5.5</div>
                </div>
            </div>
        </div>
    </body>
</html>
