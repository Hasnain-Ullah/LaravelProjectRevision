@extends('layouts.masterlayout');

@section('content')
    <h1>About page</h1>
    <h3>This is the about page content.</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad placeat, vero quam delectus vel amet asperiores? Quisquam laudantium culpa libero, et repudiandae facere iste eaque temporibus nihil earum sit deserunt suscipit nulla error magnam iusto. Fugiat minima amet excepturi eius.</p>
@endsection

@section('title')
    About Page
@endsection

@section('sidebar')
    @parent       
            {{-- Here parents contents comes from the section defined in masterlayout --}}
    <p>This is appended to the master layout</p>
@endsection

@push('scripts')   {{-- Here we can push the JavaScript code into blade inheritance --}}
    <script src="/jquery.js"></script>
    <script src="/bootstrap.js"></script>
    <script src="/example.js"></script>
@endpush

@push('scripts')       {{-- We can push multiple scripts with same name using  push directive --}}
    <script src="/vue.js"></script>
@endpush
{{-- Difference between section and push  --}}
{{-- Note: We can use only one @section with same name but we can use multiple @push with same name --}}

@push('styles')   {{-- We can also push styles using push directive --}}
    <link rel="stylesheet" href="/example.css">
@endpush

@prepend('scripts')    {{-- Here we push the CSS/Js code before the area defined in master page --}}
    <style>
        footer {
            color: black;
        }
    </style>
    
@endprepend