@extends('layouts.app')
{{-- extend kerangkanya --}}

@section('title')
    Home | PT Musang
@endsection
{{-- @section('title', 'Home | PT Musang') --}}

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-3">
                    <div class="col-md-12 bg-light rounded p-3">
                        <h4>{{ $blog->title }}</h4>
                        <span class="text-muted">{{ $blog->user->fullname }}</span>
                        <span class="badge bg-info">{{ $blog->category->title }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
