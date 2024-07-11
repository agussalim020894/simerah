@php $tes=$tes.('.'.$key+1); @endphp
<tr>
    <td style="text-align: center;">{{$i.$tes}} </td>
    <td>{{$item->nama}}</td>
    <td>{{$item->satuan??''}}</td>
    <td>{{($data->mitrakerjasama->nama??'')}}</td>
	<td>{{$item->noperjanjian??''}}</td>
	<td>{{$item->urusan??''}}</td>
    <td style="text-align: center;">{{(count($item->data)>0)?'Ada':'-'}}</td>
    @foreach($tahun as $th)
	<td style="text-align: center;">{!!$item->data->where('tahun',$th)->first() ? '<a href="'.$item->data->where('tahun',$th)->first()->file->getFileName($item->data->where('tahun',$th)->first()->id,'fileinstansi')->url_stream.'"><i class="fa fa-file-pdf-o text-info"></i></a>' : ''!!}</td>
	@endforeach
	<td>{{$item->jangkawaktu??''}}</td>
    <td style="text-align: center;">@if($item->keterangan == '0')Aktif @elseif($item->keterangan == '1')Tidak Aktif @else Draft @endif</td>
	<td>{{$item->manfaat??''}}</td>
    <!--<td>
    @if(count($item->data)>0)
    <a href="#modalChart" data-lightbox="inline" class="button button-large button-rounded modalChart" title="{{$item->nama??''}}" id="{{$item->id}}"><i class="fa fa-bar-chart" style="font-size:25px;color:red"></i></a>
    @endif
    </td>-->
</tr>
@foreach($item->children as $key => $item)
    @include('backend.laporankerjasama.loop')
@endforeach