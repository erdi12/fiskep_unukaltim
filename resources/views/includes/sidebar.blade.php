<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('back/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <hr>

                {{-- Sidebar Dosen Start --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Fakultas</h4>
                </li>
                <li class="nav-item @yield('nav')">
                    <a data-toggle="collapse" href="#base">
                        <i class="flaticon-user-2"></i>
                        <p>FISKEP</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @yield('main')" id="base">
                        <ul class="nav nav-collapse">
                            <li class="@yield('jabatan')">
                                <a href="{{ route('jabatan.index') }}">                                    
                                    <span class="sub-item"> Jabatan</span>
                                </a>
                            </li>
                            <li class="@yield('dekan')">
                                <a href="{{ route('dekan.index') }}">
                                    <span class="sub-item">Dekan</span>
                                </a>
                            </li>
                            <li class="@yield('hi')">
                                <a href="{{ route('hi.index') }}">
                                    <span class="sub-item">Hubungan Internasional</span>
                                </a>
                            </li>
                            <li class="@yield('ilkom')">
                                <a href="{{ route('ilkom.index') }}">
                                    <span class="sub-item">Ilmu Komunikasi</span>
                                </a>
                            </li>
                            <li class="@yield('pgpaud')">
                                <a href="{{ route('pgpaud.index') }}">
                                    <span class="sub-item">PG-PAUD</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{--Sidebar Dosen End  --}}

                {{-- Sidebar Visi Misi Start --}}
                {{-- <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Visi Misi</h4>
                </li> --}}
                <li class="nav-item @yield('visimisi')">
                    <a data-toggle="collapse" href="#visimisi">
                        <i class="fas fa-address-book"></i>
                        <p>Visi Misi</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @yield('menu')" id="visimisi">
                        <ul class="nav nav-collapse">
                            <li class="@yield('visi')">
                                <a href="{{ route('visimisi.index') }}">
                                    
                                    <span class="sub-item"> Visi Misi Fakultas</span>
                                </a>
                            </li>
                            <li class="@yield('visimisihi')">
                                <a href="{{ route('visimisihi.index') }}">                                    
                                    <span class="sub-item"> Visi Misi HI</span>
                                </a>
                            </li>
                            <li class="@yield('visimisiilkom')">
                                <a href="{{ route('visimisiilkom.index') }}">
                                    <span class="sub-item"> Visi Misi Ilkom</span>
                                </a>
                            </li>
                            <li class="@yield('visimisipgpaud')">
                                <a href="{{ route('visimisipgpaud.index') }}">
                                    <span class="sub-item"> Visi Misi PG-PAUD</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Sidebar Visi Misi End --}}
                {{-- <li class="nav-item {{ request()->is('visimisi*') ? 'active' : '' }}">
                    <a href="{{ route('visimisi.index') }}">
                        <i class="fa-solid fa-arrows-down-to-people"></i>
                        <p>Visi Misi</p>
                    </a>
                </li> --}}
                <li class="nav-item {{ request()->is('kategori*') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}">
                        <i class="fas fa-desktop"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item nav-item {{ request()->is('artikel*') ? 'active' : '' }}">
                    <a href="{{ route('artikel.index') }}">
                        <i class="fas fa-pen"></i>
                        <p>Artikel</p>
                    </a>
                </li>
                <li class="nav-item nav-item {{ request()->is('playlist*') ? 'active' : '' }}">
                    <a href="{{ route('playlist.index') }}">
                        <i class="fas fa-video"></i>
                        <p>Playlist Video</p>
                    </a>
                </li>
                <li class="nav-item nav-item {{ request()->is('materi*') ? 'active' : '' }}">
                    <a href="{{ route('materi.index') }}">
                        <i class="fas fa-film"></i>
                        <p>Materi Video</p>
                    </a>
                <li class="nav-item nav-item {{ request()->is('slide*') ? 'active' : '' }}">
                    <a href="{{ route('slide.index') }}">
                        <i class="fas fa-sliders-h"></i>
                        <p>Slide Banner</p>
                    </a>
                </li>
                <li class="nav-item nav-item {{ request()->is('iklan*') ? 'active' : '' }}">
                    <a href="{{ route('iklan.index') }}">
                        <i class="fas fa-money-bill"></i>
                        <p>Iklan</p>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a href="widgets.html">
                        <i class="fas fa-desktop"></i>
                        <p>Widgets</p>
                        <span class="badge badge-success">4</span>
                    </a> --}}

                    
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-undo"></i>
                        <p>Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>