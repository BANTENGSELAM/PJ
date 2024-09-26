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

    public function update(Request $request, $subTask)
    {
        $request->validate([
            // 'title' => 'required|string|max:255',
            'image' => 'required'
        ]);

        $imagePath = $this->storeImage($request->file('image'));

        $d = SubTask::find($subTask);
        $d->update([
            'is_completed' => $request->has('completed'),
            'completed'  => $request->has('completed'),
            // 'title' => $request->input('title'),
            'image' => $imagePath
        ]);

        return redirect()->route('tasks.show', $d->task_id)->with('success', 'Sub-task updated successfully.');
    }


    public function storeImage($file):string{
        $fileName = rand() . $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        return "/uploads/" . $fileName;
    }

    public function edit(SubTask $subTask)
    {
        return view('subtasks.edit', compact('subTask'));
    }

    public function destroy($id)
    {
        $data = SubTask::findOrFail($id);
        $taskid = $data->task_id;
        $data->delete();
        return redirect()->route('tasks.show', $taskid);
    }
}
