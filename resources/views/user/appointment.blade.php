@extends('layouts.app')

@section('content')
<h3 class="mb-4">Buat Janji Temu</h3>

<div class="card shadow">
    <div class="card-body">
        <form method="POST" action="{{ route('queue.store') }}">
            @csrf

            {{-- FORMPILIH POLI --}}
            <div class="mb-3">
                <label class="form-label">Pilih Poli</label>
                <select id="poliSelect" class="form-select" required>
                    <option value="">-- Pilih Poli --</option>
                    @foreach($polis as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- FORM PILIH DOKTER --}}
            <div class="mb-3">
                <label class="form-label">Pilih Dokter</label>
                <select name="doctor_id" id="doctorSelect" class="form-select" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($polis as $poli)
                        @foreach($poli->doctors as $doctor)
                            <option value="{{ $doctor->id }}" data-poli="{{ $poli->id }}">
                                {{ $doctor->name }}
                                ({{ $doctor->schedule_day }}
                                {{ $doctor->start_time }} - {{ $doctor->end_time }})
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            {{-- FORM TANGGAL JANJI TEMU --}}
            <div class="mb-3">
                <label class="form-label">Tanggal Temu</label>
                <input type="date" name="visit_date" class="form-control"
                       min="{{ now()->toDateString() }}" required>
            </div>

            {{-- FORM KELUHAN --}}
            <div class="mb-3">
                <label class="form-label">Keluhan</label>
                <textarea name="complaint" class="form-control"
                          rows="3"
                          placeholder="Tuliskan keluhan Anda..."></textarea>
            </div>

            <button class="btn btn-primary">
                Buat Janji
            </button>
        </form>
    </div>
</div>

{{-- SCRIPT FILTER --}}
<script>
document.getElementById('poliSelect').addEventListener('change', function () {
    let poliId = this.value;
    let doctorSelect = document.getElementById('doctorSelect');

    Array.from(doctorSelect.options).forEach(option => {
        if (!option.dataset.poli) return;
        option.style.display =
            option.dataset.poli === poliId ? 'block' : 'none';
    });

    doctorSelect.value = '';
});
</script>
@endsection
