@extends('front.layouts.frontend')

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
                <span class="badge text-bg-warning">{{$article->kategori->nama_kategori}}</span>
                <span class="badge text-bg-primary">{{$article->users->name}}</span>
                <span class="badge text-bg-primary">Total Views: {{$article->views}}</span>
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
                    <p class="ms-auto text-right"><span class="badge text-bg-dark">{{ $cat->articles->count() }}</span></p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

