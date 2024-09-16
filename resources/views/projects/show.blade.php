@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
    
    <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-primary">Buat Tugas Baru</a>
    
    <div class="mt-3">
        <h2>TUGAS</h2>
        @if($project->tasks->isEmpty())
            <p>Belum Ada Tugas</p>
        @else
            <ul class="list-group">
                @foreach($project->tasks as $task)
                    <li class="list-group-item">
                        <h5>{{ $task->title }}</h5>
                        <p>{{ $task->description }}</p>
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary">Lihat Tugas</a>
                    </li>
                @endforeach
                <br>
            </ul>
        @endif
    </div>
</div>
@endsection
