<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'title', 'description', 'assigned_to','user_id'];

    // Relasi ke Project (satu task dimiliki oleh satu project)
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relasi ke User (satu task bisa ditugaskan ke satu user)
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // Relasi ke SubTask (satu task bisa memiliki banyak sub-task)
    public function subTasks()
    {
        return $this->hasMany(SubTask::class);
    }
}
