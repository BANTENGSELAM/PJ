@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px;">
    <!-- Title -->
    <h1 class="text-center fw-bold mb-4 text-uppercase" style="color: #071952;">Buat Proyek Baru</h1>
    
    <!-- Form -->
    <form action="{{ route('projects.store') }}" method="POST" class="p-4 shadow-sm" 
          style="background-color: #e9ecef; border-radius: 10px; border: 1px solid #ced4da;">
        @csrf

        <!-- Project Name -->
        <div class="form-group mb-3">
            <label for="name" class="fw-semibold" style="color: #071952;">Nama Proyek</label>
            <input type="text" name="name" id="name" class="form-control" 
                   placeholder="Masukkan nama proyek" required 
                   style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;">
        </div>

        <!-- Project Description -->
        <div class="form-group mb-4">
            <label for="description" class="fw-semibold" style="color: #071952;">Deskripsi Proyek</label>
            <textarea name="description" id="description" class="form-control" rows="4" 
                      placeholder="Masukkan deskripsi proyek" 
                      style="border: 1px solid #ced4da; border-radius: 5px; padding: 10px;"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn text-white fw-semibold" 
                    style="background: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85)); border-radius: 5px; padding: 10px 0;">
                Buat Proyek
            </button>
        </div>
    </form>
</div>
@endsection
