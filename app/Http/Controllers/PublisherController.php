<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PublisherController extends Controller
{
    public function create()
    {
        return view('publishers.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);


        $existing_publisher = Publisher::where('email', $validatedData['email'])->first();
        if ($existing_publisher) {
            return redirect()->back()->withInput()->withErrors(['email' => 'publisher already exists.']);
        }

        $publisher = new Publisher();
        $publisher->name = $validatedData['name'];
        $publisher->email = $validatedData['email'];
        $publisher->phone = $validatedData['phone'];
        $publisher->address = $validatedData['address'];

        try
        {
            if ($publisher->save())
            {
                return redirect()->route('publishers.add')->with('success', 'publisher has been created successfully');
            }
            else
            {
                Log::error('Failed to save publisher');
                return redirect()->back()->with('error', 'Failed to create publisher. Please try again.');
            }
        }
        catch (\Exception $e)
        {
            Log::error('Failed to save publisher: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create publisher. Please try again.');
        }
    }
}
