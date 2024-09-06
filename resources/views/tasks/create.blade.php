@extends('layouts.app')

@section('content')
<div class="container">
    <h1>BUAT TUGAS BARU</h1>
    
    <form action="{{ route('tasks.store', $project->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">JUDUL TUGAS</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="description">DESKRIPSI</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="assigned_to">MENUGASKAN KEPADA</label>
            <select name="assigned_to" id="assigned_to" class="form-control">
                <option value="">PILIH PENGGUNA</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">BUAT</button>
    </form>
</div>
@endsection
