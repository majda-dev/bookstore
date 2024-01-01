<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hashids\Hashids;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $hashids = new Hashids(env('HASHID_SALT'), 15);
        $books = Book::all();
        return view('book.index', compact('categories','books','hashids'));
    }

    public function create()
    {
        $categories = Category::all();
        $writers = Writer::all();
        $publishers = Publisher::all();

        return view('book.add', compact('categories','writers','publishers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'publication_date' => 'required|date',
            'quantity' => 'required|integer',
            'category' => 'required|exists:categories,id',
            'writer' => 'required|exists:writers,id',
            'publisher' => 'required|exists:publishers,id',
        ]);



        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();
        $request->photo->move(public_path('books'), $file_name);

        $existingBook = Book::where('title', $validatedData['title'])->first();
        if ($existingBook) {
            return redirect()->back()->withInput()->withErrors(['title' => 'Book already exists']);
        }

        $book = new Book();
        $book->title = $validatedData['title'];
        $book->description = $validatedData['description'];
        $book->photo = $file_name;
        $book->price = $validatedData['price'];
        $book->publication_date = $validatedData['publication_date'];
        $book->quantity = $validatedData['quantity'];
        $book->id_category = $validatedData['category'];
        $book->id_writer = $validatedData['writer'];
        $book->id_publisher = $validatedData['publisher'];
        $book->save();

        try {
            if ($book->save()) {
                return redirect()->route('books.index')->with('success', 'Book has been created successfully');
            } else {
                return redirect()->route('books.add')->with('error', 'Failed to create book');
            }
        } catch (\Exception $e) {
            Log::error('Failed to save book: ' . $e->getMessage());
            return redirect()->route('books.add')->with('error', 'Failed to create book');
        }
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

        if (!$book) {
            abort(404);
        }

        return view('book.show', compact('book','categories','writers'));
    }

    public function edit($id)
    {
        $book=Book::where('id',$id)->firstOrFail();
        $categories=Category::all();
        $writers=Writer::all();
        $publishers=Publisher::all();
        return view('book.update',compact('book','writers','publishers','categories'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'price' => 'required|numeric',
        'publication_date' => 'required|date',
        'quantity' => 'required|integer',
        'category' => 'required|exists:categories,id',
        'writer' => 'required|exists:writers,id',
        'publisher' => 'required|exists:publishers,id',
    ]);

    $book = Book::findOrFail($id);
    $existingBook = Book::where('name', $validatedData['name'])
        ->where('id', '!=', $id)
        ->first();

    if ($existingBook)
    {
        return redirect()->back()->withInput()->withErrors(['name' => 'Book already exists']);
    }

    if ($request->hasFile('photo'))
    {
        $file_name = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('books'), $file_name);
        $book->photo = $file_name;
    }

    $book->title = $validatedData['title'];
    $book->description = $validatedData['description'];
    $book->id_category = $validatedData['category'];
    $book->price = $validatedData['price'];
    $book->publication_date = $validatedData['publication_date'];
    $book->quantity = $validatedData['quantity'];
    $book->id_publisher = $validatedData['publisher'];
    $book->id_writer = $validatedData['writer'];

    $book->save();

    return redirect()->route('books.index')->with('success', 'Book has been updated successfully');
}

public function destroy($id)
{
    Book::where('id', $id)->delete();
    return redirect()->route('books.index')->with('success', 'Book has been deleted successfully');
}




}
