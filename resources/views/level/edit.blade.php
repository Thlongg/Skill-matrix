@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit levels: {{$level->name}}</h1>
        <form action="{{ route('levels.update', $level->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="level" class="form-label">Level</label>
              <input type="text" value="{{ old("level") ?? $level->level}}" class="form-control" name="level" id="level">
            <div class="mb-3">
            @error('level')
              <div class="text-danger">{{$message}}</div>      
            @enderror
            <div class="mb-3">
              <label for="desc" class="form-label">Description </label>
              {{-- <input type="text" value="{{ old("desc") ?? $level->desc}}" class="form-control" name="desc" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="desc">{{ old("desc") ?? $level->desc}}</textarea>
              @error('desc')
              <div class="text-danger">{{$message}}</div>      
              @enderror
            </div>
            <div class="mb-3">
              <label for="color" class="form-label">Color</label>
              <input type="text" class="form-control" value="{{ old("color") ?? $level->color}}" name="color" id="color">
            </div>
            @error('color')
              <div class="text-danger">{{$message}}</div>      
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection