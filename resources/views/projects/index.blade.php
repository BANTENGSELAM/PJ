@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Title -->
    <h1 class="fw-bold mb-4 text-uppercase" style="color: #071952;">Proyek</h1>

    <!-- Button to Create New Project -->
    <a href="{{ route('projects.create') }}" class="btn text-white fw-semibold mb-4 px-4 py-2" style="background-color: #071952; border-radius: 5px;">
        Buat Proyek Baru
    </a>

    <!-- Project List -->
    <div class="list-group">
        @foreach($projects as $project)
            <a href="{{ route('projects.show', $project->id) }}" 
               class="list-group-item list-group-item-action fw-semibold border-0 mb-3 shadow-sm" 
               style="background-color: #e9ecef; border-radius: 10px; transition: background-color 0.3s ease;">
               
               <!-- Project Title -->
                <h5 class="mb-1" style="color: #071952;">{{ $project->name }}</h5>
                
                <!-- Project Description -->
                <small class="text-muted">{{ $project->description }}</small>
            </a>
        @endforeach
    </div>
</div>
@endsection
