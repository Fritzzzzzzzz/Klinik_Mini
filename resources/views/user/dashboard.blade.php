@extends('layouts.app')

@section('content')
<h3 class="mb-4">Riwayat Antrian Saya</h3>

<a href="{{ route('queue.create') }}" class="btn btn-success mb-3">
    + Buat Janji Temu
</a>

<div class="card shadow">
    <div class="card-body table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>No Antrian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($queues as $q)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $q->visit_date }}</td>
                    <td>{{ $q->doctor->poli->name }}</td>
                    <td>{{ $q->doctor->name }}</td>
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
                        <form method="POST" action="{{ route('queue.cancel',$q->id) }}">
                            @csrf
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Batalkan antrian?')">
                                Cancel
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
                        Belum ada riwayat antrian
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
