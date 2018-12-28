<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;

class Project extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($project){
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
        });
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($descritption)
    {
        dd($descritption);
        Task::create([
            'description' => request('description'),
            'project_id' => $this->id
        ]);
        // $this->tasks()->create(compact('description')); //Throws error about field needing default value
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }
}
