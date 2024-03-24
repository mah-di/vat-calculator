<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function registerView()
    {
        return view('pages.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:3']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if (!Auth::attempt($request->only('email', 'password')))
            return Redirect::route('login')->with('error', 'Unexpected error occured, couldn\'t login.');

        $request->session()->regenerate();

        $token = $user->createToken('authToken')->plainTextToken;

        return Redirect::route('vat.calc')->cookie('token', "Bearer {$token}");
    }
    public function loginView()
    {

        return view('pages.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3']
        ]);

        if (!Auth::attempt($request->only('email', 'password')))
            return Redirect::back()->with('error', 'Invalid credentials.');

        $request->session()->regenerate();

        $token = $request->user()->createToken('authToken')->plainTextToken;

        return Redirect::route('vat.calc')->cookie('token', "Bearer {$token}");
    }
    public function logout(Request $request)
    {
        $request->session()->flush();

        return Redirect::route('login.view')->cookie('token', '', -1);
    }
}
