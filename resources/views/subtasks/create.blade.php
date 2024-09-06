@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Sub-Task for Task: {{ $task->title }}</h1>
    <form action="{{ route('subtasks.store', $task->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Sub-Task</button>
    </form>
    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-secondary mt-3">Back to Task</a>
</div>
@endsection
