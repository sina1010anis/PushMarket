@extends('acco.page')

@section('index')

    <report-acco :factors="{{$accounts}}" :sum_total="{{$accounts->sum('total')}}" :sum_creditor="{{$accounts->sum('creditor')}}" :sum_indebted="{{$accounts->sum('indebted')}}">

        <template #view_file_excle>
            <form action="{{route('acco.export.download')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">دانلود فایل</button>
            </form>
        </template>

    </report-acco>


@endsection
