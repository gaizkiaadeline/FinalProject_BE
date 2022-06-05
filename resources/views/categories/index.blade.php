@extends('layouts.app')

@section('title', 'Manage Categories | PT Musang')

@section('content')

    @include('categories.create')

    <div class="container mt-5">
        <div class="col-md-7 bg-light p-4 rounded">

            <h3>Manage Categories</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero mollitia numquam quibusdam cupiditate quis
                magnam, harum reiciendis iste nesciunt esse incidunt, optio fugiat dolor, cumque temporibus modi.
                Repellat,
                aspernatur dignissimos?
            </p>
            <hr>
            <button class="btn btn-sm btn-dark my-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i
                    class="uil uil-plus me-1"></i>Add Category</button>

            @if (session('success_msg'))
                <div class="alert alert-success mb-3">{{ session('success_msg') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                        {{-- <th scope="col">Handle</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->title }}</td>
                            <td>
                                <a href="{{ route('editCategory', $category->id) }}" class="text-primary"><i
                                        class="uil uil-edit-alt"></i></a>
                                <a href="" class="text-danger ms-3"
                                    onclick="event.preventDefault(); document.getElementById('delete-form').submit()">
                                    <i class="uil uil-trash-alt"></i>
                                    <form id="delete-form" action="{{ route('deleteCategory', $category->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </a>
                            </td>
                            {{-- <td>@mdo</td> --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
