@extends('layout.main')

@section('container')
    <h1>All Category</h1>

    @foreach ($categories as $category)
       <ul>
        <li><h1><a href="/posts?categories={{ $category->slug }}">{{ $category->name }}</a></h1></li>
       </ul>
    @endforeach
      

@endsection