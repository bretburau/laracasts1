@extends('layout')

@section('content')
    <h1>Edit Project</h1>
    <form method="POST" action="/projects/{{ $project->id }}">
        {{ method_field('PATCH')}}
        {{ csrf_field() }}
        <label class="label" for="title">Title</label>
        <div>
            <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
        </div>
        <div>
            <label class="label" for="description">Description</label>
            <textarea name="description" class="textarea"></textarea>
        </div>
        <button type="submit">Update</button>
    </form>
    <form method="POST" action="/projects/{{ $project->id }}">
        @method('DELETE')
        @csrf  
        <button type="submit">Delete project</button>
    </form>
    

@endsection