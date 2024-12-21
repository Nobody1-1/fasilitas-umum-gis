@extends('layout.admin') <!-- Menggunakan layout yang sudah ada -->

@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Daftar Pengguna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna</a>
        </div>
        <div class="card-body">
          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                
              @foreach($users as $index => $user)
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
                  <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
@endsection
