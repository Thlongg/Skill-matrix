@extends('layouts.index')
@section('title','User')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif
        <a href="{{route("users.create")}}" class="btn btn-success">Create</a>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="d-flex">
                       <a href={{route("users.edit" ,$user->id)}} class="btn btn-warning"> Edit</a>
                        <form id="deleteform{{ $user->id }}" action="{{route("users.destroy", $user->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                        </form>
                        <button data-form="deleteform{{ $user->id }}" type="submit" class="btn btn-delete btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{  $users->links() }}
    </div>
@endsection

@section("script")
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function(){
            $(document).on("click", ".btn-delete", function(){
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

        $("document").ready(function(){
            setTimeout(function(){
                $(".alert-success").remove();
            }, 2000 ); 
        });
    </script>
@endsection