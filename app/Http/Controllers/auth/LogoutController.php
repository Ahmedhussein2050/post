<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect('/');
    }
}
