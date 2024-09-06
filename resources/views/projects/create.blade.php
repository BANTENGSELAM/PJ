@extends('layouts.app')

@section('content')
<div class="container">
    <h1>BUAT PROYEK BARU</h1>
    
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">NAMA PROYEK</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="description">DESKRIPSI PROYEK</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">BUAT</button>
    </form>
</div>
@endsection
