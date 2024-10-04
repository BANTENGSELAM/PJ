@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 900px;">
    <!-- Judul Proyek -->
    <h1 class="fw-bold mb-4 text-uppercase text-center" 
        style="color: #e9ecef; background: linear-gradient(135deg, rgba(23, 28, 43, 0.9), rgba(48, 49, 58, 0.85)); 
               padding: 15px; border-radius: 12px; letter-spacing: 1px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        {{ $project->name }}
    </h1>
    
    <p class="text-center mb-5" 
       style="font-size: 1.2rem; color: #f8f9fa; line-height: 1.6; opacity: 0.95; max-width: 750px; margin: 0 auto;">
        {{ $project->description }}
    </p>
    
    <!-- Tombol Buat Tugas Baru -->
    <div class="text-center mb-5">
        <a href="{{ route('tasks.create', $project->id) }}" class="btn text-white px-4 py-2" 
           style="border-radius: 8px; background: linear-gradient(135deg, #3a3f47, #262932); 
                  font-weight: bold; transition: transform 0.3s ease, box-shadow 0.3s ease; 
                  width: 100%; max-width: 300px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);"
           onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.3)';"
           onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='';">
            <i class="fas fa-plus-circle me-2"></i> Buat Bidang Tugas Baru
        </a>
    </div>

    <!-- Bidang Tugas -->
    <div class="mt-3">
        <h2 class="fw-semibold text-center" 
            style="color: #e9ecef; background: linear-gradient(135deg, rgba(23, 28, 43, 0.9), rgba(48, 49, 58, 0.85)); 
                   padding: 10px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            Bidang Tugas
        </h2>

        @if($project->tasks->isEmpty())
            <p class="text-center text-muted fst-italic mt-4" style="font-size: 1.1rem;">
                Belum Ada Bidang Tugas
            </p>
        @else
            <!-- Layout Card untuk Bidang Tugas -->
            <div class="row g-4 mt-4">
                @foreach($project->tasks as $task)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow border-0 rounded" 
                             style="background: linear-gradient(135deg, rgba(23, 28, 43, 0.9), rgba(48, 49, 58, 0.85)); 
                                    color: white; transition: transform 0.2s ease;">
                            <!-- Gambar Tugas -->
                            <img src="{{ $task->image }}" class="card-img-top object-fit-cover rounded-top" alt="Task Image" 
                                 style="height: 12rem; border-radius: 15px 15px 0 0;">
                            
                            <div class="card-body">
                                <!-- Judul Tugas -->
                                <h5 class="card-title fw-bold text-white">
                                    {{ $task->title }}
                                </h5>
                                
                                <!-- Deskripsi Tugas -->
                                <p class="card-text text-muted" style="color: #f8f9fa; font-size: 1rem; line-height: 1.5;">
                                    {{ $task->description }}
                                </p>

                                <!-- Tombol Aksi -->
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn text-white" 
                                       style="border-radius: 8px; background: linear-gradient(135deg, #3a3f47, #262932); 
                                              transition: transform 0.2s ease; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
                                        <i class="fas fa-eye me-2"></i> Lihat Bidang
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn text-white" type="submit" 
                                                style="border-radius: 8px; background-color: #c0392b;">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Tombol Kembali ke Proyek -->
        <div class="text-center mt-5">
            <a href="{{ route('projects.index') }}" class="btn text-white px-4 py-2" 
               style="border-radius: 8px; background: linear-gradient(135deg, #3a3f47, #262932); 
                      color: white; transition: transform 0.3s ease; width: 100%; max-width: 300px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);"
               onmouseover="this.style.transform='scale(1.05)';"
               onmouseout="this.style.transform='scale(1)';">
               <i class="fas fa-arrow-left me-2"></i> Kembali Ke Agenda
            </a>
        </div>
    </div>
</div>

<!-- Background Styling -->
<style>
    body {
        background: linear-gradient(135deg, #1C1C1C, #181818);
        background-attachment: fixed;
        background-size: cover;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .btn {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 1.8rem;
        }

        .btn {
            font-size: 0.9rem;
        }

        .card-title {
            font-size: 1rem;
        }

        .card-text {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
