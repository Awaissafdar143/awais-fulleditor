<?php

namespace Awaistech\Larpack\Controllers\Package;

use Illuminate\Routing\Controller;
use Awaistech\Larpack\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('larpack::full-Admin-Panel.Auth.login');
    }
    public function AdminDashboard()
    {
        return view('larpack::full-Admin-Panel.backend.admindashboard');
    }
    public function logincheck(Request $request)
    {
        $request->validate([
            'username' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt(["email" => $request->username, "password" => $request->password])) {
            return redirect()->route('adminDashboard');
        } else {
            return redirect()->back()->with('message', 'service is not available right now try after 24 hours now');
        }
    }
    public function Profile()
    {
        return view('larpack::full-Admin-Panel.Auth.profile');
    }
    public function updateprofile(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
        $id = Auth::user()->id;
        $updateUser = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::logout();
        return redirect()->back()->with('message', 'Inprogress after 24 hours action has been completed');
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
