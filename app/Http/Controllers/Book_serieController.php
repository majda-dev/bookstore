<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_serie;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Book_serieController extends Controller
{

    public function index()
    {
        $book_series = Book_serie::all();
        $book = Book::all();
        $writers = Writer::all();
        $categories = Category::all();
        return view("book_series.index",compact('book_series','writers','categories','book'));
    }

    public function create()
    {
        $writers = Writer::all();
        $categories = Category::all();

        return view('book_series.add',compact('writers','categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
            'price' => 'required|numeric',
            'number_of_books' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required|exists:categories,id',
            'writer' => 'required|exists:writers,id'
        ]);

        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();
        $request->photo->move(public_path('book_series'), $file_name);

        $existingBook = Book_serie::where('name', $validatedData['name'])->first();
        if ($existingBook)
        {
            return redirect()->back()->withInput()->withErrors(['name' => 'Book already exists']);
        }

        $book_serie = new Book_serie();
        $book_serie->name = $validatedData['name'];
        $book_serie->description = $validatedData['description'];
        $book_serie->photo = $file_name;
        $book_serie->price = $validatedData['price'];
        $book_serie->number_of_books = $validatedData['number_of_books'];
        $book_serie->quantity = $validatedData['quantity'];
        $book_serie->id_category = $validatedData['category'];
        $book_serie->id_writer = $validatedData['writer'];
        $book_serie->save();

        try {
            if ($book_serie->save()) {
                return redirect()->route('book_series.list')->with('success', 'Book serie has been created successfully');
            } else {
                return redirect()->route('book_series.add')->with('error', 'Failed to create book serie');
            }
        } catch (\Exception $e) {
            Log::error('Failed to save book serie: ' . $e->getMessage());
            return redirect()->route('book_series.add')->with('error', 'Failed to create book serie');
        }
    }

    public function edit($id)
    {
        $book_serie=Book_serie::where('id',$id)->firstOrFail();
        $categories=Category::all();
        $writers=Writer::all();
        return view('book_series.update',compact('book_serie','writers','categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category' => 'required|exists:categories,id',
            'writer' => 'required|exists:writers,id',
            'number_of_books' => 'required|numeric',
        ]);

        $book_serie = Book_serie::findOrFail($id);
        $existingBook = Book_serie::where('name', $validatedData['name'])
        ->where('id', '!=', $id)
        ->first();

        if ($existingBook)
        {
            return redirect()->back()->withInput()->withErrors(['name' => 'Book serie already exists']);
        }


        if ($request->hasFile('photo'))
        {
            $file_name = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('book_series'), $file_name);
            $book_serie->photo = $file_name;
        }

        $book_serie->name = $validatedData['name'];
        $book_serie->description = $validatedData['description'];
        $book_serie->id_category = $validatedData['category'];
        $book_serie->price = $validatedData['price'];
        $book_serie->quantity = $validatedData['quantity'];
        $book_serie->id_writer = $validatedData['writer'];
        $book_serie->number_of_books = $validatedData['writer'];

        $book_serie->save();

        return redirect()->route('book_series.list')->with('success', 'Book Serie has been updated successfully');
    }
}
