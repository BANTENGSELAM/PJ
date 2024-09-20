@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Judul -->
    <h1 class="fw-bold mb-4">Daftar Tugas</h1>

    <!-- Tombol Buat Tugas Baru -->
    <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-primary mb-4" style="border-radius: 8px;">Buat Tugas Baru</a>

    <!-- Daftar Tugas -->
    <ul class="list-group shadow-sm">
        @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center mb-2 shadow-sm" style="border-radius: 8px;">
                <div class="fw-semibold">
                    <a href="{{ route('tasks.show', $task->id) }}" class="text-decoration-none" style="font-size: 1.1rem;">{{ $task->title }}</a>
                </div>
                
                <div>
                    <!-- Tombol Ubah -->
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm me-2" style="border-radius: 8px;">Ubah</a>

                    <!-- Form Hapus -->
                    <form action="{{ route('tasks.destroy', $task->id)}}" method="POST" style="display:inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit" style="border-radius: 8px;">Hapus</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Tombol Kembali Ke Proyek -->
    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary mt-4" style="border-radius: 8px;">Kembali Ke Proyek</a>
</div>
@endsection
