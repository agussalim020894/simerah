{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.update', $data->id], 'class' => 'form account-form', 'method' => 'PUT', 'files' => 'true')) !!}
<div class="row">
    <div class="col-md-12">
        <p>
            {!! Form::label('file', 'Masukkan File', array('class' => 'control-label')) !!}
            <small class="text-danger"> * File Yang Diuploud Menggunakan Format .pdf (Ukuran Maksimal 10 Mb)</small><br>
            {!! Form::file('file', null, array('id' => 'file', 'class' => 'form-control')) !!}
        </p>
        <p>
            {!! Form::label('tahun', 'Masukkan Tahun', array('class' => 'control-label')) !!}
            {!! Form::text('tahun', $data->tahun , array('id' => 'datepicker', 'class' => 'form-control datepicker', 'autocomplete' => 'off')) !!}
        </p>
    </div>
    <!--@if($data->file)
        <div class="col-md-12">
            <img src="{{$data->file->url_stream.'?t='.time() ?? '#'}}" style="background: transparent url({{asset('backend/img/loading.gif')}}) no-repeat center; width: 100%"/>
        </div>
    @endif-->
    <div class="col-md-12">
    @if($data->file && $data->file->getFileName($data->id,'fileinstansi'))
        @if($data->file->getFileName($data->id,'fileinstansi')->extension=='pdf')
        <object data="{{$data->file->getFileName($data->id,'fileinstansi')->url_stream.'?t='.time() ?? '#'}}" type="application/pdf" style="background: transparent url({{asset('backend/img/loading.gif')}}) no-repeat center; width: 100%;height: 700px">
            <p>
                File PDF tidak dapat ditampilkan, silahkan download file
                <a download="{{$data->file->nama}}" href="{{$data->file->url_stream ?? '#'}}"><span class="fa fa-download"> di sini</span></a>
            </p>
        </object>
        @else
        <p>
            File tidak dapat ditampilkan, silahkan download file
            <a download="{{$data->file->nama}}" href="{{$data->file->url_download.'?t='.time() ?? '#'}}"><span class="fa fa-download"> di sini</span></a>
        </p>
        @endif
    @endif
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
<link href="{{ asset('backend/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet"/>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/home/ajax_progress.js') }}"></script>
<script src="{{ asset('backend/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}" async=""></script>
<script src="{{ asset('backend/js/formplugins/summernote/summernote.js') }}" async=""></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Ubah {{$halaman->nama}}');
    $("#datepicker").datepicker( {
        format: "yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
</script>