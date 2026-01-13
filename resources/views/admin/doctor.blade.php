@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Manajemen Dokter</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">

        {{-- ================= FORM TAMBAH ================= --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tambah Dokter</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('doctor.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Dokter</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Poli</label>
                            <select name="poli_id" class="form-control" required>
                                <option value="">-- Pilih Poli --</option>
                                @foreach($polis as $poli)
                                    <option value="{{ $poli->id }}">{{ $poli->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Hari Praktik</label>
                            <select name="schedule_day" class="form-control" required>
                                <option value="">-- Pilih Hari --</option>
                                <option>Senin-Sabtu</option>
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumat</option>
                                <option>Sabtu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Jam Mulai</label>
                            <input type="time" name="start_time" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Jam Selesai</label>
                            <input type="time" name="end_time" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- ================= TABLE DATA ================= --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Dokter</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Poli</th>
                                <th>Hari</th>
                                <th>Jam Praktik</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($doctors as $doctor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <form method="POST"
                                          action="{{ route('doctor.update', $doctor->id) }}"
                                          class="d-flex gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text"
                                               name="name"
                                               value="{{ $doctor->name }}"
                                               class="form-control">
                                </td>

                                <td>
                                        <select name="poli_id" class="form-control">
                                            @foreach($polis as $poli)
                                                <option value="{{ $poli->id }}"
                                                    {{ $doctor->poli_id == $poli->id ? 'selected' : '' }}>
                                                    {{ $poli->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                </td>

                                <td>
                                        <select name="schedule_day" class="form-control">
                                            @foreach(['Senin-Sabtu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $day)
                                                <option value="{{ $day }}"
                                                    {{ $doctor->schedule_day == $day ? 'selected' : '' }}>
                                                    {{ $day }}
                                                </option>
                                            @endforeach
                                        </select>
                                </td>

                                <td>
                                        <div class="d-flex gap-1">
                                            <input type="time"
                                                   name="start_time"
                                                   value="{{ $doctor->start_time }}"
                                                   class="form-control">
                                            <span class="align-self-center">-</span>
                                            <input type="time"
                                                   name="end_time"
                                                   value="{{ $doctor->end_time }}"
                                                   class="form-control">
                                        </div>
                                </td>

                                <td class="d-flex gap-2">
                                        <button class="btn btn-warning btn-sm">Update</button>
                                    </form>

                                    <form method="POST"
                                          action="{{ route('doctor.destroy', $doctor->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus dokter?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if($doctors->count() == 0)
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Belum ada data dokter
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection