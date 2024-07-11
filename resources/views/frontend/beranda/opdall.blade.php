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

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
        <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h2>SEMUA DATA STATISTIK SEKTORAL</h2>
        <marquee width="600" height="40"><p>Data Perangkat Daerah di Lingkungan Pemerintah Kabupaten Bengkalis dan Instansi lainnya</p></marquee>
        <br>

        <div class="row">
        {{-- @for ($i=1; $i<10; $i++) --}}
          @foreach ($opd as $data)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue card-opd mb-5">
              <ul id="pagination-demo"
              class="pagination-sm"></ul>
              <div class="icon">
                  {{-- <i class="bx bx-file"></i> --}}
                  <img src="{{$data->file->url_stream ?? ''}}" alt="" style="width: 80px;">
                </div>
              <h4><a href="{{route('opdDetail', $data->id)}}#detail">{{$data->nama}}</a></h4>
              <a href="{{route('opdDetail', $data->id)}}#detail"><button class="buttonlihat button4">Lihat Data</button></a>
              <p><i class="bx bx-map"></i> {{$data->alamat}}</p>
            </div>
          </div>
          @endforeach
        {{-- @endfor --}}
      </div>
    </div>
  </section>
  <!-- End Services Section -->
  </section>

</main><!-- End #main -->
@endsection

@push('css')
  <style>
    .card-opd{
      width: 350px;
    }

    @media screen and (max-width: 430px){
      .card-opd{
      margin: auto;
      }
    }
  </style>
@endpush