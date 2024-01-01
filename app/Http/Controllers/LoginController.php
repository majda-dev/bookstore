<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authentificate(Request $request): RedirectResponse
    {
        $credentials=$request->validate(([
            'email'=>['required','email'],
            'password'=>['required']
        ]));

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            $isAdmin=User::where('id',Auth::id())->value('isadmin');

            if($isAdmin==1)
            {
                $admin=Admin::where('id_user',Auth::id())->first();
                // dd($admin);

                if($admin)
                {
                    return redirect()->route('admins.add');
                }
            }
            elseif($isAdmin==NULL)
            {
                $client=Client::where('id_user',Auth::id())->first();

                if($client)
                {
                    return redirect()->route(('clients.add'));
                }

            }
        }
        else
        {
            throw ValidationException::withMessages([
                "l'adresse mail ou le mot de pass est incorecte",
            ])->redirectTo(route('login'));
        }
        throw new AuthenticationException();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
