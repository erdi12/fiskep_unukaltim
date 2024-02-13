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
						<div class="card-title">Data Hubungan Internasional</div>
                        <a href="{{ route('hi.create') }}" class="btn btn-primary btn-sm ml-auto">Tambah data <i class="fa fa-plus-circle"></i></a>
					</div>
				</div>
				<div class="card-body">
					@if (Session::has('success'))
						<div class="alert alert-primary">
							{{ Session('success') }}
						</div>
					@endif
					<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>NIDN/NITK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hi as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $row->nidn }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->jabatan->nama_jabatan }}</td>
                                        <td class="text-center">
                                            {{-- <p>gambar</p> --}}
                                            <img src="{{ asset('uploads/'.$row->foto) }}" width="100" class="img-fluid">
                                        </td>
                                        <td class="text-center">
											<a href="{{ route('hi.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
											@csrf
											@method('delete')
											<a href="{{ route('hi.destroy', $row->id) }}" method="POST" class="d-inline btn btn-danger btn-sm" data-confirm-delete="true">Hapus</a>
											{{-- <form action="{{ route('hi.destroy', $row->id) }}" method="POST" class="d-inline">
												@csrf
												@method('delete')
												<button class="btn btn-danger btn-sm" data-confirm-delete="true" type="submit">
													<i class="fa fa-times"></i>
												</button>
											</form> --}}
										</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Masih Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection