@extends('layout.admin') <!-- Menggunakan layout yang sudah ada -->

@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Daftar Review</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Review</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Nama Fasilitas</th>
                <th>Rating</th>
                <th>Comment</th>
              </tr>
            </thead>
            <tbody>
               
              @foreach($reviews as $index => $review)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $review->user->name }}</td>
                    @foreach ($facility as $fasilitas) 
                        @if ($review->facility_id == $fasilitas->id) 
                            <td>{{$fasilitas->name}}</td>
                        @endif
                    @endforeach
                    <td>
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star-fill{{ $review->rating >= $i ? ' text-warning' : '' }}"></i>
                        @endfor

                    </td>
                    <td>{{ $review->comment }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>
@endsection
