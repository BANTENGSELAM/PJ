@extends('layouts.app')

@section('content')
<div class="container mt-5 p-5" style="background-color: rgba(36, 36, 36, 0.85); border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);">
    <!-- Hero Section -->
    <div class="text-center text-white">
        <h1 class="fw-bold mb-3" style="background: linear-gradient(135deg, #ffffff, #cccccc); -webkit-background-clip: text; color: transparent;">
            Selamat Datang di Project Manager
        </h1>
        <p class="lead" style="opacity: 0.85;">
            Kelola proyek Anda secara efisien dan mudah.
        </p>
        <a href="{{ route('projects.create') }}" class="btn btn-lg text-white fw-semibold px-5 py-3 mt-4 shadow-sm btn-animate" style="background: linear-gradient(135deg, #282828, #3d3d3d); border-radius: 50px; border: 1px solid #666;">
            <i class="fas fa-plus-circle me-2"></i> Ayo Mulai
        </a>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="container mt-5 text-center text-white">
    <h2 class="fw-bold mb-4 pt-4 text-uppercase">Kenapa Memilih Kami</h2>
    <p class="lead" style="opacity: 0.85; max-width: 600px; margin: auto;">
        Program yang memudahkan Anda dalam mengelola kegiatan, agenda, dan proyek Anda dengan lebih efisien.
    </p>
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white p-4 h-100 shadow-lg hover-effect" style="border-radius: 20px; border: none;">
                <i class="fas fa-chart-line fa-3x mb-3" style="color: #4CAF50;"></i>
                <h4 class="fw-bold">Pemantauan</h4>
                <p>Pantau kemajuan kegiatan, agenda, dan proyek Anda dengan mudah.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white p-4 h-100 shadow-lg hover-effect" style="border-radius: 20px; border: none;">
                <i class="fas fa-users fa-3x mb-3" style="color: #2196F3;"></i>
                <h4 class="fw-bold">Kemudahan Fitur</h4>
                <p>Fitur yang mudah dipahami dan digunakan, membantu Anda fokus pada pekerjaan.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white p-4 h-100 shadow-lg hover-effect" style="border-radius: 20px; border: none;">
                <i class="fas fa-file-invoice-dollar fa-3x mb-3" style="color: #FF9800;"></i>
                <h4 class="fw-bold">Efisiensi Waktu</h4>
                <p>Hemat waktu dengan fitur manajemen yang terstruktur dan intuitif.</p>
            </div>
        </div>
    </div>
</div>

<!-- Project List Section -->
<div class="container mt-5 p-5" style="background-color: rgba(36, 36, 36, 0.85); border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);">
    <h2 class="text-center text-white mb-4">List Anda</h2>
    <div class="row g-4">
        @foreach($projects as $project)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 hover-effect" style="border-radius: 15px; background: #2b2b2b; color: white; transition: transform 0.4s ease, box-shadow 0.4s ease;">
                    
                    <div class="card-body d-flex flex-column p-4" style="background-color: rgba(43, 43, 43, 0.9); backdrop-filter: blur(6px); transition: background-color 0.3s;">
                        <h5 class="card-title fw-bold mb-3 d-flex align-items-center">
                            <i class="fas fa-folder-open me-2"></i>{{ $project->name }}
                            <div class="line ms-auto" style="height: 1px; background-color: #666;"></div>
                        </h5>
                        <p class="card-text mb-4" style="font-size: 0.95rem; opacity: 0.9;">
                            {{ $project->description }}
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-light btn-sm" style="border-radius: 12px; border: 1px solid #555;">
                                <i class="fas fa-eye me-1"></i> Lihat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Additional Background Styling -->
<style>
    body {
        background: url('/path/to/your/image.jpg') no-repeat center center fixed;
        background-size: cover;
        backdrop-filter: blur(5px);
    }

    .container {
        background-color: rgba(36, 36, 36, 0.85);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        border-radius: 20px;
    }

    .card {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .hover-effect:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        transition: background-color 0.3s ease;
    }

    .card-body:hover {
        background-color: rgba(43, 43, 43, 0.95);
    }

    .line {
        background-color: #666;
    }

    /* Animation for button */
    .btn-animate {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .btn-animate:hover {
        transform: scale(1.05);
    }

    .btn-animate::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300%;
        height: 300%;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: transform 0.6s ease;
        z-index: 0;
    }

    .btn-animate:hover::after {
        transform: translate(-50%, -50%) scale(1);
    }

    .btn-animate span {
        position: relative;
        z-index: 1;
    }

    /* Media Queries for smoother responsiveness */
    @media (max-width: 767px) {
        h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        .lead {
            font-size: 1rem;
        }

        .card-title {
            font-size: 1.1rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        h1 {
            font-size: 2.5rem;
        }

        h2 {
            font-size: 2rem;
        }

        .lead {
            font-size: 1.1rem;
        }

        .card-title {
            font-size: 1.2rem;
        }
    }

    /* Animation for cards */
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    }
</style>

@endsection
