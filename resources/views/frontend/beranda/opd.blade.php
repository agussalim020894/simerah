@extends('frontend.partials.app')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center">
  <div class="container" data-aos="zoom-in" data-aos-delay="100">
    <img src="{{asset('images/satu-data.png')}}" height="200" width="400" alt="image">
    <p>"BERMASA" <span class="typed" data-typed-items="Bermarwah, Maju, Sejahtera"></span></p></p>

    <div class="social-links">
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="detail" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
      <form class="search-big-form no-border search-shadow" method="get" action="{{url('cari#cari')}}">
          <div class="row m-0">
            <div class="col-lg-10 col-md-5 col-sm-12">
              <div class="form-group">
              <i class="ti-search"></i>
                <input name="keyword" type="text" class="form-control b-r full-width" value="" placeholder="Pencarian Data ...">
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
              <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Pencarian</button>
            </div>
          </div>
        </form>
        <br>
        <h2>{{$dataOpd->nama}}</h2>
        <p>Data Pada {{ucfirst($dataOpd->nama)}} Kabupaten Bengkalis</p>
      </div>
      <div class="pilihtahun col-lg-12 mb-3">
        <form action="">
          <div class="row">
            <div class="col-lg-2 form-group">
              <label for="">Tahun Awal</label>
              <select name="tahunawal" id="" class="form-control form-control-sm">
                <option value="">--Pilih--</option>
                @foreach ($tahun5 as $th)
                <option value="{{$th}}">{{$th}}</option>
                @endforeach
              </select> 
            </div>
            <div class="col-lg-2 form-group">
              <label for="">Tahun Akhir</label>
              <select name="tahunakhir" id="" class="form-control form-control-sm">
                <option value="">--Pilih--</option>
                @foreach ($tahun5 as $th)
                <option value="{{$th}}">{{$th}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 pt-4">
              <button type="submit" class="btn btn-primary full-width btn-sm"><i class="bx bx-search"></i> Cari</button>
            </div>
          </div>          
        </form>
      </div>
      <div class="row">
        <div class="col-lg-12 table-wrapper-scroll-x">
            <table id="" class="table table-bordered table-hover table-striped table-responsive" style=" display: block; overflow-x: auto;">
              <thead class="bg-primary-600" style="background-color: #0a58ca; color: white;">
                  <tr>
                    <td rowspan="2" style="vertical-align : middle; text-align:center;">No</td>
                    <td rowspan="2" style="vertical-align : middle; text-align:center;">Elemen / Sub Elemen</td>
                    <td rowspan="2" style="vertical-align : middle; text-align:center;">Satuan</td>
                    <td rowspan="2" style="vertical-align : middle; text-align:center;">Produsen Data</td>
                    <td rowspan="2" style="vertical-align : middle; text-align:center;">Ketersediaan Data</td>
                    <td colspan="{{count($tahuns)}}" style="vertical-align : middle; text-align:center;">Tahun</td>
                    <td rowspan="2" style="vertical-align : middle;text-align:center;">Catatan</td>
                    <td rowspan="2" style="vertical-align : middle;text-align:center;">Grafik</td>
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
                      <td style="text-align: center;">{{$data->satuan??''}}</td>
                      <td>{{($data->opd->nama??'')}}</td>
                      <td style="text-align: center;">{{(count($data->data)>0)?'Ada':''}}</td>
                      @foreach($tahun as $th)
                        <td style="text-align: center;">{{($elemen->filterjumlah($data->id??'',$th))?(Help::desimal($elemen->filterjumlah($data->id??'',$th)->jumlah)):''}}</td>
                      @endforeach
                      <td>{{$data->keterangan??''}}</td>
                      <td>
                        @if(count($data->data)>0)
                        <a href="#modalChart" data-lightbox="inline" class="button button-large button-rounded modalChart" title="{{$data->nama??''}}" id="{{$data->id}}"><i class="fa fa-bar-chart" style="font-size:25px;color:red"></i></a>

                        @endif
                      </td>
                    </tr>
                    @php $tes=''; @endphp
                    @foreach($data->children as $key => $item)
                      @include('backend.laporan.loop')
                    @endforeach
                    @php $i++; @endphp
                  @endforeach
                </tbody>
              </table>
          </div>
          
        </div>
      </div>

    </div>
    <!-- modalChart -->
    <div class="modal1 mfp-hide" id="modalChart">
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
    </div>
  </section><!-- End About Section -->

</main><!-- End #main -->
@endsection

@push('css')
  <link rel="stylesheet" media="screen, print" href="{{url('resources/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}" type="text/css" />
@endpush
@push('js')
<script src="{{url('frontend/js/jquery.js')}}"></script>
<script src="{{url('frontend/js/plugins.min.js')}}"></script>
<script src="{{url('frontend/js/functions.js')}}"></script>
<script>
  $('#datatable').DataTable( {
    } );
</script>
<script src="{{url('frontend/js/chart.js')}}"></script>
<script src="{{url('frontend/js/chart-utils.js')}}"></script>
<script>
 $(document).on("click",".modalChart",function() {
    var id = $(this).attr('id');
    var title = $(this).attr('title');
	
    console.log(title);
    $('.title').html(title);
    $.ajax({
      type: "GET",
      url: "{{url('chart')}}/"+id,
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
                  window.chartColors.blue,
                  window.chartColors.blue,
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

</script>
@endpush
