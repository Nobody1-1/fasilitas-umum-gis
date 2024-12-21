@extends('layout.admin')

@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Fasilitas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('fasility.index') }}">Fasilitas</a></li>
          <li class="breadcrumb-item active">Edit Fasilitas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Formulir Edit Pengguna</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('fasility.update', $fasilitas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $fasilitas->name) }}" required>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">kategori</label>
              <input type="text" name="category" class="form-control" id="category" value="{{ old('category', $fasilitas->category) }}" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">description (Opsional)</label>
              <input type="text" name="description" class="form-control" id="description">
            </div>
            <div class="mb-3">
              <label for="longitude" class="form-label">Longitude</label>
              <input type="text" name="longitude" class="form-control" id="longitude">
            </div>
            <div class="mb-3">
              <label for="latitude" class="form-label">latitude</label>
              <input type="text" name="latitude" class="form-control" id="latitude">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </section>
  </main>
@endsection
