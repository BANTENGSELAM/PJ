@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
    <a href="{{ route('tasks.index', $task->id) }}" class="btn btn-secondary mt-3">Back to Task List</a>
</div>
@endsection
