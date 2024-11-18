<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBookRequest;
use App\Http\Requests\NewMenuRequest;
use App\Models\Book;
use App\Models\MenuBook;
use App\Repository\Delete\DeleteItem;
use Illuminate\Http\Request;

class NotBookController extends Controller
{
    public function index()
    {

        $data = MenuBook::query();

        $book_null = Book::whereMenu_book_id(Null)->get();

        return view('notbook.index', ['menu_books' => $data, 'book_null' => $book_null]);

    }

    public function deleteBooks(Request $request)
    {

        if ($request->has('check_delete_book')) {

            (new DeleteItem())->deleteForMultlId(Book::class, $request->check_delete_book);

            return back()->with('msg' , 'یادداشت انتخاب شده با موفقیت حذف شد.');

        }

        return back()->with('msg' , 'لطفا یادداشت خود را برای حذف انتخاب کنید.');

    }

    public function deleteMenuBooks(Request $request)
    {

        if ($request->has('id')) {

            (new DeleteItem())->deleteCustumeWhere(Book::class, ['menu_book_id'=> $request->id])->deleteForSingelId(MenuBook::class, $request->id);
            return true;

        }

        return back()->with('msg' , 'لطفا یادداشت خود را برای حذف انتخاب کنید.');

    }

    public function newMenuBooks(NewMenuRequest $request)
    {

        MenuBook::create([
            'name' => $request->name
        ]);

        return back()->with('msg' , 'دسته با موفقیت اضافه شد.');


    }

    public function newBook(NewBookRequest $request)
    {

        Book::create([
            'title' => $request->title,
            'body' => $request->body,
            'menu_book_id' => $request->id,
        ]);

        return back()->with('msg' , 'یادداشت با موفقیت اضافه شد.');


    }


}
