@extends('layout.admin')

@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
          <li class="breadcrumb-item active">Edit Pengguna</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-header">
          <h4>Formulir Edit Pengguna</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password (Opsional)</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Konfirmasi Password (Opsional)</label>
              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </section>
  </main>
@endsection
