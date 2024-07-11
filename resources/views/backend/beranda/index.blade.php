@extends('backend.home.index')
@section('content')
<?php
$countdata = App\Model\Data::count();
$countinstansi = App\Model\Mitrakerjasama::count();
$countdokumen = App\Model\Dokumenkerjasama::count();
$counttotal = App\Model\Elemenkerjasama::count();
?>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-home'></i> Selamat Datang di Sistem Informasi Kerja Sama Daerah Kabupaten Bengkalis
    </h1>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    {{$countdata}}
                    <small class="m-0 l-h-n">Data Master</small>
                </h3>
            </div>
            <i class="fal fa-database position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    {{$countinstansi}}
                    <small class="m-0 l-h-n">Total Instansi</small>
                </h3>
            </div>
            <i class="fal fa-building position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    {{$countdokumen}}
                    <small class="m-0 l-h-n">Dokumen Kerjasama</small>
                </h3>
            </div>
            <i class="fal fa-file-pdf-o position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
            <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                    {{$counttotal}}
                    <small class="m-0 l-h-n">Total Kerjasama</small>
                </h3>
            </div>
            <i class="fal fa-bar-chart position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
        </div>
    </div>

<div class="col-lg-6">
<div id="panel-3" class="panel">
    <div class="panel-hdr">
        <h2 class="js-get-date"></h2>
        <div class="panel-toolbar">
            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
        </div>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            <div id="calendar"></div>
        </div>
    </div>
</div>
</div>

<div class="col-lg-6">
    <div id="panel-9" class="panel">
        <div class="panel-hdr">
            <h2>
                Data <span class="fw-300"><i>Diagram Lingkaran</i></span>
            </h2>
            <div class="panel-toolbar">
                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
            </div>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
                <div class="panel-tag">
                    Data Yang Masuk ...
                </div>
                <div id="pieChart" style="width:100%; height:300px;"></div>
                <div class="text-right">
                    <button id="pieChartUnload" onclick="pieChartUnload();" class="btn btn-sm btn-dark ml-auto">Unload Data</button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection