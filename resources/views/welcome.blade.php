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
                        @yield('index')
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center my-f-14 my-font-IYM text-secondary p-3" dir="rtl" style="height: 5%;background-color: #efefef">نسخه اجرایی 0.5.5</div>
                </div>
            </div>
        </div>
    </body>
</html>
