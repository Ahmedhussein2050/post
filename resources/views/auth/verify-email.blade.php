@extends('layouts.app')
@section('title')
    Verification
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-75 bg-white p-4 rounded-lg">
            <h1>Verify email</h1>

            <p>Please verify your email address by clicking the link in the mail we just sent you. Thanks!</p>
            <form action="{{ route('verification.send') }}" method="post">
                <button class="btn btn-primary" type="submit">Request a new link</button>
            </form>
        </div>
    </div>
@endsection



