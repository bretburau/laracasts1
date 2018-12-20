<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a new project</h1>
    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <div>
            <input required type="text" name="title" placeholder="Project title" value="{{ old('title') }}">
        </div>
    
        <div>
            <textarea required name="description" placeholder="Project description">{{ old('description') }}</textarea>
        </div>
    
        <div>
            <button type="submit">Create Project</button>
        </div>
        @if ($errors->any())
            <div>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
    </form> 
</body>
</html>