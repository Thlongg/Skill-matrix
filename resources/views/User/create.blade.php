@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" value="{{ old("name")}}" class="form-control" name="name" id="name">
            <div class="mb-3">
            @error('name')
              <div class="text-danger">{{$message}}</div>      
            @enderror
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" value="{{ old("email")}}" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('email')
              <div class="text-danger">{{$message}}</div>      
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            @error('password')
              <div class="text-danger">{{$message}}</div>      
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection