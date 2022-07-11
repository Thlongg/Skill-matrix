@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Create Category</h1>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" value="{{ old("name")}}" class="form-control" name="name_category" id="name">
            <div class="mb-3">
            @error('name_category')
              <div class="text-danger">{{$message}}</div>      
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection