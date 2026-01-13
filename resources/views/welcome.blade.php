@extends('layouts.app')

@section('content')
<div class="row align-items-center">
  <div class="col-md-6">
    <h1 class="fw-bold">Sistem Antrian Klinik Sejahtera</h1>
    <p class="text-muted">
      Daftar antrian klinik dengan mudah, cepat, dan tertib tanpa harus
      menunggu lama di lokasi.
    </p>

    @guest
    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
        Daftar Sekarang
    </a>
    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg ms-2">
        Login
    </a>
    @endguest
  </div>

  <div class="col-md-6 text-center">
    <img src="https://cdn-icons-png.flaticon.com/512/2966/2966327.png"
         width="300" class="img-fluid">
  </div>
</div>

<hr class="my-5">

<div class="row text-center">
  <div class="col-md-4">
    <h5>📅 Pilih Jadwal</h5>
    <p class="text-muted">Pilih dokter dan tanggal kunjungan</p>
  </div>
  <div class="col-md-4">
    <h5>🔢 Nomor Otomatis</h5>
    <p class="text-muted">Nomor antrian dibuat otomatis</p>
  </div>
  <div class="col-md-4">
    <h5>⚡ Cepat & Efisien</h5>
    <p class="text-muted">Kurangi waktu tunggu di klinik</p>
  </div>
</div>
@endsection
