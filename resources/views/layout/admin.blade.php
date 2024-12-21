<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->
  <link href="{{asset('NiceAdmin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('NiceAdmin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('NiceAdmin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('NiceAdmin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('NiceAdmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('NiceAdmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('NiceAdmin/assets/css/style.css')}}" rel="stylesheet">
  <style>
    .charts-container {
      display: flex;
      justify-content: space-between; /* Memisahkan kedua chart secara horizontal */
      gap: 20px; /* Memberikan jarak antar chart */
    }

    .chart {
      width: 48%; /* Mengatur lebar chart agar keduanya sejajar */
      height: 350px; /* Menentukan tinggi chart */
    }
    @media (max-width: 768px) {
      .charts-container {
        flex-direction: column; /* Menampilkan chart secara vertikal di layar kecil */
      }

      .chart {
        width: 100%; /* Memastikan chart mengambil seluruh lebar layar */
      }
    }

  </style>


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

 





        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class='bi bi-person' ></i>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name}}</h6>
              <h6>{{Auth::user()->role}}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="">Logout</button>
                </form>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->




      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('users.index')}}">
          <i class="bi bi-person"></i>
          <span>User</span>
        </a>
      </li><!-- End User Page Nav -->

 

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('review.index')}}">
          <i class="bi bi-envelope"></i>
          <span>Review</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('fasility.index')}}">
          <i class="bi bi-card-list"></i>
          <span>Manajemen Fasilitas</span>
        </a>
      




    </ul>

  </aside><!-- End Sidebar-->

    @yield('content')
 

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('NiceAdmin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('NiceAdmin/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('NiceAdmin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('NiceAdmin/assets/js/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>


</body>

</html>