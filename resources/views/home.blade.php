@extends('layouts.app')

@section('title', 'Dashboard | PT Musang')

@section('content')
    <h1>Hello {{ Auth::user()->fullname }} !!!</h1>
    <h3>Your Role is {{ Auth::user()->role }}</h3>

@endsection
