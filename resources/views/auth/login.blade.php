@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
    <div class="d-flex justify-content-center">

        <div class="w-50 bg-white p-4 rounded-lg">

            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">{{ session()->get('message') }}</div>
                @endif
                <form class="mb-5 w-50 m-auto" method="post" action="{{ route('login') }}">
                    @csrf

                    <div class="mt-3">
                        <label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
                        @error('email')
                        <div class=" w-100 alert alert-danger">{{ $message }}.</div>
                        @enderror
                        <input type="email" value="{{old('email')}}" name="email" class="form-control" id="exampleInputEmail1">
                        @if(session('error'))
                            <b class="text-danger">{{ session('error') }}</b>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="password" class="form-label"><b>Password</b></label>
                        @error('password')
                        <div class=" w-100 alert alert-danger">{{ $message }}.</div>
                        @enderror
                        <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                    </div>

                    <div class="mt-3">
                        <input type="checkbox" name="remember" id="remember" class="mr-1">
                        <label for="remember"><b>Remember me</b></label>
                    </div>
                    <a class="text-decoration-none" style="cursor: pointer"
                       href="{{ route('forget.password.get') }}">Forget your password ?</a>

                    <button type="submit" class="btn btn-primary mt-3 w-100"><b>Log in</b></button>

                </form>

            </div>

        </div>

    </div>
@endsection
