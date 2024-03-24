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

@elseif (session('error'))

<div class="alert alert-danger mt-4" role="alert">
    {{ session('error') }}
</div>

@endif

<div class="row justify-content-center vertical-center">
    <div class="col-md-6 center-div">
        <h2>LogIn</h2>
        <br>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
            <br>
            <span>Don't have an account? <a href="{{ route('register.view') }}">Register here.</a></span>
          </form>
    </div>
</div>

@endsection
