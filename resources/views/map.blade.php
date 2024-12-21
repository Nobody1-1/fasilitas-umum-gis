<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Map of Kalipucang Kulon</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <link href="{{asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
        #map { height: 600px; width: 100%; margin-bottom: 20px; }
        .facility-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .facility-image {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        .reviews-container {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-8">
                <input type="text" id="search-box" class="form-control" placeholder="Search facilities...">
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-primary" onclick="searchFacilities()">Search</button>
            </div>
        </div>
        <div id="map"></div>
        <div id="facilities-container" class="row"></div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        // Initialize map
        var map = L.map('map').setView([-6.76030, 110.71894], 14);

        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Fetch geoJSON for map boundary
        fetch('/geojson/kalipucang-kulon.geojson')
            .then(response => response.json())
            .then(geoJson => {
                L.geoJSON(geoJson, {
                    style: { color: 'blue', weight: 2, fillOpacity: 0.1 }
                }).addTo(map);
            });

        // Fetch facilities and populate the page
        function fetchFacilities(query = '') {
            fetch(`/fasilitas?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    const facilities = data.data;
                    const facilitiesContainer = document.getElementById('facilities-container');

                    // Clear previous content
                    facilitiesContainer.innerHTML = '';

                    facilities.forEach(facility => {
                        // Add marker to the map
                        const marker = L.marker([facility.latitude, facility.longitude]).addTo(map);

                        const popupContent = `
                            <div>
                                <img src="${facility.image ? '/storage/' + facility.image : '/storage/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg'}" alt="${facility.name}" style="width: 100%; max-height: 150px; object-fit: cover;">
                                <h5>${facility.name}</h5>
                                <p>${facility.description}</p>
                                <button class="btn btn-primary btn-sm" onclick="">More Details</button>
                            </div>
                        `;
                        marker.bindPopup(popupContent);

                        // Create facility card
                        const facilityItem = document.createElement('div');
                        facilityItem.classList.add('col-md-4', 'facility-item',facility.id);

                        let reviewsHtml = '';
                        if (facility.reviews && facility.reviews.length > 0) {
                            reviewsHtml = facility.reviews.map(review => `
                                <div class="review-item mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold">${review.user.name}</span>
                                        <small class="text-muted">${new Date(review.created_at).toLocaleDateString()}</small>
                                    </div>
                                    <div class="mb-1">
                                        <span class="text-warning">${'⭐'.repeat(review.rating)}</span>
                                    </div>
                                    <p class="mb-0 text-muted">${review.comment}</p>
                                </div>
                            `).join('');
                        } else {
                            reviewsHtml = '<p>No reviews available.</p>';
                        }

                        facilityItem.innerHTML = `
                            <img src="/storage/${facility.image}" alt="${facility.name}" class="facility-image mb-3">
                            <h5 class="text-center mb-3">${facility.name}</h5>
                            <div class="reviews-container">${reviewsHtml}</div>
                        `;

                        facilitiesContainer.appendChild(facilityItem);
                    });
                })
                .catch(error => {
                    console.error('Error fetching facilities:', error);
                });
        }

        // Search facilities
        function searchFacilities() {
            const query = document.getElementById('search-box').value;
            fetchFacilities(query);
        }

        // Initial load
        fetchFacilities();
    </script>
    <script src="{{asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
