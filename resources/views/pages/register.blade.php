@extends('layouts.auth')

@section('content')

    @if ($errors->isNotEmpty())

    <div class="alert alert-danger mt-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif

    <div class="row justify-content-center vertical-center">
        <div class="col-md-6 center-div">
            <h2>Register</h2>
            <br>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="cpassword">Confirm Password</label>
                  <input type="password" class="form-control" id="cpassword" name="password_confirmation" placeholder="Password">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Register</button>
                <br>
                <span>Already have an account? <a href="{{ route('login.view') }}">Login here.</a></span>
            </form>
        </div>
    </div>

@endsection
