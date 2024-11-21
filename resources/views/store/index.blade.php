@extends('store.page')

@section('index')

<report-store :stores="{{$stores}}" :exits="{{$exits}}">

    <template #view_file_excle>

        <form action="{{route('store.export.download')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">دانلود فایل</button>
        </form>

    </template>

    <template #view_file_excle_exit>

        <form action="{{route('store.exit.export.download')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">دانلود فایل</button>
        </form>

    </template>

</report-store>
@endsection
