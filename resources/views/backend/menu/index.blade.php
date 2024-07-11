@extends('backend.home.index')
@push('title', $halaman->nama)
@push('header',$halaman->nama)
@push('tombol')
    <a href="#tambah" class="btn btn-sm btn-primary tambah">
        Tambah <i class="fa fa-plus-circle"></i>
    </a>
    <a target="_blank" href="{{url($halaman->kode.'/extract-menu')}}" class="btn btn-sm btn-warning">
        Extract Menu <i class="fa fa-external-link-square"></i>
    </a>
@endpush
@section('content')
    <div class="panel-container show">
        <div class="panel-content">
            {!! Form::open(array('id' => 'frmDepan', 'route' => ['menu.susun-menu'], 'class' => 'form account-form', 'method' => 'post', 'files' => 'true')) !!}
            <div class="alert alert-success fade show mb-0" role="alert">
                <div class="d-flex align-items-center">
                    <div class="alert-icon width-3">
                      <span class="icon-stack icon-stack-sm">
                          <i class="ni ni-list color-success-800 icon-stack-2x font-weight-bold"></i>
                      </span>
                    </div>
                    <div class="flex-1">
                        <span class="h5 m-0 fw-700">List menu {!! config('master.aplikasi.singkatan') !!} !</span>
                        Susun menu dengan benar.
                    </div>
                </div>
            </div>
            <div class="col col-md-12 col-xl-12 ">
                <div class="panel-tag">
                    <p class="loading text-center" style="display: none">
                        <button class="btn btn-outline-dark rounded-pill waves-effect waves-themed text-center" type="button" disabled="">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </p>
                    <div class="table-responsive">
                        <div class="dd" id="nestable" style="width: fit-content; min-width: 100%;">
                            <div class="list">
                                {{--  Nestable Data --}}
                            </div>
                            <p>
                                {!! Form::hidden('urutkan', NULL, array('id' => 'nestable-output', 'class' => 'form-control', 'placeholder' => 'nestable-output','readonly'=>'readonly')) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <div class="flex-1">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('backend/js/formplugins/select2/select2.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('backend/js/miscellaneous/nestable/nestable.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('backend/css/formplugins/select2/select2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/miscellaneous/nestable/nestable.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/css/formplugins/summernote/summernote.css') }}">
@endpush
