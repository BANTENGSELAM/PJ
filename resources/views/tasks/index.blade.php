@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Judul Daftar Tugas -->
    <h1 class="fw-bold mb-4 text-light text-center">{{ $project->name }} - Daftar Tugas</h1>

    <!-- Tombol Buat Tugas Baru -->
    <a href="{{ route('tasks.create', $project->id) }}" class="btn text-white fw-semibold mb-4 w-100 w-sm-auto" 
       style="background-color: #1b1f2c; border-radius: 8px; transition: background-color 0.3s;">
        Buat Tugas Baru
    </a>

    <!-- Tabel Daftar Tugas -->
    <div class="table-responsive">
        <table class="table table-hover table-dark shadow-sm rounded">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Tugas</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $index => $task)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="text-decoration-none" style="color: #f39c12;">{{ $task->title }}</a>
                        </td>
                        <td class="text-center">
                            <!-- Tombol Ubah -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm me-2" 
                               style="border-radius: 8px; transition: background-color 0.3s;">
                                Ubah
                            </a>

                            <!-- Form Hapus -->
                            <form action="{{ route('tasks.destroy', $task->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit" 
                                        style="border-radius: 8px; transition: background-color 0.3s;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tombol Kembali Ke Proyek -->
    <div class="mt-4 text-center">
        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary w-100 w-sm-auto" 
           style="border-radius: 8px; background-color: #7f8c8d; color: white; transition: background-color 0.3s;">
           Kembali Ke Proyek
        </a>
    </div>
</div>

<!-- Background Styling -->
<style>
    body {
        background: linear-gradient(135deg, #1C1C1C, #181818);
        background-attachment: fixed;
        background-size: cover;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table-hover tbody tr:hover {
        background-color: #2d2d2d; /* Mengubah warna latar belakang saat hover */
    }

    .btn {
        transition: background-color 0.3s;
    }

    .btn:hover {
        opacity: 0.8;
    }
</style>
@endsection
