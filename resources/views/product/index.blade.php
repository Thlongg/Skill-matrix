@extends('layouts.index')
@section('title', 'Product')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <img height="100px" width="100px"
                            src="{{ $product->image == 'default.png' ? url('images/default.png') : url('images/'.$product->image)}}">
                        </td>
                        <td >
                            <a href={{ route('products.edit', $product->product_id) }} class="btn btn-warning"> Edit</a>
                            <form id="deleteform{{ $product->product_id }}"
                                action="{{ route('products.destroy', $product->product_id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                            </form>
                            <button data-form="deleteform{{ $product->product_id }}" type="submit"
                                class="btn btn-delete btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
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
