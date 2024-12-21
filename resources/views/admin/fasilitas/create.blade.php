@extends('layout.admin')

@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Tambah Fasilitas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('fasility.index') }}">Manajemen Fasilitas</a></li>
          <li class="breadcrumb-item active">Tambah Fasilitas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Formulir Pengguna</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('fasility.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">kategori</label>
              <input type="text" name="category" class="form-control" id="category" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <input type="text" name="description" class="form-control" id="description">
            </div>
            <div class="mb-3">
              <label for="longitude" class="form-label">Longitude</label>
              <input type="text" name="longitude" class="form-control" id="longitude" required>
            </div>
            <div class="mb-3">
              <label for="latitude" class="form-label">latitude</label>
              <input type="text" name="latitude" class="form-control" id="latitude" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </section>
  </main>
@endsection
