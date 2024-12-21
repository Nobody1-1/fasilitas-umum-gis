@extends('layout.admin')

@section('content')
<main class="main">
  <div class="pagetitle">
        <h1>Daftar Pengguna</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </nav>
  </div><!-- End Page Title -->
  
  <section class="section row">
      <!-- Map Section -->
      <div class="col-md-8">
        <div id="map" style="height: 100vh;"></div>
      </div>

      <!-- Sidebar for creating facility -->
      <div class="col-md-4">
          <h3>Create Facility</h3>
          <form action="{{route('fasility.store')}}" method="POST" id="create-facility-form">
            @csrf
              <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                  <label for="category" class="form-label">Category</label>
                  <input type="text" class="form-control" id="category" name="category" required>
              </div>
              <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" id="image" name="image" required>
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                  <label for="latitude" class="form-label">Latitude</label>
                  <input type="text" class="form-control" id="latitude" name="latitude" required>
              </div>
              <div class="mb-3">
                  <label for="longitude" class="form-label">Longitude</label>
                  <input type="text" class="form-control" id="longitude" name="longitude" required>
              </div>
              <button type="submit" class="btn btn-success">Add Facility</button>
          </form>
      </div>
  </section>
</main>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
    // Initialize map
    var map = L.map('map').setView([-6.76030, 110.71894], 14); // Coordinates for Kalipucang Kulon

    // Add tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // // Add zoom controls in the corner
    // L.control.zoom({
    //     position: 'bottomright'
    // }).addTo(map);

    fetch('/geojson/kalipucang-kulon.geojson')
        .then(response => response.json())
        .then(geoJson => {
            L.geoJSON(geoJson, {
                style: { color: 'blue', weight: 2, fillOpacity: 0.1 }
            }).addTo(map);
        });

    // Fetch facilities from the database
    function fetchFacilities() {
        fetch('/fasilitas')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                data.data.forEach(facility => {
                    const marker = L.marker([facility.latitude, facility.longitude]).addTo(map);
                    const popupContent = `
                        <div class="facility-popup">
                            <img src="/storage/${facility.image}" alt="${facility.name}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                            <h4>${facility.name}</h4>
                            <p><strong>Category:</strong> ${facility.category}</p>
                            <p>${facility.description}</p>
                            <div>
                                <button class="btn btn-warning btn-sm" onclick="editFacility(${facility.id})">Edit</button>
                                <form action="/admin/fasilitas/${facility.id}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    `;
                    marker.bindPopup(popupContent);
                });
            });
    }

    // Initial load
    fetchFacilities();

     // Fungsi untuk menyesuaikan ukuran peta
    function adjustMapSize() {
        var map = L.map('map'); // Menyisipkan peta jika belum ada
        map.invalidateSize(); // Memperbarui ukuran peta
    }

    // Event listener untuk toggle sidebar
    document.querySelector('.toggle-sidebar-btn').addEventListener('click', function () {
        setTimeout(adjustMapSize, 300); // Menunggu beberapa waktu setelah sidebar toggled
        console.log('click')
    });

    // Memanggil adjustMapSize ketika halaman dimuat pertama kali
    window.onload = adjustMapSize;
</script>

@endsection
