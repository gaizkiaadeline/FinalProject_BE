@extends('layouts.app')

@section('title', 'Edit Product | PT Musang')

@section('content')
    <div class="container mt-3">
        <div class="col-md-7 bg-light p-4 rounded">
            <h4>Edit Product</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis animi corrupti natus provident ratione
                et repellat quo sit reprehenderit esse? Quae nisi sapiente molestiae tempora, enim nostrum quos cumque
                vitae.
            </p>
            <hr>

            <form action="{{ route('updateBlog', $blog->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Product Photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" placeholder="photo Blog..."
                        name="photo" value="{{ old('photo') ? old('photo') : $blog->photo }}">
                    @error('photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Blog..."
                        name="title" value="{{ old('title') ? old('title') : $blog->title }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Konten Blog..." name="content"
                        rows="5">
                    {{ old('content') ? old('content') : $blog->content }}
                </textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Category Product</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
