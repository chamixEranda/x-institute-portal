@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="card col-md-4 p-3">
            <h2 class="text-center">Login</h2>
            <form action="{{ route('user.login') }}" method="POST" id="login-form" autocomplete="off">
                @csrf
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="email" class="form-control" id="username" placeholder="Enter username" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3 w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection