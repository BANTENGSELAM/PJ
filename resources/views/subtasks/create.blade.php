@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 50px;">
    <!-- Title -->
    <h1 class="text-center fw-bold mb-4" style="color: #071952; font-size: 2.2rem;">Buat Sub-Tugas: {{ $task->title }}</h1>

    <!-- Form -->
    <form action="{{ route('subtasks.store', $task->id) }}" method="POST" class="p-4 shadow-lg" style="background: #f8f9fa; border-radius: 10px;">
        @csrf

        <!-- Title Field -->
        <div class="form-group mb-4">
            <label for="title" class="fw-semibold" style="color: #071952; font-size: 1.2rem;">Judul Sub-Tugas</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul sub-tugas" value="{{ old('title') }}" required
                   style="border: 2px solid #071952; border-radius: 8px; padding: 10px;">
            @error('title')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn text-white fw-semibold" 
                    style="background: linear-gradient(135deg, #071952, #0d3b66); border-radius: 10px; padding: 12px; transition: background 0.3s ease;">
                Buat Sub-Tugas
            </button>
        </div>
    </form>

    <!-- Back to Task Button -->
    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-secondary mt-3 d-block text-center" 
       style="border-radius: 10px; padding: 12px; background-color: #6c757d; transition: background 0.3s ease;">
        Kembali Ke Tugas
    </a>
</div>

<!-- Additional CSS for Hover Effects -->
<style>
    .btn:hover {
        background: linear-gradient(135deg, #0d3b66, #071952);
    }

    form input:focus {
        border-color: #0d3b66;
        box-shadow: 0 0 10px rgba(13, 59, 102, 0.2);
    }
</style>
@endsection
