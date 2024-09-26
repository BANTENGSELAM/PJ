@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 700px;">
    <!-- Judul Halaman -->
    <h1 class="text-center fw-bold mb-4" style="color: #071952;">Ubah Bidang Tugas</h1>

    <!-- Form Ubah Tugas -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="shadow-sm p-4" style="background-color: #f8f9fa; border-radius: 10px;">
        @csrf
        @method('PUT')

        <!-- Input Judul -->
        <div class="form-group mb-3">
            <label for="title" class="fw-semibold" style="color: #071952;">Judul</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required style="border: 1px solid #ced4da; border-radius: 5px;">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Deskripsi -->
        <div class="form-group mb-3">
            <label for="description" class="fw-semibold" style="color: #071952;">Deskripsi</label>
            <textarea id="description" name="description" class="form-control" rows="4" style="border: 1px solid #ced4da; border-radius: 5px;">{{ old('description', $task->description) }}</textarea>
        </div>

        <!-- Tombol Submit -->
        <div class="d-grid mb-3">
            <button type="submit" class="btn text-white fw-semibold" style="background-color: #071952; border-radius: 8px; padding: 10px 0;">Perbarui Bidang Tugas</button>
        </div>
    </form>

    <!-- Tombol Kembali -->
    <a href="{{route('tasks.show', $task->id)}}" class="btn btn-secondary mt-3 d-block text-center" style="border-radius: 8px; padding: 10px 0;">Kembali Ke Sub Tugas</a>
</div>
@endsection
