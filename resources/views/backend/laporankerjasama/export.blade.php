<table id="datatable" class="table table-bordered table-hover table-striped table-responsive">
    <thead class="bg-primary-600">
        <tr>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">No</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Elemen / Sub Elemen</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Naskah Kerja Sama</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Mitra/Instansi</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">No Perjanjian</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Urusan Kerja Sama</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Ketersediaan Data</td>
            <td colspan="{{count($tahuns)}}" style="vertical-align : middle;text-align:center;">Tahun Penetapan</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Jangka Waktu</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Status Kerja Sama</td>
            <td rowspan="2" style="vertical-align : middle;text-align:center;">Manfaat dan Tindak Lanjut</td>
            <!--<td rowspan="2" style="vertical-align : middle;text-align:center;">Grafik</td>-->
        </tr>
        <tr>
            @foreach($tahuns as $th)
            <td style="vertical-align : middle;text-align:center;">{{$tahun[]=$th}}</td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="font-weight: bold; text-align: center;">{{$i}}</td>
            <td style="font-weight: bold;">{{$data->nama??''}}</td>
            <td>{{$data->satuan??''}}</td>
            <td>{{($data->mitrakerjasama->nama??'')}}</td>
            <td>{{$data->noperjanjian??''}}</td>
            <td>{{$data->urusan??''}}</td>
            <td style="text-align: center;">{{(count($data->data)>0)?'Ada':'-'}}</td>
            @foreach($tahun as $th)
            <td style="text-align: center;">{!!$data->data->where('tahun',$th)->first() ? '<a href="'.$data->data->where('tahun',$th)->first()->file->getFileName($data->data->where('tahun',$th)->first()->id,'fileinstansi')->url_stream.'"><i class="fa fa-file-pdf-o text-info"></i></a>' : ''!!}</td>
            @endforeach
            <td>{{$data->jangkawaktu??''}}</td>
            <td style="text-align: center;">@if($data->keterangan == '0')Aktif @elseif($data->keterangan == '1')Tidak Aktif @else Draft @endif</td>
            <td>{{$data->manfaat??''}}</td>
            <!--<td>
            @if(count($data->data)>0)
            <a href="#modalChart" data-lightbox="inline" class="button button-large button-rounded modalChart" title="{{$data->nama??''}}" id="{{$data->id}}"><i class="fa fa-bar-chart" style="font-size:25px;color:red"></i></a>
            @endif
            </td>-->
        </tr>
        @php $tes=''; @endphp
        @foreach($data->children as $key => $item)
            @include('backend.laporankerjasama.loop')
        @endforeach
    </tbody>
</table>