@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 40px;">
    <!-- Title -->
    <h1 class="text-center fw-bold mb-5 text-uppercase" 
        style="color: #071952; letter-spacing: 1px;">
        <i class="fas fa-folder-plus me-2"></i> Buat Agenda Baru
    </h1>
    
    <!-- Form -->
    <form action="{{ route('projects.store') }}" method="POST" class="p-5 shadow-lg"
          style="
              background-color: #f8f9fa; 
              border-radius: 15px; 
              border: none;
              box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
          ">
        @csrf

        <!-- Project Name -->
        <div class="form-group mb-4">
            <label for="name" class="fw-semibold" style="color: #071952;">Nama Agenda</label>
            <input type="text" name="name" id="name" class="form-control" 
                   placeholder="Masukkan nama proyek" required 
                   style="border: 2px solid #ced4da; border-radius: 8px; padding: 12px;
                          transition: border-color 0.3s ease, box-shadow 0.3s ease;">
        </div>

        <!-- Project Description -->
        <div class="form-group mb-5">
            <label for="description" class="fw-semibold" style="color: #071952;">Deskripsi Agenda</label>
            <textarea name="description" id="description" class="form-control" rows="4" 
                      placeholder="Masukkan deskripsi proyek"
                      style="border: 2px solid #ced4da; border-radius: 8px; padding: 12px;
                             transition: border-color 0.3s ease, box-shadow 0.3s ease;"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn text-white fw-bold py-2" 
                    style="
                        background: linear-gradient(135deg, rgba(7, 25, 82, 0.9), rgba(113, 132, 240, 0.85)); 
                        border-radius: 8px; 
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                        transition: transform 0.3s ease;
                    "
                    onmouseover="this.style.transform='scale(1.05)';"
                    onmouseout="this.style.transform='scale(1)';">
                <i class="fas fa-check-circle me-2"></i> Buat Agenda
            </button>
        </div>
    </form>
</div>

<!-- Add a subtle background pattern -->
<style>
    body {
        background: linear-gradient(135deg, #e0eafc, #cfdef3);
        background-attachment: fixed;
        background-size: cover;
    }

    .form-control:focus {
        border-color: #7184F0;
        box-shadow: 0 0 8px rgba(113, 132, 240, 0.5);
    }
</style>
@endsection
