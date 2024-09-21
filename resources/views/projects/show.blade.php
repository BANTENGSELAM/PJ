@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Judul Proyek -->
    <h1 class="fw-bold mb-3 text-uppercase" style="color: #ffffff; background: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85)); padding: 15px; border-radius: 8px;">
        {{ $project->name }}
    </h1>
    <p class="text-muted" style="color: #e9ecef;">{{ $project->description }}</p>
    
    <!-- Tombol Buat Tugas Baru -->
    <a href="{{ route('tasks.create', $project->id) }}" class="btn text-white mb-4 px-4 py-2" 
       style="border-radius: 8px; background-color: #071952;">
        Buat Bidang Tugas Baru
    </a>
    
    <div class="mt-3">
        <h2 class="fw-semibold" style="color: #ffffff; background: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85)); padding: 10px; border-radius: 5px;">
            Bidang Tugas
        </h2>

        @if($project->tasks->isEmpty())
            <p class="text-muted fst-italic" style="color: #e9ecef;">Belum Ada Bidang Tugas</p>
        @else
            <!-- Layout Card untuk Bidang Tugas -->
            <div class="row g-4">
                @foreach($project->tasks as $task)
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0" 
                             style="border-radius: 12px; background: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85)); color: white;">
                            <!-- Gambar Tugas -->
                            <img src="{{ $task->image }}" class="card-img-top object-fit-cover rounded-top" alt="Task Image" style="height: 10rem; border-radius: 12px 12px 0 0;">
                            <div class="card-body">
                                <!-- Judul Tugas -->
                                <h5 class="card-title fw-bold" style="color: #ffffff;">{{ $task->title }}</h5>
                                <p class="card-text text-muted" style="color: #f1f1f1;"><i>{{ $task->description }}</i></p>

                                <!-- Tombol Aksi -->
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn text-white me-2" 
                                   style="border-radius: 8px; background-color: #071952;">
                                    Lihat Bidang
                                </a>
                                
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-white" type="submit" style="border-radius: 8px; background-color: #c0392b;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Tombol Kembali ke Proyek -->
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-4 px-4 py-2" 
           style="border-radius: 8px; background-color: #071952; color: white;">
           Kembali Ke Proyek
        </a>
    </div>
</div>
@endsection
