<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Writer;


class WriterController extends Controller
{

    public function index()
    {
        $writers = Writer::all();
        $books=Book::all();
        return view('writers.index',compact('writers','books'));
    }

    public function create()
    {
        return view('writers.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'bio' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();
        $request->photo->move(public_path('writer'), $file_name);
        $existing_writer = Writer::where('email', $validatedData['email'])->first();
        if ($existing_writer) {
            return redirect()->back()->withInput()->withErrors(['email' => 'email already exists.']);
        }

        $writer = new Writer();
        $writer->first_name = $validatedData['first_name'];
        $writer->last_name = $validatedData['last_name'];
        $writer->bio = $validatedData['bio'];
        $writer->email = $validatedData['email'];
        $writer->phone = $validatedData['phone'];
        $writer->photo = $file_name;



        try
        {
            if ($writer->save())
            {
                return redirect()->route('writers.add')->with('success', 'Writer has been created successfully');
            }
            else
            {
                Log::error('Failed to save Writer');
                return redirect()->back()->with('error', 'Failed to create Writer. Please try again.');
            }
        }
        catch (\Exception $e)
        {
            Log::error('Failed to save Writer: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create Writer. Please try again.');
        }
    }

    public function showBook($id)
    {
        $writer = Writer::findOrFail($id);
        $books = $writer->book;

        return view('writers_book', compact('writer', 'books'));
    }

    public function edit($id)
    {
        $writer=Writer::where('id',$id)->firstOrFail();
        return view('writers.update',compact('writer'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'bio' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $writer=Writer::findOrFail($id);
        if ($request->hasFile('photo'))
        {
            $file_name = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('writer'), $file_name);
            $writer->photo = $file_name;
        }

        $writer->first_name=$validatedData['first_name'];
        $writer->last_name=$validatedData['last_name'];
        $writer->bio=$validatedData['bio'];
        $writer->photo=$file_name;
        $writer->email=$validatedData['email'];
        $writer->phone=$validatedData['phone'];

        $writer->save();

        return redirect()->route('writers.list')->with('success', 'Writer has been updated successfully');
    }

    public function destroy($id)
    {
        Writer::where('id',$id)->delete();
        return redirect()->route('writers.list')->with('success', 'Writer has been deleted successfully');
    }
}


