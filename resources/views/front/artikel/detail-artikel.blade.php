@extends('front.layouts.frontend')
@section('berita', 'active')

@section('content')

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
                <span class="badge bg-secondary"><i class="bi bi-calendar3"></i> {{$article->created_at->format('d M Y')}}</span>
                <span class="badge bg-warning text-dark"><i class="bi bi-tag-fill"></i> {{$article->kategori->nama_kategori}}</span>
                <span class="badge bg-primary"><i class="bi bi-person-fill"></i> {{$article->users->name}}</span>
                <span class="badge bg-primary"><i class="bi bi-eye-fill"></i> Total Views: {{$article->views}}</span>
                <hr>
                <h2>{{ $article->judul }}</h2>
                <p align="justify">{!!$article->body!!}</p>
            </div>
        </div>
        <div class="col-lg-4 mt-4">
            <h4>Iklan</h4><hr>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($iklan as $key => $row)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('uploads/'.$row->gambar_iklan) }}" class="img-fluid" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
            <h4 class="mt-4">Kategori</h4><hr>
            @foreach ($category as $cat)
            <div class="d-flex flex-wrap">
                    <a href="{{ route('kategori-berita', ['kategoriSlug' => $cat->slug]) }}">
                        <p>{{ $cat->nama_kategori }}</p>
                    </a><br>
                    <p class="ms-auto text-right"><span class="badge bg-dark">{{ $cat->articles->count() }}</span></p>
                </div>
            @endforeach
            <h4 class="mt-4">Berita Terbaru</h4>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Terbaru</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pengumuman</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @foreach ($articleTerbaru as $pop)
                    <ul class="list-group ">
                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                            <img src="{{ asset('uploads/'.$pop->gambar_artikel) }}" alt="" class="img-fluid" style="width: 30%">
                            <div class="ms-2 me-auto">
                                <a href="{{ route('detail-artikel', $pop->slug) }}"> {{ $pop->judul }}</a><br>
                                <span class="badge bg-primary rounded-pill">{{ $pop->created_at->format('Y-m-d') }}</span>
                            </div>
                        </li><hr>
                    </ul>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @foreach ($pengumuman_detail_article as $pengumuman)
                        <ul class="list-group ">
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                                <div class="ms-2 me-auto">
                                    <a href="{{ route('detail-artikel', $pengumuman->link) }}"> {{ $pengumuman->nama }}</a><br>
                                    <span class="badge bg-primary rounded-pill">{{ $pop->created_at->format('Y-m-d') }}</span>
                                </div>
                            </li><hr>
                        </ul>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Tus</div>
            </div>                
        </div>
    </div>
</div>
    
@endsection