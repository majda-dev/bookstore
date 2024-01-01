<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function create()
    {

        return view('clients.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'repeat-password' => 'required',
        ]);

        $existingEmail = User::where('email', $validateData['email'])->first();
        if ($existingEmail) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email already exists']);
        }



        if ($validateData['password'] == $validateData['repeat-password']) {
            $user = new User();
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = Hash::make($validateData['password']);
            $user->save();

            $clientId = $user->id;
            $client = new Client();
            $client->id_user = $clientId;
            $client->save();
        } else {
            return redirect()->back()->withInput()->withErrors(['repeat-password' => "Passwords don't match"]);
        }

        try {
            Auth::login($user, $request->has('remember'));

            if ($user->wasRecentlyCreated) {
                return redirect()->route('clients.add')->with('success', 'You have been signed up successfully');
            } else {
                return redirect()->route('clients.add')->with('error', 'Failed to create your authentication');
            }
        } catch (\Exception $e) {
            Log::error('Failed to authenticate: ' . $e->getMessage());
            return redirect()->route('clients.add')->with('error', 'Failed to authenticate');
        }
    }
}
