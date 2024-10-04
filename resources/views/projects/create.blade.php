@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 40px;">
    <!-- Title -->
    <h1 class="text-center fw-bold mb-5 text-uppercase" 
        style="color: #e9ecef; letter-spacing: 1px;">
        <i class="fas fa-folder-plus me-2"></i> Buat Agenda Baru
    </h1>
    
    <!-- Form -->
    <form action="{{ route('projects.store') }}" method="POST" class="p-5 shadow-lg rounded-3"
          style="background-color: #242424; border: none; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);">
        @csrf

        <!-- Project Name -->
        <div class="form-group mb-4">
            <label for="name" class="fw-semibold" style="color: #e9ecef;">Nama Agenda</label>
            <input type="text" name="name" id="name" class="form-control" 
                   placeholder="Masukkan nama proyek" required 
                   style="border: 2px solid #444; border-radius: 8px; padding: 12px; background-color: #1C1C1C; color: #e9ecef;">
        </div>

        <!-- Project Description -->
        <div class="form-group mb-5">
            <label for="description" class="fw-semibold" style="color: #e9ecef;">Deskripsi Agenda</label>
            <textarea name="description" id="description" class="form-control" rows="4" 
                      placeholder="Masukkan deskripsi proyek"
                      style="border: 2px solid #444; border-radius: 8px; padding: 12px; background-color: #1C1C1C; color: #e9ecef;"></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-gradient text-white fw-bold w-100 py-2" 
                style="border-radius: 8px; border: none; transition: transform 0.3s ease;">
            <i class="fas fa-check-circle me-2"></i> Buat Agenda
        </button>
    </form>
</div>

<!-- Add a subtle background pattern -->
<style>
    body {
        background: linear-gradient(135deg, #1C1C1C, #181818);
        background-attachment: fixed;
        background-size: cover;
    }

    /* Gradient for the submit button */
    .btn-gradient {
        background-image: linear-gradient(135deg, #1f222b, #2d3148);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: background-image 0.3s ease;
    }

    .btn-gradient:hover {
        transform: scale(1.05);
        background-image: linear-gradient(135deg, #2d3148, #1f222b);
    }

    .form-control:focus {
        border-color: #7184F0;
        box-shadow: 0 0 8px rgba(113, 132, 240, 0.5);
    }

    button:focus {
        outline: none;
        box-shadow: 0 0 12px rgba(47, 49, 62, 0.7);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .container {
            max-width: 100%;
            padding: 0 15px;
        }

        .btn-gradient {
            padding: 10px 0;
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .btn-gradient {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
