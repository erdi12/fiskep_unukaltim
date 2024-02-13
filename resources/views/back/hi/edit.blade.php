@extends('layouts.default')
@section('hi', 'active')
@section('main', 'show')
@section('nav', 'active')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Hubungan Internasional</h2>
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
						<div class="card-title">Edit <i>{{ $hi->nama }}</i></div>
                        <a href="{{ route('hi.index') }}" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-left"></i> Back</a>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('hi.update', $hi->id) }}" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="nidn">NIDN/NITK</label>
							<input type="text" name="nidn" class="form-control" id="text" value="{{ $hi->nidn }}">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" class="form-control" id="text" value="{{ $hi->nama }}">
						</div>
                        <div class="form-group">
							<label for="jabatan">Jabatan</label>
							<select type="text" name="jabatan_id" class="form-control" id="text">
                                @foreach ($jabatan as $row)
                                    @if ($row->id == $hi->jabatan_id)                                        
                                        <option value="{{ $row->id }}" selected="selected">{{ $row->nama_jabatan }}</option>
                                    @else
                                        <option value="{{ $row->id }}">{{ $row->nama_jabatan }}</option>
                                    @endif
                                @endforeach                                
                            </select>
						</div>
                        <div class="form-group">
                            <label for="foto">Gambar hi</label>
                            <input type="file" name="foto" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg">
							@error('foto')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
							<br>
                            <label for="gambar">Gambar Saat Ini</label><br class="mb-2">
                            <img src="{{ asset('uploads/'.$hi->foto) }}" width="150" class="img-fluid">
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