@extends('cashier.page')

@section('index')
<div class="d-flex justify-content-center align-items-center my-3">
    <input type="text" v-model="name_creditor" @keyup="search_name_creditor" class="w-75 text-center my-font-IYL my-f-11" placeholder="جستوجو نام بدهکار..." dir="rtl" style="height: 30px;border: 1px solid rgb(205, 205, 205)">
</div>

<div class="d-flex justify-content-center align-items-center my-3">
    <div class="w-75">
        <div class="d-flex justify-content-center">
            <button class="btn btn-success mx-3 my-font-IYL my-f-10-i btn-sm"> اضافه نمودن</button>
            <button class="btn btn-danger mx-3 my-font-IYL my-f-10-i btn-sm">حذف</button>
            <button class="btn btn-info mx-3 my-font-IYL my-f-10-i btn-sm">دریافتی</button>
        </div>
        <br>
        <br>
        <table dir="rtl" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ردیف</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">نام بدهکار</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">توضیحات</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">جمع کل</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">تاریخ ثبت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">ساعت ثبت</th>
                    <th scope="col" class="my-f-12 my-font-IYL my-color-b-700">عملیات</th>
                </tr>
            </thead>
            <tbody v-if="data_search_creditor == null">
                @foreach ($creditors as $creditor)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{$creditor->name}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{$creditor->des}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{$creditor->price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{jdate($creditor->created_at)->format('%A, %d %B %y')}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">{{$creditor->created_at->format('H:i:s')}}</td>
                        <td class="my-font-ISL my-f-12 my-color-b-600">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="check_delete[]" value="{{$creditor->id}}" id="flexCheckDefault{{$creditor->id}}">
                                <label class="form-check-label" for="flexCheckDefault{{$creditor->id}}">
                                حذف
                                </label>
                            </div>
                            <a class="btn btn-info my-f-8-i mx-1 btn-sm" href="{{route('cashier.edit.product' , ['name' => ($creditor->name != null) ?$creditor->name : 'none'])}}">ویرایش</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tbody v-else>
                <tr v-for="(creditor , index) in data_search_creditor" @key="index">
                    <th scope="row">--</th>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.name}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.des}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.price}} <span class="my-f-10 my-color-b-500 my-font-IYL">(تومان)</span></td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.created_at}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">@{{creditor.time}}</td>
                    <td class="my-font-ISL my-f-12 my-color-b-600">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_delete[]" value="{{$creditor->id}}" id="flexCheckDefault{{$creditor->id}}">
                            <label class="form-check-label" for="flexCheckDefault{{$creditor->id}}">
                            حذف
                            </label>
                        </div>
                        <a class="btn btn-info my-f-8-i mx-1 btn-sm" href="{{route('cashier.edit.product' , ['name' => ($creditor->name != null) ?$creditor->name : 'none'])}}">ویرایش</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
