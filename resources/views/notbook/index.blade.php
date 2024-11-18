@extends('notbook.page')

@section('index')

<div class="row m-0 p-0" style="height: 100vh;">

    <div class="col-12 h-100 bg-sa-b-l p-3">

        <div dir="rtl" class="w-100 p-2">
            <form action="{{route('notbook.delete')}}" method="POST">
                @csrf
                <button type="button" @click="open_book_new" class="btn btn-sa-re btn-cus my-font-IYM-i my-f-9-i"><span class="my-f-15-i ms-2"><i class="bi bi-plus-lg"></i></span><span class="btn-text"><b>ثبت یادداشت جدید</b></span></button>

                <button type="submit" class="btn btn-sa-re btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-15-i ms-2"><i class="bi bi-trash"></i></span><span class="btn-text"><b>حذف یادداشت </b></span></button>

                <div class="w-100 p-2 overflow-y-scroll bg-sa-o-vl my-3" style="max-height: 700px">

                    @foreach ($menu_books->get() as $book)

                        <div class="w-100 box-notbook bo-sa-b-h my-2 p-2">
                            <div class="d-flex justify-content-between align-items-center">

                                <p class="my-font-IYB my-f-15 co-sa-b-h my-pointer" @click="slid_table('{{$book->id}}')"> <i class="bi bi-arrow-90deg-down"></i> {{$book->name}} </p>
                                <button @click="open_book_delete('{{$book->id}}')" type="button" class="mb-2 btn btn-sa btn-cus my-font-IYM-i my-f-9-i mx-2"><span class="my-f-15-i ms-2"><i class="bi bi-trash"></i></span><span class="btn-text"><b>حذف دسته </b></span></button>

                            </div>
                            <div id="items_notbook_{{$book->id}}">
                                <table class="table bg-sa-o-h">
                                    <tbody>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="my-font-IYB my-f-15 co-sa-b-h">موضوع</th>
                                                <th scope="col" class="my-font-IYB my-f-15 co-sa-b-h ">متن</th>
                                                <th scope="col" class="my-font-IYB my-f-15 co-sa-b-h">عملیات</th>
                                            </tr>
                                        </thead>
                                @foreach ($book->books as $item)
                                                <tr>
                                                    <td class="my-font-IYM my-f-13 co-sa-b-l ">{{$item->title}}</td>
                                                    <td class="my-font-IYM my-f-13 co-sa-b-l ">{{$item->body}}</td>
                                                    <td class="my-font-IYM my-f-13 co-sa-b-l ">
                                                        <label class="form-check-label" for="chechbox{{$item->id}}">
                                                            حذف
                                                        </label>
                                                        <input v-model="item_delete_book" type="checkbox" name="check_delete_book[]" value="{{$item->id}}" id="chechbox{{$item->id}}" class="form-check-input">

                                                    </td>
                                                </tr>

                                                @endforeach
                                            </tbody>

                                        </table>
                            </div>
                        </div>

                    @endforeach


                    <div class="w-100 box-notbook bo-sa-b-h my-2 p-2">
                        <p class="my-font-IYB my-f-15 co-sa-b-h my-pointer" @click="slid_table('null')"> <i class="bi bi-arrow-90deg-down"></i> بدون موضوع ها </p>
                        <div id="items_notbook_null">
                            <table class="table bg-sa-o-h">
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col" class="my-font-IYB my-f-15 co-sa-b-h">موضوع</th>
                                            <th scope="col" class="my-font-IYB my-f-15 co-sa-b-h ">متن</th>
                                            <th scope="col" class="my-font-IYB my-f-15 co-sa-b-h">عملیات</th>
                                        </tr>
                                    </thead>
                                @foreach ($book_null as $item)
                                        <tr>
                                            <td class="my-font-IYM my-f-13 co-sa-b-l ">{{$item->title}}</td>
                                            <td class="my-font-IYM my-f-13 co-sa-b-l ">{{$item->body}}</td>
                                            <td class="my-font-IYM my-f-13 co-sa-b-l ">
                                                <label class="form-check-label" for="chechbox{{$item->id}}">
                                                    حذف
                                                </label>
                                                <input v-model="item_delete_book" type="checkbox" name="check_delete_book[]" value="{{$item->id}}" id="chechbox{{$item->id}}" class="form-check-input">

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>

</div>
<div  class="w-100 page-hiden" style="height: 100vh;z-index:2;background-color: #3a3a3a;filter: blur(200px);position: fixed;top:0;left:0"></div>

<div class="page-news page-delete p-3">
    <div class="d-flex justify-content-between align-items-center">
        <span><i class="bi bi-exclamation-circle my-f-22" style="color: rgb(255, 73, 73)"></i></span>
        <span class="text-center my-font-IYM my-f-12 my-color-b-600">اخطار</span>
    </div>
    <hr>
    <div class="my-3">
        <p dir="rtl" class="text-center my-font-IYM my-f-13 my-color-b-600">با حذف این دسته یادداشت های این  دسته حذف خواهد شد.</p>
    </div>
    <div dir="rtl" class="col-auto d-flex align-items-center">
        <button @click="delete_menu_book" type="button" class="btn btn-r btn-sm my-font-IYL-i my-f-11-i mb-3">اطمینان دارم</button>
        <button @click="cls_page" type="button" class="btn btn-bl mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن بنچره</button>
    </div>
</div>

<div class="page-new-product p-3 shadow">
    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد دسته جدید</p>
    <hr>
    <form action="{{route('notbook.new.menu')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1"> نام دسته</span>
            <input type="text" class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="نام دسته ..." name="name" >
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت دسته جدید</button>
        </div>
    </form>

    <p class="text-center my-font-IYM my-f-12 my-color-b-600">ایجاد یادداشت جدید</p>
    <hr>
    <form action="{{route('notbook.new.book')}}" method="post">
        @csrf
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon1">موضوع یادداشت</span>
            <input type="text"class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="موضوع یادداشت ..." name="title" >
        </div>
        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon2">بدنه یادداشت</span>
            <input type="text"  class="form-control my-font-IYL my-f-11-i" dir="rtl" placeholder="بدنه یادداشت..." name="body" >
        </div>


        <div  class="input-group mb-3 w-100 ">
            <span class="input-group-text my-font-IYL my-f-11-i" id="basic-addon3">موضوع یادداشت</span>
            <select name="id" class="form-select form-control my-font-IYL my-f-11-i">
                <option class="form-control my-font-IYL my-f-11-i" selected value="<?php echo Null ?>">بدون دسته</option>
                @foreach ($menu_books->get() as $book)

                    <option class="form-control my-font-IYL my-f-11-i" value="{{$book->id}}">{{$book->name}}</option>

                @endforeach
            </select>
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-g btn-sm my-font-IYL-i my-f-11-i mb-3">ثبت خبر جدید</button>
            <button @click="cls_page" type="button" class="btn btn-r mx-2 btn-sm my-font-IYL-i my-f-11-i mb-3">بستن</button>
        </div>
    </form>
</div>
@endsection
