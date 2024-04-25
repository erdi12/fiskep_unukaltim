@extends('layouts.default')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">playlist</h2>
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
						<div class="card-title">Data slide</div>
                        <a href="{{ route('slide.index') }}" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
				</div>
				<div class="card-body">
					{{-- @if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif --}}
					<form method="POST" action="{{ route('slide.store') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="judul_slide">Nama Judul</label>
							<input type="text" name="judul_slide" class="form-control" id="judul_slide" placeholder="Masukkan Judul" value="{{ old('judul_slide') }}">
						</div>
						<div class="form-group">
							<label for="link">Link Video slide</label>
							<input type="text" name="link" class="form-control" id="link" placeholder="Masukkan Link Video" value="{{ old('link') }}">
						</div>
                        <div class="form-group">
                            <label for="gambar_slide">Gambar slide</label>
                            <input type="file" name="gambar_slide" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
							@error('gambar_slide')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
						<div class="form-group">
							<button class="btn btn-primary btn-sm" type="submit">Simpan Data</button>
							<button class="btn btn-danger btn-sm" type="reset">Reset Data</button>
						</div>
					</form>                    
				</div>
			</div>
		</div>
	</div>
</div>
@endsection