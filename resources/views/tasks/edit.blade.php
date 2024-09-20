@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ubah Tugas</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Perbarui Tugas</button>
    </form>
    <a href="{{route('tasks.index', $task->id)}}" class="btn btn-secondary mt-3">Kembali Ke Daftar Tugas</a>
    
</div>
@endsection
