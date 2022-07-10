@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit role: {{$role->name}}</h1>
        <form action="{{ route('roles.update', $role->role_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="level" class="form-label">Role Name</label>
                <input type="text" value="{{ old("name") ?? $role->name}}" class="form-control" name="name"
                       id="level">
                <div class="mb-3">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
