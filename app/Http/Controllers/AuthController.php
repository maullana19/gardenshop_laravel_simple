<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showProfile($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        return view('profile_user', compact('user'));
    }

    public function login_credentials(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'You are Logged in !');
        } else {
            return redirect()->back()->with('failed', 'Email or password is not valid');
        }

        // dd($request->all());
    }

    // REGISTER USER
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register_credentials(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8",
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('login')->with('success', 'Register Success');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('success', 'You are logged out !');
    }
}
