@extends('layouts.app-crud')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <h3 class="mb-0">⛔ Akses Ditolak</h3>
            </div>
            <div class="card-body text-center">
                <p class="lead">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
                <p class="text-muted">Hubungi administrator jika Anda merasa ini adalah kesalahan.</p>
                <a href="{{ route('posts.index') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
            </div>
        </div>
    </div>
</div>
@endsection 