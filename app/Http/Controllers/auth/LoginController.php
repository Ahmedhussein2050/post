<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLogin;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.login');
    }
    public function login(UserLogin $request): RedirectResponse
    {
        $validated = $request->validated();
        $cred = array(
            'email' => $validated['email'],
            'password' => $validated['password']
        );
        if (auth()->attempt($cred, $request->remember)){
            return redirect()->route('dashboard');
        }else
        {
            return back()->with('error', 'Invalid Login Data!');
        }
    }

}
