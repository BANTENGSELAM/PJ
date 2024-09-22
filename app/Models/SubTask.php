<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;

    // Tentukan field yang bisa diisi (fillable)
    protected $fillable = ['title', 'task_id', 'completed'];

    // Casting untuk memastikan kolom 'completed' diperlakukan sebagai boolean
    protected $casts = [
        'completed' => 'boolean',
    ];

    // Relasi ke Task (satu sub-task dimiliki oleh satu task)
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    // Accessor untuk memeriksa apakah dokumentasi sudah ada, maka otomatis completed = true
    public function getIsCompletedAttribute()
    {
        return $this->completed || !is_null($this->documentation);
    }
}
