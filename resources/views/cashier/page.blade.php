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
            <div dir="rtl" class="w-100 d-flex justify-content-start align-items-center my-font-IYL my-f-12" style="height: 50px;background-color: #efefef">
                <a href="{{route('cashier.index')}}" class="me-4" style="text-decoration: none!important;color:#323232">خرید محصول</a>
                <a href="{{route('cashier.report')}}" class="me-4" style="text-decoration: none!important;color:#323232">گزارش فرایند ها</a>
                <a href="{{route('cashier.products')}}" class="me-4" style="text-decoration: none!important;color:#323232">مدریت محصولات</a>
                <a href="{{route('cashier.creditor')}}" class="me-4" style="text-decoration: none!important;color:#323232">لیست نسیه ها</a>
            </div>
            @yield('index')
        </div>
    </body>
</html>
