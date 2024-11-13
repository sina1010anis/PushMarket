<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Push Market</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <link href="/storage/images/logoH.png" rel="shortcut icon" />
        <script src="{{mix('js/app.js')}}" defer></script>
    </head>
    <body class="antialiased">
        <x-load-page />
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
            </div>
        </div>
    </body>
</html>
