@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Create Category</h1>
        <form action="{{ route('categoriesSub.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" value="{{ old("name")}}" class="form-control" name="name" id="name">
            <div class="mb-3">
            @error('name_category')
              <div class="text-danger">{{$message}}</div>      
            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Parent Category</label>
                <br>
                <select class="form-control" name="parent_id">
                  @foreach ($categories as $categoryParent)
                    <option value="{{$categoryParent->category_id}}">{{$categoryParent->name_category}}</option>
                  @endforeach
                </select>
              <div class="mb-3">
              @error('parent_id')
                <div class="text-danger">{{$message}}</div>      
              @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection