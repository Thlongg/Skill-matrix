@extends('layouts.index')
@section('title','Role')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif
        <h2>List Level</h2>
        <a href="{{route("roles.create")}}" class="btn btn-success">Create</a>
        <table class="table table-hover">
            <thead>
            <tr class="table-primary">
                <th>#</th>
                <th>Role Name</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->role_id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                        @foreach($role->permissions as $permission)
                            <span>- {{$permission->name}}</span>
                            <br>
                        @endforeach
                    </td>
                    <td>
                        <a href={{route("roles.edit" ,$role->role_id)}} class="btn btn-warning"> Edit</a>
                        <form id="deleteform{{ $role->role_id }}" action="{{route("roles.destroy", $role->role_id)}}"
                              method="POST">
                            @method("DELETE")
                            @csrf
                        </form>
                        <button data-form="deleteform{{ $role->role_id }}" type="submit"
                                class="btn btn-delete btn-danger">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{  $roles->links() }}
    </div>
@endsection

@section("script")
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function () {
            $(document).on("click", ".btn-delete", function () {
                let formID = $(this).data("form");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#${formID}`).submit();
                    }
                })
            })
        })

        $("document").ready(function () {
            setTimeout(function () {
                $(".alert-success").remove();
            }, 2000);
        });
    </script>
@endsection
