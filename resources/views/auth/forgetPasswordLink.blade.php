@extends('layouts.app')
@section('title')
    Reset Password
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-75 bg-white p-4 rounded-lg">
            <div class="card-body">

                <form action="{{ url('/reset-password') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                            @error('password')
                            <div class=" w-100 alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Repeat Password</label>
                        <div class="col-md-6">
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                        </div>
                        </div>

                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
