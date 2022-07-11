@extends('layouts.index')
@section('title', 'Subcategories')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('subcategories.create') }}" class="btn btn-success">Create Sub Category</a>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->sub_categories_id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->cate->name_category }}</td>
                        <td class="d-flex">
                            <a href={{ route('subcategories.edit', $category->sub_categories_id) }} class="btn btn-warning">
                                Edit</a>
                            <form id="deleteform{{ $category->sub_categories_id }}"
                                action="{{ route('subcategories.destroy', $category->sub_categories_id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                            </form>
                            <button data-form="deleteform{{ $category->sub_categories_id }}" type="submit"
                                class="btn btn-delete btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection

@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on("click", ".btn-delete", function() {
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

        $("document").ready(function() {
            setTimeout(function() {
                $(".alert-success").remove();
            }, 2000);
        });
    </script>
@endsection
