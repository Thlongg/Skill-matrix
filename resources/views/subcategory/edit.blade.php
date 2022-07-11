@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Edit SubCategory: {{ $subcategories->name}}</h1>
        <form action="{{ route('subcategories.update', $subcategories->sub_categories_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{ old('name_category') ?? $subcategories->name }}" class="form-control"
                    name="name_category" id="name">
                <div class="mb-3">
                    @error('name_category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Parent Category</label>
                <br>
                <select class="form-control" name="parent_id">
                  @foreach ($categories as $categoryParent)
                    <option value="{{$categoryParent->category_id}}">{{$categoryParent->name_category}}</option>
                  @endforeach
                </select>
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
