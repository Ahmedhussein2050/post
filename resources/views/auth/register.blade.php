@extends('layouts.app')
@section('title')
    Register
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-50 bg-white p-4 rounded-lg">
            <div class="card-body">
                <form class="mb-5 w-50 m-auto" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="mt-3">
                        <label class="form-label">Name</label>
                        @error('name')
                        <div class=" w-100 alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" value="{{old('name')}}" name="name" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Username</label>
                        @error('username')
                        <div class=" w-100 alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" value="{{old('username')}}" name="username" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        @error('email')
                        <div class=" w-100 alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="email" value="{{old('email')}}" name="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label">Password</label>
                        @error('password')
                        <div class=" w-100 alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                    </div>
                    <div class="mt-3">
                        <label for="password_confirmation" class="form-label">Repeat Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-1 w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
