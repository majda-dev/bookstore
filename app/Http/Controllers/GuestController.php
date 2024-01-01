<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\SessionHelper;

class GuestController extends Controller
{
    private function generate_unique_session_id()
    {
        return Str::uuid();
    }

    // public function create()
    // {

    //     $session_id = SessionHelper::generate_unique_session_id();
    //     // dd($session_id);
    //     echo $session_id;

    //     $guest = new Guest();
    //     $guest->session_id = $session_id;
    //     $guest->save();
    //     // dd($guest);

    //     // return view('admins.add');

    //     // return response()->json(['message' => 'Guest record created successfully', 'session_id' => $session_id]);
    // }


    public function create()
    {
        return view('guests.create'); // Display the form for creating a guest
    }

    public function store(Request $request)
    {

            $session_id = SessionHelper::generate_unique_session_id();

            $guest = new Guest();
            $guest->session_id = $session_id;
            $guest->save();

            return response()->json(['message' => 'Route is accessible']);

    
}


}
