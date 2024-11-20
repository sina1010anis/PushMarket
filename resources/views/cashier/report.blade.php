@extends('cashier.page')

@section('index')
<report :factors="{{$factors}}">

    <template #view_file_excle>
        <form action="{{route('cashier.export.download')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">دانلود فایل</button>
        </form>
    </template>

</report>
@endsection
