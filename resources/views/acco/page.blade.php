<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/public/logo.png" rel="shortcut icon" />

        <title>حسابداری </title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
                    {{-- Loding Start --}}
                    <x-load-page />

        <div id="app">
            <div class="container-xxl">
                <div dir="rtl" class="w-100 d-flex align-items-center my-f-11 my-color-b-900 my-font-IS p-2" style="height: 50px;background-color: #efefef">
                    <a href="/" class="me-4 pb-2" style="text-decoration: none!important;color:#323232;">صفحه اصلی</a>
                     @if($seting->find(8)->status == 1)<a href="{{route('acco.index')}}" class="me-4 pb-2  @if($menu == 'index') border-bottom @endif" style="text-decoration: none!important;color:#323232;">مدریت حساب ها </a>@endif
                     @if($seting->find(9)->status == 1)<a href="{{route('acco.report')}}" class="me-4 pb-2  @if($menu == 'report') border-bottom @endif" style="text-decoration: none!important;color:#323232;">گزارش کار   </a>@endif
                    <span dir="rtl" class="me-auto">{{jdate()->now()}}</span>
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
    @vite('resources/js/app.js')

</html>
