@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 700px;">
    <!-- Judul Halaman -->
    <h1 class="text-center fw-bold mb-4" style="color: #e9ecef;">Ubah Bidang Tugas</h1>

    <!-- Form Ubah Tugas -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="shadow-sm p-4" style="background-color: #2d2d2d; border-radius: 10px; color: white;">
        @csrf
        @method('PUT')

        <!-- Input Judul -->
        <div class="form-group mb-3">
            <label for="title" class="fw-semibold" style="color: #e9ecef;">Judul</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required style="border: 1px solid #ced4da; border-radius: 5px; background-color: #343a40; color: white;">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Deskripsi -->
        <div class="form-group mb-3">
            <label for="description" class="fw-semibold" style="color: #e9ecef;">Deskripsi</label>
            <textarea id="description" name="description" class="form-control" rows="4" style="border: 1px solid #ced4da; border-radius: 5px; background-color: #343a40; color: white;">{{ old('description', $task->description) }}</textarea>
        </div>

        <!-- Tombol Submit -->
        <div class="d-grid mb-3">
            <button type="submit" class="btn text-white fw-semibold" style="background-color: #252b3e; border-radius: 8px; padding: 10px 0;">Perbarui Bidang Tugas</button>
        </div>
    </form>

    <!-- Tombol Kembali -->
    <a href="{{route('tasks.show', $task->id)}}" class="btn btn-secondary mt-3 d-block text-center" style="border-radius: 8px; background-color: #7f8c8d; color: white; padding: 10px 0;">Kembali Ke Sub Tugas</a>
</div>

<!-- Background Styling -->
<style>
    body {
        background: linear-gradient(135deg, #1C1C1C, #181818);
        background-attachment: fixed;
        background-size: cover;
    }

    .btn {
        transition: background-color 0.3s;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .form-control {
        transition: background-color 0.3s, border-color 0.3s;
    }

    .form-control:focus {
        background-color: #495057;
        border-color: #ced4da;
    }
</style>
@endsection
