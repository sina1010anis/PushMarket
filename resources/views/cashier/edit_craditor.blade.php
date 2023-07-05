@extends('cashier.page')

@section('index')
<div dir="rtl" class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="w-100 p-2 border rounded-5 shadow">
            <p class="my-font-IYM my-f-15 my-color-b-800 text-center">ویرایش بدهکاری</p>
            <hr>
            <br>
            @if (session('msg'))
                <div class="d-flex justify-content-center align-items-center my-3">
                    <div class="w-75">
                        <div class="alert alert-success text-center my-f-13 my-font-IYM">{{session('msg')}}</div>
                    </div>
                </div>
            @endif
            <form action="{{route('cashier.creditor.edit.post' , ['id' => $data->id])}}" method="POST">
                @csrf
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput1" class="form-label">نام بدهکار</label>
                    <input type="text" class="form-control text-center" name="name" id="exampleFormControlInput1" placeholder="نام بدهکار" value="{{$data->name}}">
                </div>
                @error ('name')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput2" class="form-label">مقدار بدهکاری </label>
                    <input type="number" class="form-control text-center" name="price" id="exampleFormControlInput2"  placeholder="مقدار بدهکاری " value="{{$data->price}}">
                </div>
                @error ('price')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <div class="mb-3 my-font-IYL my-f-11 my-color-b-600 text-center">
                    <label for="exampleFormControlInput3" class="form-label">توضیحات </label>
                    <input type="text" class="form-control text-center" name="des" id="exampleFormControlInput3"  placeholder=" توضیحات" value="{{$data->des}}">
                </div>
                @error ('des')
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <div class="w-75">
                            <div class="alert alert-danger text-center my-f-11-i my-font-IYM">{{$message}}</div>
                        </div>
                    </div>
                @endif
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info my-font-IYL my-f-10-i btn-sm">اعمال تغییرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
