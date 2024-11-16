<div>

    @if ($mode == 'red')
        <button class="btn btn-sa-re btn-cus my-font-IYM-i my-f-9-i {{$class_cu}}"><span class="my-f-15-i">{!!$icon!!}</span><span class="btn-text"><b>{{$title}}</b></span></button>
    @endif
    @if ($mode == 'green')
        <button class="btn btn-sa-re btn-cus my-font-IYM-i my-f-9-i {{$class_cu}}"><span class="my-f-15-i">{!!$icon!!}</span><span class="btn-text"><b>{{$title}}</b></span></button>
    @endif
    @if ($mode == 'blue')
        <button class="btn btn-sa-re btn-cus my-font-IYM-i my-f-9-i {{$class_cu}}"><span class="my-f-15-i ms-2">{!!$icon!!}</span><span class="btn-text"><b>{{$title}}</b></span></button>
    @endif
</div>
