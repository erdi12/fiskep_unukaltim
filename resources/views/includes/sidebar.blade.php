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
                {{-- <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
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