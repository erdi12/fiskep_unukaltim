@extends('layouts.default')

@section('content')
    
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
				<h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">User</p>
								<h4 class="card-title">{{$user}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="far fa-newspaper"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Article</p>
								<h4 class="card-title">{{$artikel}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="fas fa-tags"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Kategori</p>
								<h4 class="card-title">{{$kategori}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="fas fa-file-video"></i>

							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Vidoe</p>
								<h4 class="card-title">{{$video}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Materi Video</div>
					</div>
				</div>
				<div class="card-body">
				

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Playlist Video</div>
					</div>
				</div>
				<div class="card-body">
					

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Draft Artikel</div>
					</div>
				</div>
				<div class="card-body">
				

				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Artikel Terpopuler</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-responsive-md">
						<thead>
							<th>No</th>
							<th>Gambar</th>
							<th>Judul</th>
							<th>Lihat Artikel</th>
						</thead>
						<tbody>
							@foreach ($popularArticle as $art)
							<tr>
								<td class="text-center">{{ $loop->iteration }}</td>
								<td class=""><img src="{{ asset('uploads/'.$art->gambar_artikel) }}" alt="" width="100"></td>
								<td>
									<p>{{ $art->judul }}</p>
									<p class="badge badge-primary">{{ $art->kategori->nama_kategori }}</p>
									<p class="badge badge-primary">Total Views: {{ $art->views }}</p>
								</td>
								<td><a href="{{ route('detail-artikel', ['slug' => $art->slug]) }}" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer"><i class="fa fa-eye"></i> Lihat Disini</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
						{{-- <h2>{{ $art->judul }}</h2>
						<br>
						<span class="badge text-bg-primary"></span>		
						<span class="badge text-bg-primary"></span>		
						<a href="" class="badge text-bg-danger" target="_blank">Lihat Disini</a>		
						<hr> --}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection