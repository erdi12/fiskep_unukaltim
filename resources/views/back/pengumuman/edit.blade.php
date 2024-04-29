@extends('layouts.default')
@section('informasi', 'active')
@section('info', 'show')
@section('pengumuman', 'active')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Pengumuman</h2>
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
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Edit Pengumuman</div>
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('pengumuman.update', $pengumuman->id) }}">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" value="{{ $pengumuman->nama }}" class="form-control" id="text" placeholder="Masukkan Kategori">
						</div>
						<div class="form-group">
							<label for="link">link</label>
							<input type="text" name="link" value="{{ $pengumuman->link }}" class="form-control" id="text" placeholder="Masukkan Kategori">
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-sm" type="submit">Simpan Data</button>
						</div>
					</form>                    
				</div>
			</div>
		</div>
	</div>
</div>
@endsection