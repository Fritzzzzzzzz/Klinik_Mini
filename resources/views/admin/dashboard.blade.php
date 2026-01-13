@extends('layouts.admin')

@section('content')
<h3 class="mb-4">Dashboard Admin</h3>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Total Poli</h5>
                <h2>{{ $totalPoli }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Total Dokter</h5>
                <h2>{{ $totalDoctor }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Antrian Hari Ini</h5>
                <h2>{{ $totalQueueToday }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        Antrian Hari Ini
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Poli</th>
                    <th>No Antrian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($queues as $q)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $q->user->name }}</td>
                    <td>{{ $q->doctor->name }}</td>
                    <td>{{ $q->doctor->poli->name }}</td>
                    <td>{{ $q->queue_number }}</td>
                    <td>
                        <span class="badge 
                            @if($q->status=='WAITING') bg-warning
                            @elseif($q->status=='CALLED') bg-primary
                            @elseif($q->status=='DONE') bg-success
                            @else bg-danger @endif">
                            {{ $q->status }}
                        </span>
                    </td>
                    <td>
                        @if($q->status=='WAITING')
                        <form method="POST" action="/admin/queue/call/{{ $q->doctor_id }}">
                            @csrf
                            <button class="btn btn-sm btn-primary">
                                Panggil
                            </button>
                        </form>
                        @else
                        -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        Belum ada antrian hari ini
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
