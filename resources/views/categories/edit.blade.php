@extends('layouts.app')

@section('title', 'Edit Category | PT Musang')

@section('content')


    <div class="container mt-5">
        <div class="col-md-7 bg-light p-4 rounded">

            <h3>Edit Category</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero mollitia numquam quibusdam cupiditate quis
                magnam, harum reiciendis iste nesciunt esse incidunt, optio fugiat dolor, cumque temporibus modi.
                Repellat,
                aspernatur dignissimos?
            </p>
            <hr>
            <form action="{{ route('updateCategory', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        placeholder="Input category title." name="title"
                        value="{{ old('title') ? old('title') : $category->title }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>

        </div>
    </div>

@endsection
