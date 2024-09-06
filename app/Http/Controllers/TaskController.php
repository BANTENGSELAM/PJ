<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, Project $project)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'assigned_to' => 'nullable|exists:users,id',
    ]);

    $project->tasks()->create($request->all());

    return redirect()->route('tasks.show', $project->id)->with('success', 'Task created successfully');

    
}

    public function Index()  {
        return view('tasks.index');
    }

    public function create(Project $project)
    {
        $users = User::all(); // Mendapatkan semua pengguna untuk penugasan tugas
        return view('tasks.create', compact('project', 'users'));
    }

    public function show(Task $task)
    {
        $task->load('subTasks'); // Memuat relasi subTasks
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->only('title', 'description'));

        return redirect()->route('tasks.show', $task->id)->with('success', 'Task updated successfully.');
    }
}
