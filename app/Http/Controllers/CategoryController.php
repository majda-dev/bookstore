<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Writer;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable'
        ]);

        $file_name = null;

        if ($request->hasFile('photo')) {
            $file_name = time() . '.' . request()->photo->getClientOriginalExtension();
            $request->photo->move(public_path('categories'), $file_name);
        }

        $existingCategory = Category::where('name', $request->input('name'))->first();

        if ($existingCategory) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Category already exists']);
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->photo = $file_name;

        try {
            if ($category->save()) {
                return redirect()->route('categories.add')->with('success', 'Category has been created successfully');
            } else {
                Log::error('Failed to save category');
                return redirect()->back()->with('error', 'Failed to create category. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('Failed to save category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create category. Please try again.');
        }
    }


    public function edit($id)
    {
        $category=Category::where('id',$id)->firstOrFail();
        return view('categories.update',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $category=Category::findOrFail($id);
        if ($request->hasFile('photo'))
        {
            $file_name = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('categories'), $file_name);
            $category->photo = $file_name;
        }

        $category->name=$validatedData['name'];


        $category->save();

        return redirect()->route('categories.list')->with('success', 'Category has been updated successfully');
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('categories.list')->with('success', 'Category has been deleted successfully');
    }

}
