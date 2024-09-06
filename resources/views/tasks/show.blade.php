@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $task->title }}</h1>
    <p>Description: {{ $task->description }}</p>

    <h2>Sub-Tasks</h2>
    <ul class="list-group">
        @forelse ($task->subTasks as $subTask)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <form action="{{ route('subtasks.update', ['task' => $task->id, 'subTask' => $subTask->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-check">
                        <input type="checkbox" name="completed" class="form-check-input" 
                            {{ $subTask->completed ? 'checked' : '' }} 
                            onchange="this.form.submit()">
                        <label class="form-check-label">{{ $subTask->title }}</label>
                    </div>
                </form>
            </li>
        @empty
            <li class="list-group-item">No sub-tasks available.</li>
        @endforelse
    </ul>

    <a href="{{ route('subtasks.create', $task->id) }}" class="btn btn-primary mt-3">Add New Sub-Task</a>
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning mt-3">Edit Task</a>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back to Task List</a>
</div>
@endsection
