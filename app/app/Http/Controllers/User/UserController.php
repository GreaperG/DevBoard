<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request,User $user)
    {
        $projectId = $request->input('project_id');
        $search = $request->input('search');
        $results = User::where('name', 'LIKE', "%{$search}%")->whereDoesntHave('projects', function($query) use ($projectId){
            $query->where('project_id', $projectId);
        })->get();
        return response()->json([
            'results' => $results,
        ]);
    }

}
