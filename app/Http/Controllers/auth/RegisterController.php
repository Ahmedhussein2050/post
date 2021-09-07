<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegister;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }
    public function store(UserRegister $request)
    {
        $validated = $request->validated();
        $user = new User;
        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        auth()->attempt([
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);
        event(new Registered($user));
        return redirect()->route('verification.notice');

    }
}
