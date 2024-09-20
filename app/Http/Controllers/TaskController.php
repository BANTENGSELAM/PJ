<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request, Project $project)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'image' => 'required',
        'assigned_to' => 'nullable|exists:users,id',
    ]);

    $imagePath = $this->storeImage($request->file('image'));
    $d = Project::find($project)->first()->tasks()->create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'description' => $request->description,
        'assigned_to' => $request->assigned_to,
        'image' => $imagePath
    ]);

        
        return redirect()->route('tasks.show', $d->id)->with('success', 'Task created successfully');

}

    public function storeImage($file):string{
        $fileName = rand() . $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        return "/uploads/" . $fileName;
    }

    public function Index($project)  {
        $p = Project::find($project);
        return view('tasks.index', compact('p'), ['project' => $p, 'tasks' => $p->tasks()->get()]);
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

    public function destroy ($id){
        $data = Task::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
