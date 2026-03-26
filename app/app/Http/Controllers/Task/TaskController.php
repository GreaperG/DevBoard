<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Project $project)
    {
      $task = $project->tasks()->get();
      return view('tasks.index', compact('project','task'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required',
            'status' => 'required',
            'deadline' => 'required',
        ]);

        $project->tasks()->create($validated);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Task created successfully.');

    }
    public function edit(Project $project,Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }
}
