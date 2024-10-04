@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 600px;">
    <!-- Judul Form -->
    <h1 class="text-center fw-bold mb-4 text-uppercase" 
        style="color: #ffffff; background: linear-gradient(135deg, rgba(41, 48, 67, 0.85), rgba(6, 7, 13, 0.85)); 
               padding: 15px; border-radius: 8px;">
        Bidang Tugas Baru
    </h1>
    
    <!-- Form -->
    <form action="{{ route('tasks.store', $project->id) }}" enctype="multipart/form-data" method="POST" 
          class="p-4 shadow-sm" style="background: linear-gradient(135deg, rgba(41, 48, 67, 0.85), rgba(6, 7, 13, 0.85)); 
                                        border-radius: 10px; color: white;">
        @csrf

        <!-- Judul Tugas -->
        <div class="form-group mb-3">
            <label for="title" class="fw-semibold" style="color: #e9ecef;">Judul Tugas</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul tugas" required 
                   style="border: 1px solid #ced4da; border-radius: 5px; background-color: #2d2d2d; color: white;">
        </div>

        <!-- Dokumentasi Proyek -->
        <div class="form-group mb-3">
            <label for="image" class="fw-semibold" style="color: #e9ecef;">Dokumentasi Proyek</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="form-control" required 
                   style="border: 1px solid #ced4da; border-radius: 5px; background-color: #2d2d2d; color: white;">
        </div>

        <!-- Deskripsi Tugas -->
        <div class="form-group mb-3">
            <label for="description" class="fw-semibold" style="color: #e9ecef;">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Masukkan deskripsi tugas" 
                      style="border: 1px solid #ced4da; border-radius: 5px; background-color: #2d2d2d; color: white;"></textarea>
        </div>

        <!-- Pembuat Tugas -->
        <div class="form-group mb-4">
            <label for="assigned_to" class="fw-semibold" style="color: #e9ecef;">Pembuat Tugas</label>
            <select name="assigned_to" id="assigned_to" class="form-control" 
                    style="border: 1px solid #ced4da; border-radius: 5px; background-color: #2d2d2d; color: white;">
                <option value="">Pilih Pengguna</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Submit -->
        <div class="d-grid">
            <button type="submit" class="btn text-white fw-semibold" 
                    style="background: linear-gradient(135deg, rgba(41, 48, 67, 0.85), rgba(6, 7, 13, 0.85)); border-radius: 5px; padding: 10px 0;">
                Buat Bidang Tugas
            </button>
        </div>
    </form>
</div>

<!-- Background Styling -->
<style>
    body {
        background: linear-gradient(135deg, #1C1C1C, #181818);
        background-attachment: fixed;
        background-size: cover;
    }

    .form-control {
        transition: border 0.3s ease;
    }

    .form-control:focus {
        border: 1px solid #3a3f47;
        box-shadow: 0 0 5px rgba(58, 63, 71, 0.5);
        background-color: #2d2d2d;
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 1.8rem;
        }

        .btn {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
