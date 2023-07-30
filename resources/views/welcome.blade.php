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
                    <div class="col-12 d-flex justify-content-center align-items-center my-pos-rel" dir="rtl" style="height: 4.5%;background-color: #ffffff">
                        {{-- <span class="my-f-13 my-font-IYM my-color-b-700 my-select-none">نرم افزار مدریتی PushMarket</span> --}}
                        <div class="box-view-logo" dir="rtl" style="height:150px">
                            <a href="/"><img src="/{{'storage/images/logo.png'}}" width="30" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-12 back-page-as" style="height: 91.5vh;">
                        @yield('index')
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center my-pos-rel" style="height: 69px!important;overflow: hidden">
                        <div class="  box-view-version my-f-17 my-font-IYM my-select-none text-center pt-4 text-secondary" dir="rtl" style="height:150px">
                            {{$seting->where('type' , 'version')->first()->status}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
