<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'deadline',
        'priority',
        'project_id',
        'assigned_to'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }

    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
