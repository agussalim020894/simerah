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
  <section id="cari" class="about">
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
        <h2>{{$datas->opd->nama}}</h2>
        <h5>{!!$nama!!}</h5>
      </div>

      <div class="row pb-5">
        <div class="col-lg-12 pt-4 pt-lg-0 pb-2 text-right">
          <a href="{{url('/export/'.$datas->id)}}" class="btn btn-primary">Export to excel</a>
        </div>
        <div class="col-lg-12 pt-4 pt-lg-0 pb-2">
        <table id="datatable" class="table table-bordered table-hover table-striped table-responsive" style=" display: block; overflow-x: auto;">
            <thead class="bg-primary-600" style="background-color: #0a58ca; color: white;">
            <tr>
              <td rowspan="2" style="vertical-align : middle;text-align:center;">No</td>
              <td rowspan="2" style="vertical-align : middle;text-align:center;">Elemen / Sub Elemen</td>
              <td rowspan="2" style="vertical-align : middle;text-align:center;">Satuan</td>
              <td rowspan="2" style="vertical-align : middle;text-align:center;">Produsen Data</td>
              <td rowspan="2" style="vertical-align : middle;text-align:center;">Ketersediaan Data</td>
              <td colspan="{{count($tahuns)}}" style="vertical-align : middle;text-align:center;">Tahun</td>
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
              <tr>
                <td style="font-weight: bold; text-align: center;">1</td>
                <td style="font-weight: bold;">{{$datas->nama??''}}</td>
                <td>{{$datas->satuan??''}}</td>
                <td>{{($datas->opd->nama??'')}}</td>
                <td>{{(count($datas->data)>0)?'Ada':''}}</td>
                @foreach($tahun as $th)
                  <td>{{($elemen->filterjumlah($datas->id??'',$th))?(Help::desimal($elemen->filterjumlah($datas->id??'',$th)->jumlah)):''}}</td>
                @endforeach
                <td>{{$datas->keterangan??''}}</td>
                <td>
                  @if(count($datas->data)>0)
                    <a href="#modalChart" data-lightbox="inline" class="button button-large button-rounded modalChart" title="{{$datas->nama??''}}" id="{{$datas->id}}"><i class="fa fa-bar-chart" style="font-size:25px;color:red"></i></a>
                  @endif
                </td>
              </tr>
              @php $tes=''; @endphp
              @foreach($datas->children as $key => $item)
                @include('frontend.beranda.cari.loop')
              @endforeach
          </tbody>
        </table>
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
<style>
  body {
    font-family: Roboto,"Helvetica Neue",Helvetica,Arial;
    font-size: .8125rem;
    letter-spacing: .1px;
    line-height: 1.47;
}
  .bg-primary-600 {
    background-color: #7a59ad;
    color: #fff;
  }
  .table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
  }
  .table-bordered td, .table-bordered th {
  border: 1px solid rgba(0,0,0,.1);
    /* border: 1px solid #e9e9e9; */
}
.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.btn-primary {
    -webkit-box-shadow: 0 2px 6px 0 rgba(136, 106, 181, .5);
    box-shadow: 0 2px 6px 0 rgba(136, 106, 181, .5);
    color: #fff;
}

.btn-info {
    -webkit-box-shadow: 0 2px 6px 0 rgba(33, 150, 243, .5);
    box-shadow: 0 2px 6px 0 rgba(33, 150, 243, .5);
    color: #fff;
}
.text-right {
    text-align: right!important;
}
section {
    padding: 60px 0;
    overflow: hidden;
}

</style>
{{-- <link rel="stylesheet" media="screen, print" href="{{url('backend/css/vendors.bundle.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{url('backend/css/app.bundle.css')}}"> --}}
    <link rel="stylesheet" media="screen, print" href="{{url('resources/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('frontend/css/magnific-popup.css')}}" type="text/css" />
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
                backgroundColor: window.chartColors.green,
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