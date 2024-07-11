{!! Form::open(array('id' => 'frmOji', 'route' => [$halaman->kode.'.store'], 'class' => 'form account-form', 'method' => 'post', 'files' => 'false')) !!}
<div class="row">
    <div class="col-md-12">
        <p>
            {!! Form::label('file', 'Masukkan File', array('class' => 'control-label')) !!}
            <small class="text-danger"> * File Yang Diuploud Menggunakan Format .pdf (Ukuran Maksimal 10 Mb)</small><br>
            {!! Form::file('file', null, array('id' => 'file', 'class' => 'form-control')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('tahun', 'Masukkan tahun', array('class' => 'control-label')) !!}
            {!! Form::text('tahun', date("Y"), array('id' => 'datepicker', 'class' => 'form-control datepicker', 'autocomplete' => 'off')) !!}
        </p>
    </div>
	{!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
    {!! Form::hidden('elemenkerjasama_id', $id, array('id' => 'elemenkerjasama_id')) !!}
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
<link href="{{ asset('backend/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet"/>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/home/ajax_progress.js') }}"></script>
<script src="{{ asset('backend/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}" async=""></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Tambah {{$halaman->nama}}');
    $("#datepicker").datepicker( {
        format: "yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
</script>