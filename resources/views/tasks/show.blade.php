@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Kolom untuk title, image, deskripsi, dan tombol -->
        <div class="col-md-6">
            <h1 class="fw-bold mb-4" style="color: #071952;">{{ $task->title }}</h1>
            <img src="{{ $task->image }}" alt="foto" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;" class="mb-3 shadow-sm">
            <p class="text-muted mb-4" style="font-size: 1.1rem;">Deskripsi: {{ $task->description }}</p>

            <!-- Tombol -->
            <div class="mt-3 d-flex">
                <a href="{{ route('subtasks.create', $task->id) }}" class="btn text-white me-2" style="background-color: #071952; border-radius: 8px;">Tambah Sub-Tugas Baru</a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn text-white me-2" style="background-color: #f39c12; border-radius: 8px;">Ubah Tugas</a>
                <a href="{{ route('tasks.index', ['project' => $task->project_id]) }}" class="btn text-white" style="background-color: #7f8c8d; border-radius: 8px;">Daftar Tugas</a>
            </div>
        </div>

        <!-- Kolom untuk progress bar dan sub-tugas -->
        <div class="col-md-6">
            <!-- Progress bar -->
            <div class="w-100 mb-3">
                <h5 class="fw-bold" style="color: #071952;">Progres Pekerjaan</h5>
                <div class="progress" role="progressbar" aria-label="Progress" aria-valuemin="0" aria-valuemax="100" style="height: 1.5rem; border-radius: 10px;">
                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" 
                         style="width: 0%; background-color: #071952; transition: width 0.4s ease-in-out;">
                    </div>
                </div>
            </div>

            <!-- Sub-Tugas -->
            <div>
                <h5 class="fw-bold" style="color: #071952;">Sub-Tugas</h5>
                <ul class="list-group shadow-sm" id="subTaskContainer" style="max-height: 400px; overflow-y: auto; border-radius: 10px;">
                    @forelse ($task->subTasks as $subTask)
                        <li class="list-group-item d-flex justify-content-between align-items-center position-relative">
                            <div class="form-check">
                                <form action="{{ route('subtasks.update', ['task' => $task->id, 'subTask' => $subTask->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                    <!-- Checkbox -->
                                    <input type="checkbox" name="completed" class="form-check-input me-2" 
                                        {{ $subTask->completed || $subTask->documentation ? 'checked' : '' }} 
                                        onchange="this.form.submit(); updateProgress();">
                                    <label class="form-check-label" style="font-size: 1.05rem;">{{ $subTask->title }}</label>

                                    <!-- Input untuk Dokumentasi -->
                                    <input type="file" name="documentation" class="form-control mt-2" onchange="this.form.submit();" accept="image/*">
                                </form>

                                <!-- Tampilkan link untuk melihat dokumentasi jika sudah ada -->
                                @if($subTask->documentation)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $subTask->documentation) }}" target="_blank" class="btn btn-link p-0" style="text-decoration: underline;">Lihat Dokumentasi</a>
                                    </div>
                                @endif
                            </div>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('subtasks.destroy', $subTask->id) }}" method="POST" class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" style="border-radius: 6px;">Hapus</button>
                            </form>
                        </li>
                    @empty
                        <li class="list-group-item text-center">Tidak Ada Sub-Tugas yang Tersedia.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function updateProgress() {
        const checkboxes = document.querySelectorAll('.form-check-input');
        const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
        const progressPercentage = (checkedCount / checkboxes.length) * 100;

        const progressBar = document.getElementById('progressBar');
        progressBar.style.width = progressPercentage + '%';
        progressBar.setAttribute('aria-valuenow', progressPercentage);
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateProgress();
    });
</script>
@endsection
