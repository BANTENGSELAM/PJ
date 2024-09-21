@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Title -->
    <h1 class="fw-bold mb-4 text-uppercase" style="color: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85));">Proyek</h1>

    <!-- Button to Create New Project -->
    <a href="{{ route('projects.create') }}" 
   class="btn text-white fw-semibold mb-4 px-4 py-2 w-100 w-md-auto" 
   style="background: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85)); border-radius: 5px;">
    Buat Proyek Baru
    </a>

    <!-- Project List -->
    <div class="row">
        @foreach($projects as $project)
            <div class="col-md-6">
                <div class="card shadow-lg mb-4" 
                    style="
                        border-radius: 10px;
                        background: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85)), url('/images/background-pattern.png');
                        background-size: cover;
                        color: white;
                        border: none;
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                    " 
                    onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.3)';" 
                    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='';">
                    <div class="card-body">
                        <!-- Project Title -->
                        <h5 class="card-title fw-bold">{{ $project->name }}</h5>

                        <!-- Project Description -->
                        <p class="card-text">{{ $project->description }}</p>

                        <!-- Project Start Date and Number of Tasks -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-secondary" style="font-size: 0.85rem;">
                                Dimulai: {{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}
                            </span>
                            <span class="text-light small">
                                {{ $project->tasks_count }}
                            </span>
                        </div>

                        <!-- Link to Project -->
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-light btn-sm">
                            Lihat Detail Proyek
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
