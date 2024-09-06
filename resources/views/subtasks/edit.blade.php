@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Sub-Task</h1>
    <form action="{{ route('subtasks.update', $subTask->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $subTask->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Sub-Task</button>
    </form>
    <a href="{{ route('tasks.show', $subTask->task_id) }}" class="btn btn-secondary mt-3">Back to Task</a>
</div>
@endsection
