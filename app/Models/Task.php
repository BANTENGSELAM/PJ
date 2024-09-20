<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];
    
       
    

    protected $fillable = ['project_id', 'title', 'description', 'assigned_to','user_id', 'image'];

    // Relasi ke Project (satu task dimiliki oleh satu project)
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relasi ke User (satu task bisa ditugaskan ke satu user)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
        return $this->belongsTo(User::class);
    }

    // Relasi ke SubTask (satu task bisa memiliki banyak sub-task)
    public function subTasks()
    {
        return $this->hasMany(SubTask::class);
    }
}
