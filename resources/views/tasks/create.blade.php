@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 600px;">
    <!-- Judul Form -->
    <h1 class="text-center fw-bold mb-4 text-uppercase" style="color: #ffffff; background: linear-gradient(135deg, rgba(7, 25, 82, 0.85), rgba(113, 132, 240, 0.85)); padding: 15px; border-radius: 8px;">
        Bidang Tugas Baru
    </h1>
    
    <!-- Form -->
    <form action="{{ route('tasks.store', $project->id) }}" enctype="multipart/form-data" method="POST" class="p-4 shadow-sm" style="background-color: #f8f9fa; border-radius: 10px;">
        @csrf

        <!-- Judul Tugas -->
        <div class="form-group mb-3">
            <label for="title" class="fw-semibold" style="color: #071952;">Judul Tugas</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul tugas" required 
                   style="border: 1px solid #ced4da; border-radius: 5px;">
        </div>

        <!-- Dokumentasi Proyek -->
        <div class="form-group mb-3">
            <label for="image" class="fw-semibold" style="color: #071952;">Dokumentasi Proyek</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="form-control" required 
                   style="border: 1px solid #ced4da; border-radius: 5px;">
        </div>

        <!-- Deskripsi Tugas -->
        <div class="form-group mb-3">
            <label for="description" class="fw-semibold" style="color: #071952;">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Masukkan deskripsi tugas" 
                      style="border: 1px solid #ced4da; border-radius: 5px;"></textarea>
        </div>

        <!-- Pembuat Tugas -->
        <div class="form-group mb-4">
            <label for="assigned_to" class="fw-semibold" style="color: #071952;">Pembuat Tugas</label>
            <select name="assigned_to" id="assigned_to" class="form-control" 
                    style="border: 1px solid #ced4da; border-radius: 5px;">
                <option value="">Pilih Pengguna</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Submit -->
        <div class="d-grid">
            <button type="submit" class="btn text-white fw-semibold" 
                    style="background-color: #071952; border-radius: 5px; padding: 10px 0;">
                Buat Bidang Tugas
            </button>
        </div>
    </form>
</div>
@endsection
