<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'task_id', 'completed'];

    protected $casts = [
        'completed' => 'boolean',
    ];
    
    // Relasi ke Task (satu sub-task dimiliki oleh satu task)
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}

