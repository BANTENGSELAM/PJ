@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Kolom Kiri: Judul dan Deskripsi Tugas -->
        <div class="col-12 col-md-6 mb-4">
            <div class="bg-dark rounded p-4 shadow">
                <h1 class="fw-bold mb-4 text-light" style="color: #e9ecef;">{{ $task->title }}</h1>
                <img src="{{ $task->image }}" alt="Task Image" 
                     class="img-fluid mb-3 shadow rounded" style="height: 200px; object-fit: cover; border: 2px solid #071952;">

                <!-- Deskripsi Tugas -->
                <p class="mb-4 text-light" style="font-size: 1.1rem; line-height: 1.5;">
                    <strong>Deskripsi:</strong> {{ $task->description }}
                </p>

                <!-- Tombol Aksi -->
                <div class="d-flex flex-column flex-sm-row gap-2">
                    <a href="{{ route('subtasks.create', $task->id) }}" class="btn" 
                       style="background-color: #071952; color: white; border-radius: 8px;">
                        Tambah Sub-Tugas Baru
                    </a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn" 
                       style="background-color: #f39c12; color: white; border-radius: 8px;">
                        Ubah Tugas
                    </a>
                    <a href="{{ route('tasks.index', ['project' => $task->project_id]) }}" class="btn" 
                       style="background-color: #7f8c8d; color: white; border-radius: 8px;">
                        Daftar Tugas
                    </a>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Progres dan Sub-Tugas -->
        <div class="col-12 col-md-6 mb-4">
            <div class="bg-dark rounded p-4 shadow">
                <h5 class="fw-bold text-light" style="color: #e9ecef;">Progres Pekerjaan</h5>
                <div class="progress mb-3" role="progressbar" aria-label="Progress" aria-valuemin="0" aria-valuemax="100" 
                     style="height: 1.5rem; border-radius: 10px; background-color: #2d2d2d;">
                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" 
                         style="width: 0%; background-color: #071952; transition: width 0.4s ease-in-out;">
                    </div>
                </div>
                <div id="progressText" class="text-light" style="font-size: 1.2rem;">0%</div>

                <h5 class="fw-bold text-light" style="color: #e9ecef;">Sub-Tugas</h5>
                <ul class="list-group" id="subTaskContainer" 
                    style="max-height: 400px; overflow-y: auto; border-radius: 10px; background-color: #2d2d2d;">
                    @forelse ($task->subTasks as $subTask)
                        <li class="list-group-item d-flex justify-content-between align-items-center position-relative" style="background-color: #343a40; color: white;">
                            <div class="form-check">
                                <form action="{{ route('subtasks.update', ['task' => $task->id, 'subTask' => $subTask->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="checkbox" name="completed" class="form-check-input me-2" 
                                           id="n{{$subTask->id}}" {{ $subTask->is_completed ? 'checked' : '' }} 
                                           onchange="this.form.submit(); updateProgress();">
                                    <label class="form-check-label" style="font-size: 1.05rem;">{{ $subTask->title }}</label>
                                    
                                    <!-- Custom file input -->
                                    <div class="d-flex align-items-center" style="margin-top: 10px;">
                                        <input type="file" name="image" id="image{{$subTask->id}}" 
                                               onchange="document.getElementById('n{{$subTask->id}}').checked = true; this.form.submit(); updateProgress();" 
                                               class="custom-file-input" style="display: none;">
                                        <button type="button" class="btn btn-secondary btn-sm me-2" onclick="document.getElementById('image{{$subTask->id}}').click();">
                                            Pilih File
                                        </button>
                                        <span id="fileName{{$subTask->id}}" class="text-light" style="margin-left: 10px;">Tidak ada file yang dipilih</span>
                                    </div>
                                </form>
                            </div>
                            <form action="{{ route('subtasks.destroy', $subTask->id) }}" method="POST" 
                                  class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
                                @csrf
                                @method('DELETE')
                                @if($subTask->image)
                                    <a href="{{$subTask->image}}" class="btn btn-sm text-light me-2" 
                                       style="background-color: #343a40;"> Gambar</a>
                                @endif
                                <button class="btn btn-danger btn-sm" type="submit" 
                                        style="border-radius: 6px;">Hapus</button>
                            </form>
                        </li>
                    @empty
                        <li class="list-group-item text-center" style="background-color: #343a40; color: white;">Tidak Ada Sub-Tugas yang Tersedia.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Update Progres -->
<script>
    function updateProgress() {
        const checkboxes = document.querySelectorAll('.form-check-input');
        const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
        const progressPercentage = (checkedCount / checkboxes.length) * 100;

        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        
        progressBar.style.width = progressPercentage + '%';
        progressBar.setAttribute('aria-valuenow', progressPercentage);
        progressText.textContent = Math.round(progressPercentage) + '%';
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateProgress();
        
        // Update filename display on file selection
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const fileName = this.files.length > 0 ? this.files[0].name : 'Tidak ada file yang dipilih';
                document.getElementById('fileName' + this.id.replace('image', '')).textContent = fileName;
            });
        });
    });
</script>

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

    .list-group-item {
        transition: background-color 0.3s;
    }

    .list-group-item:hover {
        background-color: #3a3a3a;
    }
</style>
@endsection
