@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Role</h1>
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="level" class="form-label">Roles</label>
                <input type="text" value="{{ old("name")}}" class="form-control" name="name" id="name">
                <div class="mb-3">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-check">
{{--                    <input class="form-check-input select-all-permission" type="checkbox"--}}
{{--                           id="checkAll">--}}
{{--                    <label class="form-label" for="checkAll">Check All</label>--}}
{{--                    <div class="row">--}}
                        @foreach($permissionGroup as $group => $permission)
{{--                            <div class="col car">--}}
{{--                                <input class="checkbox_wrapper" type="checkbox" id="checkAlla">--}}
{{--                                <label class="form-label"><b id="checkCol">{{ucfirst( $group )}}</b></label>--}}
{{--                                @foreach($permission as $key => $permissionItem)--}}
{{--                                    <div class="card-text">--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="b" type="checkbox" id="checkAllb"--}}
{{--                                                   name="permission_ids[]"--}}
{{--                                                   value="{{ $permissionItem->permission_id }}" {{(is_array(old('name')) and in_array($permissionItem->permission_id,old('name'))) ? 'checked' : '' }}>--}}
{{--                                            <label class="form-check-label"--}}
{{--                                                   for="flexCheckDefault">--}}
{{--                                                {{ $permissionItem->display_name }}--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
                        <input type="checkbox" value="{{$permission->permission_id}}" name="permission_ids[]">
                        <label for="">{{$permission->name}}</label>
                        <br>
                        @endforeach
{{--                    </div>--}}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
