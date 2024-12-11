<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register(Request $request) {
        if ($request->isMethod('post')) {

            $validator =Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            return redirect()->route('user.login')->with('success', 'Registration successful!');
        }

        return view('user.register');
    }

    public function login(){
        if (Auth::check()) {
            return redirect()->route('index')->with('message', 'You are already logged in!');
        }
        return view('user.login');
    }

    public function authenticate(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route('index');
        } else {
            return back()->with('error', 'Invalid credentials')->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }

}
