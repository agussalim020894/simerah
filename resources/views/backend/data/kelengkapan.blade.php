<div id="kelengkapan">
    {!! Form::open(array('class' => 'form account-form', 'method' => 'post')) !!}
    <div class="row">
        <div class="col-md-12">
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('satuan', 'Masukkan Naskah Kerja Sama', array('class' => 'control-label')) !!}
            {!! Form::text('satuan', $data->satuan, array('id' => 'satuan', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('noperjanjian', 'No Perjanjian', array('class' => 'control-label')) !!}
            {!! Form::text('noperjanjian', $data->noperjanjian, array('id' => 'noperjanjian', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('jangkawaktu', 'Jangka Waktu', array('class' => 'control-label')) !!}
            {!! Form::text('jangkawaktu', $data->jangkawaktu, array('id' => 'jangkawaktu', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('urusan', 'Urusan Kerja Sama', array('class' => 'control-label')) !!}
            {!! Form::text('urusan', $data->urusan, array('id' => 'urusan', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('wilayahkerjasama', 'Pilih Wilayah', array('class' => 'control-label')) !!}
            {!! Form::select('wilayahkerjasama_id', $wilayahkerjasama, $data->wilayahkerjasama_id, array('id' => 'wilayahkerjasama', 'class' => 'select2 form-control wilayah', 'placeholder'=>'Pilih')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('keterangan', 'Keterangan', array('class' => 'control-label')) !!}
            <small class="text-danger"> (Pilih Draft File Yang Belum Di Tanda Tangan)</small><br>
            {!! Form::select('keterangan', ['Aktif','Tidak Aktif','Draft'], ['Aktif','Tidak Aktif','Draft'], array('id' => 'keterangan', 'class' => 'select2 form-control keterangan', 'placeholder'=>'Pilih')) !!}
        </p>
        <p>
            <small class="text-danger"> *</small>
            {!! Form::label('manfaat', 'Manfaat dan Tindak Lanjut', array('class' => 'control-label')) !!}
            {!! Form::text('manfaat', $data->manfaat, array('id' => 'manfaat', 'class' => 'form-control', 'autocomplete' => 'off')) !!}
        </p>
        </div>
        {!! Form::hidden('table-list', 'datatable', array('id' => 'table-list')) !!}
        {!! Form::hidden('id', $data->id, array('id' => 'id')) !!}
        <div class="custom-modal-footer">
            <button class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</button>
            &nbsp;&nbsp;<button type="submit" class="btn btn-sm btn-primary btn-kelengkapan"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<div class="row">
	<div class="col-md-12">
        <span class="pesan"></span>
        <div id="output"></div>
        <div class="progress">
            <div class="progress-bar-kelengkapan" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
	</div>
</div>
<style>
    .select2-container {
        z-index: 9999 !important;
    }
    .select3-container {
        z-index: 9999 !important;
    }
    .modal-lg{
        max-width: 45% !important;
    }
    .custom-modal-footer {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        padding: 1rem;
        border-top: 0 solid #dee2e6;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }
</style>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.enc.js') }}"></script>
<script src="{{ URL::asset('resources/vendor/jquery/jquery.form.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/home/ajax_progress.js') }}"></script>
<script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/'.\Auth::id().'/ajax.js') }}"></script>
<script type="text/javascript">
    $('.modal-title').html('<span class="fa fa-edit"></span> Tambah {{$halaman->nama}}');
</script>
