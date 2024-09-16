<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\SubTask;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubTaskController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $subTask = new SubTask();
        $subTask->title = $request->input('title');
        $subTask->task_id = $task->id;
        $subTask->save();

        // $task->subTasks()->create($request->only('title'));

        return redirect()->route('tasks.show', $task->id)->with('success', 'Sub-task created successfully.');
    }

    public function create(Task $task)
    {
        return view('subtasks.create', compact('task'));
    }

    use HasFactory;

    protected $fillable = ['title', 'task_id', 'completed'];

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function update(Request $request, SubTask $subTask)
    {
        $subTask->update([
            'completed' => $request->has('completed'),
        ]);
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $subTask->update($request->only('title'));

        return redirect()->route('tasks.show', $subTask->task_id)->with('success', 'Sub-task updated successfully.');
    }

    // Method edit
    public function edit(SubTask $subTask)
    {
        return view('subtasks.edit', compact('subTask'));
    }

    public function destroy ($id){
        $data = SubTask::findOrFail($id);
        $taskid = $data->task_id;
        $data->delete();
        return redirect()->route('tasks.show', $taskid);
    }
}
