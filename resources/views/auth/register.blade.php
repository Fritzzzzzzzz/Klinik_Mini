@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow">
      <div class="card-header bg-success text-white text-center">
        <h4>Registrasi Pasien</h4>
      </div>

      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- ERROR VALIDATION --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                      <ul class="mb-0">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
            @endif

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
