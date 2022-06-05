@extends('layouts.app')

@section('title')
    Register | PT Musang
@endsection


@section('content')
    <div class="container mt-5">
        <div class="col-md-4 bg-light p-3">
            <form action="/register" method="POST">
                {{-- {{url('register')}} --}}
                @csrf
                <div class="form-group">
                    <label>
                        Full Name
                        @error('fullname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" name="fullname" class="form-control" placeholder="Must have at least 3 characters">

                </div>
                <div class="form-group">
                    <label>Email
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com">

                </div>

                <div class="form-group">
                    <label>
                        Password
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="password" name="password" class="form-control"
                        placeholder="Must have at least 6 characters">

                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Must have at least 6 characters">

                </div>
                <div class="form-group">
                    <label>
                        Phone Number
                        @error('phone_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </label>
                    <input type="text" name="phone_number" class="form-control" placeholder="e.g. 08xxxxxxxx">
                </div>

                <button class="btn btn-primary">Submit</button>

            </form>
        </div>

    </div>
@endsection
