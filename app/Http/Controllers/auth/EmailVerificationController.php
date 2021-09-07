<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify-email');
    }
    public function request(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return redirect()->route('posts')
            ->with('success', 'Verification link sent!');
    }

    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect('/posts')->with('verified', 'verified successfully');
    }



}
