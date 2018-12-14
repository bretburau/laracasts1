@extends('layout')

@section('title', 'Welcome')

@section('content')
    <h1>My first {{ $foo }}</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>

@endsection