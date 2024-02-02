<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('back/img/unu-kaltim.png') }}" type="image/x-icon"/>
    <title>FISKEP UNU KALTIM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('elearning/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('elearning/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('elearning/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('elearning/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('elearning/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="{{ asset('elearning/img/logo-fiskep-01.png') }}" class="img-fluid" width="230">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ route('berita') }}" class="nav-item nav-link {{ request()->is('berita') ? 'active' : '' }}">Berita</a>
                <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                <a href="courses.html" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
<!-- Navbar End -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 mt-4">
            <div class="div">
                <img src="{{ asset('uploads/'.$article->gambar_artikel) }}" alt="" class="img-fluid">
            </div>
            {{-- <div class="detail-content mt-2 p-4">
                <div class="detail-badge">
                    <button class="btn btn-danger">{{$article->kategori->nama_kategori}}</button>
                    <button class="btn btn-primary">{{$article->users->name}}</button>
                    <span class="badge badge-dark">uhuy</span>
                </div>
                <h2>{{ $article->judul }}</h2>
            </div> --}}
            <div class="mt-2 p-4">
                <span class="badge bg-secondary">{{$article->created_at->format('d M Y H:i:s')}}</span>
                <span class="badge bg-warning text-dark">{{$article->kategori->nama_kategori}}</span>
                <span class="badge bg-primary">{{$article->users->name}}</span>
                <span class="badge bg-primary">Total Views: {{$article->views}}</span>
                <hr>
                <h2>{{ $article->judul }}</h2>
                <p align="justify">{!!$article->body!!}</p>
            </div>
        </div>
        <div class="col-lg-4 mt-4">
            <h4>Iklan</h4><hr>
            @foreach ($iklan as $ikl)                
                <a href="">
                    <img src="{{ asset('uploads/'.$ikl->gambar_iklan) }}" alt="" class="img-fluid">
                </a>
            @endforeach
            <h4 class="mt-4">Kategori</h4><hr>
            @foreach ($category as $cat)
            <div class="d-flex flex-wrap">
                    <a href="">
                        <p>{{ $cat->nama_kategori }}</p>
                    </a><br>
                    <p class="ms-auto text-right"><span class="badge bg-dark">{{ $cat->articles->count() }}</span></p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('front.includes.footer')
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://kit.fontawesome.com/a7ac2e4b44.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('elearning/lib/wow/wow.min.js')}}"></script>
<script src="{{ asset('elearning/lib/easing/easing.min.js')}}"></script>
<script src="{{ asset('elearning/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{ asset('elearning/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{ asset('elearning/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- <script>
  $(document).ready(function () {
      // Menambahkan event listener untuk mendeteksi scroll
      $(window).scroll(function () {
          // Mengambil nilai scroll dari atas halaman
          var scroll = $(window).scrollTop();

          // Menentukan aturan kapan kelas "d-none" dihilangkan
          if (scroll > 50) {
              $(".navbar").removeClass("d-none");
          } else {
              $(".navbar").addClass("d-none");
          }
      });
  });
</script> --}}
</body> 