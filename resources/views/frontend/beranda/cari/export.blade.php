<table id="datatable" class="table table-bordered table-hover table-striped table-responsive">
    <thead class="bg-primary-600">
    <tr>
        <td rowspan="2" style="vertical-align : middle;text-align:center;font-weight: bold;">No</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;font-weight: bold;">Elemen / Sub Elemen</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;font-weight: bold;">Satuan</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;font-weight: bold;">Produsen Data</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;font-weight: bold;">Ketersediaan Data</td>
        <td colspan="{{count($tahuns)}}" style="vertical-align : middle;text-align:center;font-weight: bold;">Tahun Produksi</td>
        <td rowspan="2" style="vertical-align : middle;text-align:center;font-weight: bold;">Catatan</td>
    </tr>
    <tr>
        @foreach($tahuns as $th)
        <td style="vertical-align : middle;text-align:center;font-weight: bold;">{{$tahun[]=$th}}</td>
        @endforeach
    </tr>
    </thead>
    <tbody>
        <tr>
        <td style="font-weight: bold; text-align: center;">1</td>
        <td style="font-weight: bold;">{{$datas->nama??''}}</td>
        <td>{{$datas->satuan??''}}</td>
        <td>{{($datas->opd->nama??'')}}</td>
        <td>{{(count($datas->data)>0)?'Ada':''}}</td>
        @foreach($tahun as $th)
            <td>{{$elemen->filterjumlah($datas->id??'',$th)->jumlah??''}}</td>
        @endforeach
        <td>{{$datas->keterangan??''}}</td>
        </tr>
        @php $tes=''; @endphp
        @foreach($datas->children as $key => $item)
        @include('frontend.beranda.cari.loop')
        @endforeach
    </tbody>
</table>