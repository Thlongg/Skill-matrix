@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
        @endif
        <h2>List Level</h2>
        <a href="{{route("levels.create")}}" class="btn btn-success">Create</a>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>Level</th>
                    <th>Description</th>
                    <th>Color</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($levels as $level)
                <tr>
                    <td>{{$level->id}}</td>
                    <td>{{$level->level}}</td>
                    <td>{{$level->desc}}</td>
                    <td>{{$level->color}}</td>
                    <td>
                       <a href={{route("levels.edit" ,$level->id)}} class="btn btn-warning"> Edit</a>
                        <form id="deleteform{{ $level->id }}" action="{{route("levels.destroy", $level->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                        </form>
                        <button data-form="deleteform{{ $level->id }}" type="submit" class="btn btn-delete btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{  $levels->links() }}
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