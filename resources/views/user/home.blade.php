@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2 class="mb-3 text-center">
    Selamat Datang 👋 <br>
    <span id="typing-text" class="fw-bold text-primary"></span>
    </h2>
    <p class="text-muted mb-4">
        Silakan buat janji temu atau lihat riwayat antrian Anda.
    </p>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
            📋 Riwayat Antrian
        </a>
        <a href="{{ route('queue.create') }}" class="btn btn-success">
            ➕ Buat Janji Temu
        </a>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const text = "{{ auth()->user()->name }}";
    const target = document.getElementById("typing-text");

    let index = 0;
    let isDeleting = false;

    const typingSpeed = 120;   // kecepatan ngetik
    const deletingSpeed = 80;  // kecepatan hapus
    const pauseAfterType = 1500; // jeda setelah selesai ngetik
    const pauseAfterDelete = 500; // jeda setelah hapus

    function typeLoop() {
        if (!isDeleting) {
            // Ngetik
            target.textContent = text.substring(0, index + 1);
            index++;

            if (index === text.length) {
                setTimeout(() => isDeleting = true, pauseAfterType);
            }
        } else {
            // Hapus
            target.textContent = text.substring(0, index - 1);
            index--;

            if (index === 0) {
                isDeleting = false;
                setTimeout(() => {}, pauseAfterDelete);
            }
        }

        setTimeout(
            typeLoop,
            isDeleting ? deletingSpeed : typingSpeed
        );
    }

    typeLoop();
});
</script>
</div>
@endsection
