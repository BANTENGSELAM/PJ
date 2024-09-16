@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color: aliceblue">PROYEK</h1>
    <a href="{{ route('projects.create') }}" class="btn" style="color: #9EC8B9">BUAT PROYEK BARU</a>
    
    <div class="list-group mt-3">
        @foreach($projects as $project)
            <a href="{{ route('projects.show', $project->id) }}" class="list-group-item list-group-item-action">
                {{ $project->name }}
                <small class="d-block text-muted">{{ $project->description }}</small>
            </a>
        @endforeach
        
    </div>
</div>
@endsection
