@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Title -->
    <h1 class="fw-bold mb-4 text-uppercase text-center" style="background: linear-gradient(135deg, #071952, #7184F0); -webkit-background-clip: text; color: transparent;">
        <i class="fas fa-project-diagram"></i> Agenda
    </h1>

    <!-- Button to Create New Project -->
    <div class="text-center mb-4">
        <a href="{{ route('projects.create') }}" 
        class="btn text-white fw-semibold px-4 py-2" 
        style="background: linear-gradient(135deg, #071952, #7184F0); border-radius: 8px;">
            <i class="fas fa-plus-circle me-2"></i> Buat Agenda Baru
        </a>
    </div>

    <!-- Project List -->
    <div class="row g-4">
        @foreach($projects as $project)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg mb-4"
                    style="
                        border-radius: 15px;
                        background: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85)), url('/images/background-pattern.png');
                        background-size: cover;
                        color: white;
                        border: none;
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                        overflow: hidden;
                    " 
                    onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.15)';" 
                    onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='';">
                    
                    <div class="card-body">
                        <!-- Project Title -->
                        <h5 class="card-title fw-bold mb-3">
                            <i class="fas fa-folder-open me-2"></i>{{ $project->name }}
                        </h5>

                        <!-- Project Description -->
                        <p class="card-text mb-3" style="font-size: 0.9rem; opacity: 0.85;">
                            {{ $project->description }}
                        </p>

                        <!-- Link to Project -->
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-eye me-1"></i> Lihat Detail Agenda
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
