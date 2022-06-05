@extends('layouts.app')

@section('title', 'Manage Blogs | PT Musang')

@section('content')

    @include('blogs.create', $categories)

    <div class="container mt-5">
        <div class="col-md-7 bg-light p-4 rounded">

            <h3>Manage Blogs</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero mollitia numquam quibusdam cupiditate quis
                magnam, harum reiciendis iste nesciunt esse incidunt, optio fugiat dolor, cumque temporibus modi.
                Repellat,
                aspernatur dignissimos?
            </p>
            <hr>
            <button class="btn btn-sm btn-dark my-3" data-bs-toggle="modal" data-bs-target="#addBlogModal"><i
                    class="uil uil-plus me-1"></i>Add Blogs</button>

            @if (session('success_msg'))
                <div class="alert alert-success mb-3">{{ session('success_msg') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->price }}</td>
                            <td>{{ $blog->stock }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
