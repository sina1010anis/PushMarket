<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="{{mix('js/app.js')}}" defer></script>
    </head>
    <body class="antialiased">
        <div id="app">
            <Version></Version>
        </div>
    </body>
</html>
