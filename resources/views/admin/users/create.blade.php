@extends('layout.admin')

@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Tambah Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
          <li class="breadcrumb-item active">Tambah Pengguna</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Formulir Pengguna</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </section>
  </main>
@endsection
