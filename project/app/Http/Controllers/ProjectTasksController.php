<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
        request()->has('completed') ? $task->complete() : $task->incomplete();

        return back();
    }

    public function store(Project $project)
    {
        $attributes = request()->validate(['description' => 'required']);
        $project->addTask(request('description'));

        return back();
    }

}
