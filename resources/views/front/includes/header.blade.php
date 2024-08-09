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
                <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @yield('menu')" data-bs-toggle="dropdown">Program Studi</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('hubi') }}" class="dropdown-item @yield('prodi_hi')">Hubungan Internasional</a>
                        <a href="{{ route('mukom') }}" class="dropdown-item @yield('prodi_ilkom')">Ilmu Komunikasi</a>
                        <a href="{{ route('guru') }}" class="dropdown-item @yield('prodi_paud')">Pendidikan Guru - Pendidikan Anak Usia Dini</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @yield('informasi')" data-bs-toggle="dropdown">Informasi</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('akademiks') }}" class="dropdown-item @yield('akademik')">Akademik</a>
                        <a href="{{ route('berita') }}" class="dropdown-item @yield('berita')">Berita</a>
                        <a href="{{ route('pengumuman_fiskep') }}" class="dropdown-item @yield('pengumuman')">Pengumuman</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @yield('lembaga')" data-bs-toggle="dropdown">Lembaga</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('penjaminan-mutu') }}" class="dropdown-item @yield('lpm')">LPM</a>
                        <a href="{{ url('notfound') }}" class="dropdown-item">LPPM</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @yield('fasilitas')" data-bs-toggle="dropdown">Fasilitas Laboratorium</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('fasilitas_hi') }}" class="dropdown-item @yield('fasilitas_hi')">Hubungan Internasional</a>
                        <a href="{{ route('fasilitas_ilkom') }}" class="dropdown-item">Ilmu Komunikasi</a>
                        <a href="{{ route('fasilitas_pgpaud') }}" class="dropdown-item @yield('fasilitas_pgpaud')">Pendidikan Guru - Pendidikan Anak Usia Dini</a>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    {{-- <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0s">
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="{{ asset('elearning/img/logo-fiskep-01.png') }}" class="img-fluid" width="350">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
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
    </nav> --}}
<!-- Navbar End -->