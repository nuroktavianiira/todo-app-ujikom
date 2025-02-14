@extends('layouts.app')
{{-- Kode ini menunjukkan bahwa halaman ini menggunakan template utama layouts.app. Dengan menggunakan @extends, halaman ini akan mewarisi struktur dari template utama. --}}
@section('content')
    {{-- Semua konten halaman ditulis di dalam @section('content'), yang berarti konten ini akan dimasukkan ke dalam bagian @yield('content') pada template layouts.app. --}}
    <style>
        /* Background Styling dengan Efek Paralaks*/
        #content {
            background: url('{{ asset('images/download.jpg') }}') center/cover fixed no-repeat;
            /* Menetapkan gambar latar belakang dengan posisi di tengah (center), ukuran yang menyesuaikan (cover), efek paralaks (fixed agar latar belakang tidak bergerak saat menggulir), dan tidak berulang (no-repeat).*/
            color: black;
            /*  Mengatur teks tombol menjadi warna putih agar kontras dengan latar belakang gradient.*/
            min-height: 100vh;
        }

        /* Efek Glassmorphism pada Card  */
        .card {
            background: rgba(255, 255, 255, 0.15);
            /* Tingkatkan opasitas */
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* transition: transform 0.3s ease-in-out; Menambahkan efek transisi halus saat tombol mengalami perubahan (misalnya saat di-hover)*/
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* ====== Tombol dengan Bootstrap Gradient & Hover ====== */
        .btn-gradient {
            color: white;
            /*  Mengatur teks tombol menjadi warna putih agar kontras dengan latar belakang gradient.*/
            font-weight: bold;
            /* Membuat teks di dalam tombol menjadi lebih tebal.*/

        }

        .btn-gradient:hover {
            transform: scale(1.1);
            background: linear-gradient
                /*Gradient: Warna tombol berubah menjadi gradasi.*/
                (135deg, #ff758c, #ff7eb3);
        }

        /* ====== Badge Bootstrap dengan Animasi ====== */
        .badge-animated

        /*Efek bouncing: Badge akan bergerak naik-turun secara berulang.*/
            {
            animation: bounce 1s infinite alternate;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-3px);
            }
        }
    </style>

    <div id="content" class=" min-vh-100 d-flex flex-column align-items-center py-4">
        <div class="d-flex justify-content-center mt-3 w-50">
        </div>

        <h1 class="text-warning fw-bold">welcome</h1>
        @if ($lists->count() == 0)
            <!--memeriksa setiap daftar tugas-->
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p> <!-- pesan jika tidak ada tugas-->
                <button type="button" class="btn btn-outline-primary btn-lg rounded-pill shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#addListModal">
                    <i class="bi bi-plus-square fs-3"></i> Tambah <!-- tombol untuk menambahkan tugas-->
                </button>
            </div>
        @endif
        <div class="d-flex flex-wrap gap-4 px-3 mt-3">
            @foreach ($lists as $list)
                <!-- mengitegrasi setiap daftar tugas -->
                <div class="card shadow-lg border-0 rounded-lg" style="width: 20rem; max-height: 75vh">
                    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0">{{ $list->name }}</h5> <!-- menampilkan nama daftar-->
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" class="d-iline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm text-white"
                                onclick="return confirm('Hapus daftar ini?')">
                                <i class="bi bi-trash fs-5 text-white"></i> <!-- tombol untuk menghapus tugas-->
                            </button>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        @foreach ($tasks as $task)
                            <!-- mengitegrasi setiap tugas dalam daftar-->
                            @if ($task->list_id == $list->id)
                                <!-- memeriksa apakah tugas termasuk dalam daftar ini-->
                                <div class="card task">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <a href="{{ route('tasks.show', $task->id) }}"
                                                    class="fw-bold text-dark lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                    {{ $task->name }} <!-- menampilkan nama tugas-->
                                                </a>
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content">
                                                    {{ $task->priority }} <!-- menampilkan prioritas tugas-->
                                                </span>
                                            </div>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                    <!-- tombol untuk menghapus tugas-->
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-truncate">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    @if (!$task->is_completed)
                                        <div class="card-footer">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check fs-5"></i>
                                                        Selesai
                                                    </span>
                                                </button>
                                            </form>

                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        <button type="button" class="btn btn-sm btn-primary " data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                Tambah
                            </span>
                        </button>
                    </div>
                    <div class="card-footer d-flex justify-content-between text-start">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach
            <button type="button"
                class="btn btn-outline-primary p-3 rounded-circle shadow-lg d-flex align-items-center justify-content-center"
                data-bs-toggle="modal" data-bs-target="#addListModal" style="width: 60px; height: 60px;">
                <i class="bi bi-plus-lg fs-3"></i>
            </button>
        </div>
    </div>
@endsection
