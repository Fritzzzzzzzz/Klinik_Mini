@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Manajemen Poli</h4>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        {{-- FORM TAMBAH --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tambah Poli</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('poli.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Nama Poli</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <button class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Poli</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Poli</th>
                                <th width="30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($polis as $poli)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <form method="POST" action="{{ route('poli.update', $poli->id) }}" class="d-flex gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" value="{{ $poli->name }}" class="form-control">
                                        <button class="btn btn-warning btn-sm">Update</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('poli.destroy', $poli->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus poli?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($polis->count() == 0)
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        Belum ada data poli
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