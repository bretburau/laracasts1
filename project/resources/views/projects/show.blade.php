@extends('layout')

@section('content')
    <h1>{{ $project->title }}</h1>

    <p>{{ $project->description }}</p>

    @if ($project->tasks->count())
        <div>
            @foreach ($project->tasks as $task)
                <div>
                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @method('PATCH')
                        @csrf
                        <label class="checkbox" for="completed">
                            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            {{ $task->description }}
                        </label>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    <form action="/projects/{{ $project->id }}/tasks" method="POST">
        @csrf
        <label for="description">New Task</label>

        <div>
            <input required type="text" name="description" placeholder="New Task">
        </div>
        <button type="submit">Add Task</button>
    </form>

    <a href='/projects/{{$project->id }}/edit'>Edit</a>

    @include ('errors')
@endsection