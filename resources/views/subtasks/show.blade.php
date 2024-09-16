@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Sub-Tugas</h1>
    <p>Judul: {{ $subTask->title }}</p>
    <p>Completed: {{ $subTask->completed ? 'Yes' : 'No' }}</p>
    
    <a href="{{ route('subtasks.edit', $subTask->id) }}" class="btn btn-warning mt-3">Ubah Sub-Tugas</a>
    <a href="{{ route('tasks.show', $subTask->task_id) }}" class="btn btn-secondary mt-3">Kembali Ke Tugas</a>
</div>
@endsection
