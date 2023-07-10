<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Push Market</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <script src="{{mix('js/app.js')}}" defer></script>
    </head>
    <body class="antialiased">
        <div id="app">
            <div class="container-xxl">
                <div dir="rtl" class="w-100 d-flex align-items-center my-f-11 my-color-b-900 my-font-IS p-2" style="height: 50px;background-color: #efefef">
                    <a href="/" class="me-4 pb-2" style="text-decoration: none!important;color:#323232;">صفحه اصلی</a>
                    <a href="{{route('cashier.index')}}" class="me-4 pb-2  @if($menu == 'index') border-bottom @endif" style="text-decoration: none!important;color:#323232;">فروش محصول</a>
                    <a href="{{route('cashier.report')}}" class="me-4 pb-2 my-f-11 @if($menu == 'report') border-bottom @endif" style="text-decoration: none!important;color:#323232">گزارش فرایند ها</a>
                    <a href="{{route('cashier.products')}}" class="me-4 pb-2 my-f-11 @if($menu == 'products') border-bottom @endif" style="text-decoration: none!important;color:#323232">مدریت محصولات</a>
                    <a href="{{route('cashier.creditor')}}" class="me-4 pb-2 my-f-11 @if($menu == 'creditor') border-bottom @endif" style="text-decoration: none!important;color:#323232">لیست بستانکارها</a>
                    <span dir="rtl" class="me-auto">{{jdate()->now()}}</span>
                </div>
                @yield('index')
            </div>
        </div>
    </body>
</html>
