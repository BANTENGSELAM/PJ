@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 50px;">
    <!-- Title -->
    <h1 class="text-center fw-bold mb-4" style="color: #e9ecef; font-size: 2.2rem;">Buat Sub-Tugas: {{ $task->title }}</h1>

    <!-- Form -->
    <form action="{{ route('subtasks.store', $task->id) }}" method="POST" class="p-4 shadow-lg" style="background: #2d2d2d; border-radius: 15px; color: white;">
        @csrf

        <!-- Table Layout for Form -->
        <table class="w-100">
            <tr>
                <td>
                    <label for="title" class="fw-semibold" style="color: #e9ecef; font-size: 1.2rem;">Judul Sub-Tugas</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul sub-tugas" value="{{ old('title') }}" required
                           style="border: 2px solid #071952; border-radius: 8px; padding: 10px; background-color: #343a40; color: white; transition: border 0.3s ease;">
                    @error('title')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn text-white fw-semibold" 
                                style="background: linear-gradient(135deg, #191d2b, #0a141c); border-radius: 10px; padding: 12px; transition: background 0.3s ease;">
                            Buat Sub-Tugas
                        </button>
                    </div>
                </td>
            </tr>
        </table>
    </form>

    <!-- Back to Task Button -->
    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-secondary mt-3 d-block text-center" 
       style="border-radius: 10px; padding: 12px; background-color: #7f8c8d; color: white; transition: background 0.3s ease;">
        Kembali Ke Tugas
    </a>
</div>

<!-- Additional CSS for Hover Effects -->
<style>
    body {
        background: linear-gradient(135deg, #1C1C1C, #181818);
        background-attachment: fixed;
        background-size: cover;
    }

    .btn {
        border-radius: 10px;
        padding: 12px;
        transition: background 0.3s ease;
    }

    .btn:hover {
        background: linear-gradient(135deg, #313a41, #1a1f2d);
    }

    form input:focus {
        border-color: #192938;
        box-shadow: 0 0 10px rgba(20, 44, 67, 0.3);
    }

    h1 {
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .shadow-lg {
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
    }
</style>
@endsection
