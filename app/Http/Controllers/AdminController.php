<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $users=User::all();
        $admins=Admin::all();
        return view('admins.index',compact("users","admins"));
    }
    public function create()
    {
        return view('admins.add');
    }

    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'privilege'=>'required|in:super_admin,admin'
        ]);


        $file_name = time() . '.' . request()->photo->getClientOriginalExtension();
        $request->photo->move(public_path('admins'), $file_name);


        $existinEmail=User::where('email',$validateData['email'])->first();
        if($existinEmail)
        {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email already exists']);
        }

        $user=new User();
        $user->name=$validateData['name'];
        $user->email=$validateData['email'];
        $user->isadmin=1;
        $user->password=Hash::make($validateData['password']);
        $user->photo=$file_name;
        $user->save();

        $userId=$user->id;
        $admin=new Admin();
        $admin->id_user=$userId;
        $admin->privilege=$validateData['privilege'];
        $admin->save();



        try {
            if ($user->save())
            {
                $admin->save();
                return redirect()->route('admins.add')->with('success', 'admin has been created successfully');

            }
            else
            {
                return redirect()->route('admins.add')->with('error', 'Failed to create admin');
            }
        }
        catch (\Exception $e)
        {
            Log::error('Failed to save admin: ' . $e->getMessage());
            return redirect()->route('admins.add')->with('error', 'Failed to create admin');
        }
    }

    public function show($id)
    {
        $admin = Admin::where("id_user",$id)->firstOrFail();
        $user=$admin->user;

        return view('admins.show', compact('admin','user'));
    }

    public function edit($id)
    {
        $admin = Admin::where("id_user",$id)->firstOrFail();
        $user=$admin->user;

        return view('admins.update', compact('admin','user'));
    }

    public function editPassword($id)
    {
        $user = User::where('id',$id)->firstOrFail();
        return view('admins.update_password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => 'string|max:255',
        ]);
        $user=new User();
        $user->password=Hash::make($validatedData['password']);


        return redirect()->route('admins.updatePassword')->with('success', 'your password has updated successfully');

    }




}
