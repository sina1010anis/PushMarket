<div>

    @if ($mode == 'red')
        <button class="btn btn-r btn-cus btn-sm my-font-IYM-i my-f-9-i"><span class="my-f-15-i">{!!$icon!!}</span><span class="btn-text"><b>{{$title}}</b></span></button>
    @endif
    @if ($mode == 'green')
        <button class="btn btn-g btn-cus btn-sm my-font-IYM-i my-f-9-i"><span class="my-f-15-i">{!!$icon!!}</span><span class="btn-text"><b>{{$title}}</b></span></button>
    @endif
    @if ($mode == 'blue')
        <button class="btn btn-b btn-cus btn-sm my-font-IYM-i my-f-9-i"><span class="my-f-15-i">{!!$icon!!}</span><span class="btn-text"><b>{{$title}}</b></span></button>
    @endif
</div>
