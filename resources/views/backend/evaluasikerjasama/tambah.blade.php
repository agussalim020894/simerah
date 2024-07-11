{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.store'], 'class' => 'form account-form', 'method' => 'post', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
        <p>
            {!! Form::label('nama', 'Masukkan Nama', array('class' => 'control-label')) !!}
            {!! Form::text('nama', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('file', 'Unggah Buku', array('class' => 'control-label')) !!}
            <small class="fa fa-info-circle text-danger"> Ekstensi .pdf (Ukuran Maksimal 10 Mb)</small><br>
            {!! Form::file('file', null, array('id' => 'file', 'class' => 'form-control')) !!}
        </p>
        <p>
            {!! Form::label('gambar', 'Unggah Cover', array('class' => 'control-label')) !!}
            <small class="fa fa-info-circle text-danger"> Ekstensi .jpg/.png/.jpeg (Ukuran Gambar : 555 x 786 px)</small><br>
            {!! Form::file('gambar', null, array('id' => 'gambar', 'class' => 'form-control')) !!}
        </p>
    </div>
	{!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
</div>
<div class="row">
	<div class="col-md-12">
        <span class="pesan"></span>
        <div id="output"></div>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
	</div>
</div>
{!! Form::close() !!}
<style>
    .select2-container {
        z-index: 9999 !important;
    }
</style>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/home/ajax_progress.js') }}"></script>
