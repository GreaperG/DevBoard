<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $projectsCount = auth()->user()->projects()->count();
        $tasksCount = Task::whereIn('project_id', auth()->user()->projects()->pluck('id'))->count();
        return view('dashboard',compact('projectsCount','tasksCount'));
    }
}
