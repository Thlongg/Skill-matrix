@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Create Product</h1>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{ old('name') }}" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Description</label>
                <input type="text" value="{{ old('description') }}" class="form-control" name="description" id="name">
            </div>
            <div class="mb-3">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Price</label>
                <input type="text" value="{{ old('price') }}" class="form-control" name="price" id="name">
            </div>
            <div class="mb-3">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image"> Image </label>
                <input type="file" class="form-control" name="image" onchange="showPreviewOne(event);" placeholder="image Name"
                       id="inputimage" >
                <br>
                <div class="position-relative">
                    <div id="x" class="btn-close" onclick="hideIMG();" style="display: none;position: absolute; left:0"></div>
                    <img id="file-ip-1-preview" src="" style="height: auto; width: 400px ;display: none">
                    @if ($errors->has('image'))
                        <span class="error text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
            <script>
                function showPreviewOne(event){
                    if(event.target.files.length > 0){
                        let src = URL.createObjectURL(event.target.files[0]);
                        let preview = document.getElementById("file-ip-1-preview");
                        preview.src = src;
                        preview.style.display = "block";
                        document.getElementById("x").style.display = "block";
                    }
                }
                function hideIMG(){
                    document.getElementById("inputimage").value = "";
                    let preview = document.getElementById("file-ip-1-preview");
                    preview.src = '';
                    preview.style.display = "none";
                    document.getElementById("x").style.display = "none";
                }
            </script>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
