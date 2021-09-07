@extends('layouts.app')
@section('title')
    Reset Password
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-75 bg-white p-4 rounded-lg">
            <div class="card-body">
                @if (Session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session()->get('message') }}
                    </div>
                @endif
                <form class="mb-5 w-50 m-auto" method="post" action="{{ route('forget.password.post') }}">
                    @csrf

                    <div class="mt-3">
                        <label for="exampleInputEmail1" class="form-label"><b>Email To Send Reset Link</b></label>
                        @error('email')
                        <div class=" w-100 alert alert-danger">{{ $message }}.</div>
                        @enderror
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                        @if(session('error'))
                            <b class="text-danger">{{ session('error') }}</b>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 w-100"><b>Send</b></button>
                </form>

            </div>

            </div>
    </div>
@endsection
