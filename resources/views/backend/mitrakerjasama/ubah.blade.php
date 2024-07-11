{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.update', $data->id], 'class' => 'form account-form', 'method' => 'PUT', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
        <p>
            {!! Form::label('nama', 'Masukkan Nama Instansi', array('class' => 'control-label')) !!}
            {!! Form::text('nama', $data->nama, array('id' => 'nama', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('singkatan', 'Masukkan Singkatan', array('class' => 'control-label')) !!}
            {!! Form::text('singkatan', $data->singkatan, array('id' => 'singkatan', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('alamat', 'Masukkan Alamat', array('class' => 'control-label')) !!}
            {!! Form::text('alamat', $data->alamat, array('id' => 'alamat', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('tingkatan', 'Masukkan Tingkatan', array('class' => 'control-label')) !!}
            {!! Form::select('tingkatan', config('master.tingkatanmitrakerjasama'), $data->tingkatan, array('id' => 'tingkatan', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            {!! Form::label('file_foto', 'Upload Gambar', array('class' => 'control-label')) !!}
            <small class="fa fa-info-circle text-danger"> Ekstensi .jpg/.png/.jpeg (Ukuran Gambar : 555 x 555 px)</small><br>
            {!! Form::file('file_foto', null, array('id' => 'file_foto', 'class' => 'form-control')) !!}
        </p>
    </div>
    @if($data->file)
        <div class="col-md-12">
            <img src="{{$data->file->url_stream.'?t='.time() ?? '#'}}" style="background: transparent url({{asset('backend/img/loading.gif')}}) no-repeat center; width: 100%"/>
        </div>
    @endif
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
<script src="{{ asset('backend/js/formplugins/summernote/summernote.js') }}" async=""></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Ubah {{$halaman->nama}}');
    $('.js-summernote').summernote({
        // toolbar: [['para', ['ul', 'ol']]],
        height: 200,
        dialogsInBody: true
    });
</script>
