@extends('layouts.masterlayout');

@section('content')
    <h1>Home page</h1>
    <h3>This is the home page content.</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad placeat, vero quam delectus vel amet asperiores? Quisquam laudantium culpa libero, et repudiandae facere iste eaque temporibus nihil earum sit deserunt suscipit nulla error magnam iusto. Fugiat minima amet excepturi eius.</p>
    @endsection

    {{-- if we include a sections multiple times it will include only the first one section  --}}

@section('title')
    Home Page
@endsection