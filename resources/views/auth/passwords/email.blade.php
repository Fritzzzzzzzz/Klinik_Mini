@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Reset Password</h4>

    <form method="POST" action="{{ route('password.check') }}">
        @csrf

        <input type="email" name="email" class="form-control mb-2" placeholder="Email">

        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary">Lanjut</button>
    </form>
</div>
@endsection