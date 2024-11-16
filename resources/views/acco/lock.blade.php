
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>صفحه ایمن شده</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <script src="{{mix('js/app.js')}}" defer></script>
    </head>
    <body class="antialiased">
        <div id="app">
            @if (session('msg'))
    <div class="page-msg-session px-4 py-2 my-font-IYM my-f-12 rounded-3 shadow text-center" dir="rtl">
        {{session('msg')}}
    </div>
@endif
            <div class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh">
                <div style="width: 350px" class="rounded-2 border  p-4 text-center">
                    <div class="my-font-IYM my-f-12 my-color-b-500">
                        برای ورود به بخش حسابداری لطفا وارد شوید
                    </div>
                    <hr>
                    <form action="{{route('check.acco.lock')}}" method="post">
                        @csrf
                        <div  class="input-group mb-3 w-100 ">
                            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">نام کاربری</span>
                            <input type="text" value="{{old('username')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام کاربری ..." name="username">
                        </div>
                        @error ('username')
                            <div class="d-flex justify-content-center align-items-center my-3">
                                <div class="w-75">
                                    <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                                </div>
                            </div>
                        @endif
                        <div  class="input-group mb-3 w-100 ">
                            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">رمزعبور </span>
                            <input type="password" value="{{old('password')}}" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="رمزعبور ..." name="password">
                        </div>
                        @error ('password')
                            <div class="d-flex justify-content-center align-items-center my-3">
                                <div class="w-75">
                                    <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                                </div>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-g btn-sm my-font-IYM-i my-f-12-i">ورود</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
