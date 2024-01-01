<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Writer;
use Hashids\Hashids;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $hashids = new Hashids(env('HASHID_SALT'), 15);
        $books = Book::all();

    // Use $value as needed

    return view('index', compact('categories', 'books', 'hashids'));
    }

    public function show($encryptedId)
    {
        $hashids = new Hashids(env('HASHID_SALT'), 15);
        $bookId = $hashids->decode($encryptedId);


        if (empty($bookId)) {
            abort(404);
        }

        $book = Book::find($bookId[0]);
        $categories=Category::all();
        $writers=Writer::all();
        $cart=Cart::all();

        if (!$book) {
            abort(404);
        }

        return view('bookShow', compact('book','categories','writers','cart'));
    }
}
