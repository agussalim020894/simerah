@extends('backend.home.index')
@push('title','User')
@push('header','User')
@push('tombol')
<a href="#tambah" class="btn btn-sm btn-primary tambah">
	<i class="fa fa-plus-circle"></i> Tambah
</a>
@endpush
@section('content')
<div class="panel-container show">
	<div class="panel-content">
		<table id="datatable" class="table table-bordered table-hover table-striped w-100">
			<thead class="bg-primary-600">
				<tr>
					<th class="text-center">Singkatan</th>
					<th >Nama Mitra/Instansi</th>
					<th >E-Mail</th>
					<th class="text-center">Akses Grup</th>
					<th class="text-center">Level</th>
					<th class="text-center wid-10">Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@endsection
@push('js')
@include('backend.home.datatable-js')
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/user/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/user/datatables.js') }}"></script>
@endpush
@push('css')
@include('backend.home.datatable-css')
@endpush
