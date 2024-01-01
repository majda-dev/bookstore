<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(Request $request, string $id): View
    {
        $value = $request->session()->get('key', 'default');

        // $value = $request->session()->get('key', function () {
        //     return 'default';
        // });


        $user = User::find($id);

        return view('clients.profile', ['user' => $user]);


    }
}
