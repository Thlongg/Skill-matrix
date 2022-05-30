@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Level</h1>
        <form action="{{ route('levels.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="level" class="form-label">Level</label>
              <input type="text" value="{{ old("level")}}" class="form-control" name="level" id="level">
            <div class="mb-3">
            @error('level')
              <div class="text-danger">{{$message}}</div>      
            @enderror
            <div class="mb-3">
              <label for="desc" class="form-label">Description</label>
              {{-- <input type="text" value="{{ old("desc")}}" class="form-control" name="desc" id="desc"> --}}
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="desc"  placeholder="Description ..."></textarea>
              @error('desc')
              <div class="text-danger">{{$message}}</div>      
              @enderror
            </div>
            <div class="mb-3">
              <label for="color" class="form-label">Color</label>
              <input type="color" class="form-control" name="color" id="color">
            </div>
            @error('color')
              <div class="text-danger">{{$message}}</div>      
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection