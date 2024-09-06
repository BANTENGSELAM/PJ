@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sub-Task Detail</h1>
    <p>Title: {{ $subTask->title }}</p>
    <p>Completed: {{ $subTask->completed ? 'Yes' : 'No' }}</p>

    {{-- <a href="{{ route('subtasks.edit', $subTask->id) }}" class="btn btn-warning mt-3">Edit Sub-Task</a>
    <a href="{{ route('tasks.show', $subTask->task_id) }}" class="btn btn-secondary mt-3">Back to Task</a> --}}
</div>
@endsection
