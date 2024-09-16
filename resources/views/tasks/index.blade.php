@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Task List</h1>
    <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-primary mb-3">Add New Task</a>
    <ul class="list-group">
        @foreach ($tasks as $task)
            
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                <div>
                    {{-- <form action="/removetasks/{{$task->id}}" method="POST"> --}}
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    {{-- @csrf --}}
                    {{-- @method("delete") --}}
                    <a class="btn btn-danger btn-sm" type="button" href="/removetasks/{{ $task->id }}">Delete</a>
                    </form>
                    </div>
            </li>
            @endforeach
        </ul>
    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary mt-3">Back to Project</a>
</div>
@endsection
