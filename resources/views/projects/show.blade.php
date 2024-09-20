@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Judul Proyek -->
    <h1 class="fw-bold mb-3" style="color: #2c3e50;">{{ $project->name }}</h1>
    <p class="text-muted">{{ $project->description }}</p>
    
    <!-- Tombol Buat Tugas Baru -->
    <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-success mb-4 px-4 py-2" style="border-radius: 8px; background-color: #27ae60;">Buat Bidang Tugas Baru</a>
    
    <div class="mt-3">
        <h2 class="fw-semibold" style="color: #2980b9;">Bidang Tugas</h2>

        @if($project->tasks->isEmpty())
            <p class="text-muted fst-italic">Belum Ada Bidang Tugas</p>
        @else
            <!-- Layout Card untuk Bidang Tugas -->
            <div class="row g-4">
                @foreach($project->tasks as $task)
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0" style="border-radius: 12px;">
                            <!-- Gambar Tugas -->
                            <img src="{{ $task->image }}" class="card-img-top object-fit-cover rounded-top" alt="Task Image" style="height: 10rem;">
                            <div class="card-body">
                                <!-- Judul Tugas -->
                                <h5 class="card-title fw-bold" style="color: #2c3e50;">{{ $task->title }}</h5>
                                <p class="card-text text-muted">{{ $task->description }}</p>

                                <!-- Tombol Aksi -->
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary me-2" style="border-radius: 8px;">Lihat Bidang</a>
                                
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" style="border-radius: 8px;">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Tombol Kembali ke Proyek -->
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-4 px-4 py-2" style="border-radius: 8px;">Kembali Ke Proyek</a>
    </div>
</div>
@endsection
