{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.store'], 'class' => 'form account-form', 'method' => 'post', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
        <p>
            {!! Form::label('nama', 'Masukkan Nama Instansi', array('class' => 'control-label')) !!}
            {!! Form::text('nama', null, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('singkatan', 'Masukkan Singkatan', array('class' => 'control-label')) !!}
            {!! Form::text('singkatan', null, array('id' => 'singkatan', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('alamat', 'Masukkan Alamat', array('class' => 'control-label')) !!}
            {!! Form::text('alamat', null, array('id' => 'alamat', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('tingkatan', 'Masukkan Tingkatan', array('class' => 'control-label')) !!}
            {!! Form::select('tingkatan', config('master.tingkatanmitrakerjasama'), null, array('id' => 'tingkatan', 'class' => 'form-control select2', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('file_foto', 'Upload Logo', array('class' => 'control-label')) !!}
            <small class="fa fa-info-circle text-danger"> Ekstensi .jpg/.png/.jpeg (Ukuran Gambar : 555 x 555 px)</small><br>
            {!! Form::file('file_foto', null, array('id' => 'file_foto', 'class' => 'form-control')) !!}
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
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/home/ajax_progress.js') }}"></script>
<script src="{{ asset('backend/js/formplugins/summernote/summernote.js') }}" async=""></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Tambah {{$halaman->nama}}');
    $('.js-summernote').summernote({
        // toolbar: [['para', ['ul', 'ol']]],
        height: 200,
        dialogsInBody: true
    });
</script>