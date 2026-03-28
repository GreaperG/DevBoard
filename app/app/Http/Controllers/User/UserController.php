<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request,User $user)
    {
        $search = $request->input('search');
        $results = User::where('name', 'LIKE', "%{$search}%")->get();
        return response()->json([
            'results' => $results,
        ]);
    }
}
