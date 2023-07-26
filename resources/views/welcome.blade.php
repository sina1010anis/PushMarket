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
                <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-center my-f-13 my-font-IYM text-secondary p-3" dir="rtl" style="height: 5%;background-color: #f7f7f7">نرم افزار مدریتی PushMarket</div>
                    <div class="col-12 back-page-as" style="height: 87.5vh;">
                        @yield('index')
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center my-f-12 my-font-IYM text-secondary p-3" dir="rtl" style="height: 5%;background-color: #f7f7f7">نسخه اجرایی 0.5.8</div>
                </div>
            </div>
        </div>
    </body>
</html>
