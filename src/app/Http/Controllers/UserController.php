<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create() {
        return view('users.register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
          'name' => ['required', 'min:3'],
          'email' => ['required', 'email',  Rule::unique('users', 'email')],
          'password' => ['required', 'confirmed', 'min:6']
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        auth()->login($user);
        return redirect('/')->with('message', 'User logged in successfully!');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You are logged out!');
    }


    public function login() {
        return view('users.login');
    }

    public function authenticate(Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:6']
        ]);
        if (auth()->attempt($validated)) {
            $request->session()->regenerateToken();
            return redirect('/')->with('message', 'You are logged in!');
        }
        return back()->withErrors(['email' => 'Invalid credentials!'])->onlyInput('email');

    }

}
