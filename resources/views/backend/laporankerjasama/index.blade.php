@extends('backend.home.index')
@push('title',ucwords(strtolower($halaman->nama)))
@push('header',ucwords(strtolower($halaman->nama)))
@section('content')
@if(Auth::user()->level != 2)
<div class="container">
	<form method="get" action="{{url('laporankerjasama/mitrakerjasama')}}">
		<div class="row">
			<div class="col-4">
				<select onchange="this.form.submit()" style="width: 50% ; height:30px" class="select2" name="mitrakerjasama" id="select2">
					<option value="0" selected> - Pilih Mitra/Instansi Kerja Sama - </option>
					@foreach($mitrakerjasamas as $data)
					<option value="{{ $data->id }}">{{$data->nama}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</form>
</div>
@endif
<div class="panel-container show">
	<div class="col-lg-12 pt-4 pt-lg-0 pb-2 text-right">
		<button class="export-button" onclick="exportToExcel()">Export to Excel</button>
	</div>
	<div class="panel-content">
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
				@php $i=1; @endphp
				@foreach($datas as $data)
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
					@php $i++; @endphp
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- modalChart -->
<!-- <div class="modal1 mfp-hide" id="modalChart">
      <div class="block mx-auto" style="background-color: #FFF; max-width: 800px;">
        <div class="center" style="padding: 50px;">
          <h3 class="title">Grafik Data Per Tahun</h3>
          <div class="bottommargin mx-auto" id="graph-container" style="max-width: 100%; min-height: 350px;">
				<canvas id="chart-0"></canvas>
			</div>
        </div>
        <div class="section center m-0" style="padding: 30px;">
          <a href="#" class="btn btn-primary" onClick="$.magnificPopup.close();return false;">Close</a>
        </div>
      </div>
    </div> -->
@endsection
@push('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script> --}}
@include('backend.home.datatable-js')
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/home/'.$halaman->link.'/'.$halaman->kode.'/jquery-crud.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset(config('master.aplikasi.author').'/laporankerjasama/mitrakerjasama/datatables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/js/formplugins/select2/select2.bundle.js') }}"></script>
<!-- <script src="{{ URL::asset(config('master.aplikasi.author').'/'.$halaman->kode.'/ajax.js') }}"></script> -->
<script src="{{url('frontend/js/jquery.js')}}"></script>
<script src="{{url('frontend/js/plugins.min.js')}}"></script>
<script src="{{url('frontend/js/functions.js')}}"></script>
<script src="{{url('frontend/js/chart.js')}}"></script>
<script src="{{url('frontend/js/chart-utils.js')}}"></script>
<!-- <script>
  $(document).on("click",".modalChart",function() {
    var id = $(this).attr('id');
    var title = $(this).attr('title');
	
    console.log(title);
    $('.title').html(title);
    $.ajax({
      type: "GET",
      url: "{{url('laporankerjasama/chart')}}/"+id,
      cache: true,
      success: function (data) {
          console.log(data);
          chart(data);
      },
      error: function(err) {
          console.log(err);
      }
    });  
    
  });

function chart(data){
	$('#chart-0').remove(); // this is my <canvas> element
  	$('#graph-container').append('<canvas id="chart-0"><canvas>');
	var ctx = document.getElementById("chart-0").getContext("2d");
          window.myPie = new Chart(ctx, {
            type: 'bar',
            data: {
              datasets: [{
                data: data.jumlah,
                backgroundColor: [
                  window.chartColors.red,
                  window.chartColors.orange,
                  window.chartColors.yellow,
                  window.chartColors.green,
                  window.chartColors.blue,
                ],
                label: data.tahun
              }],
              labels: data.tahun
            },
            options: {
				responsive: true,
				scales: {
					yAxes: [{
					ticks: {
						beginAtZero: true
					}
					}]
				}
            }
          });
}
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script>
        function exportToExcel() {
            // Get the table
            const table = document.getElementById('datatable');
            const wb = XLSX.utils.table_to_book(table);

            // Process each cell in the table
            const sheet = wb.Sheets[wb.SheetNames[0]];
            const range = XLSX.utils.decode_range(sheet['!ref']);

            for (let row = range.s.r; row <= range.e.r; row++) {
                for (let col = range.s.c; col <= range.e.c; col++) {
                    const cell_address = { c: col, r: row };
                    const cell_ref = XLSX.utils.encode_cell(cell_address);
                    const cell = sheet[cell_ref];

                    if (cell && cell.v && typeof cell.v === 'string') {
                        // Extract URLs from <a href> tags
                        const urlMatch = cell.v.match(/<a href="([^"]*)">[^<]*<\/a>/);
                        if (urlMatch) {
                            // Replace the cell value with the URL
                            cell.v = urlMatch[1];
                        }
                    }
                }
            }

            // Export to Excel
            XLSX.writeFile(wb, 'export.xlsx');
        }
    </script>
	<style>
		.export-button {
			background-color: #ff0077; /* Warna latar belakang tombol */
			color: #ffffff; /* Warna teks */
			padding: 10px 20px; /* Padding tombol */
			border: none; /* Hapus garis pinggir */
			border-radius: 5px; /* Membuat sudut tombol lebih lembut */
			cursor: pointer; /* Mengubah kursor menjadi tanda tangan saat dihover */
			transition: background-color 0.3s ease; /* Animasi perubahan warna latar belakang */
		}
	
		.export-button:hover {
			background-color: #ff0077; /* Warna latar belakang saat tombol dihover */
		}
	</style>
@endpush
@push('css')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('backend/css/formplugins/select2/select2.bundle.css') }}">
<!-- <link rel="stylesheet" href="{{url('frontend/css/magnific-popup.css')}}" type="text/css" /> -->
@include('backend.home.datatable-css')
@endpush