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
            <div class="col-lg-10 col-md-5 col-sm-12 p-0">
              <div class="form-group">
              <i class="ti-search"></i>
                <input name="keyword" type="text" class="form-control b-r" value="{{$keyword??''}}" placeholder="Pencarian Data ...">
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12 p-0">
              <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Pencarian</button>
            </div>
          </div>
        </form>
        <h2></h2>
        <h5>{{$keyword?($count.' hasil pencarian data tentang '.$keyword):''}}</h5>
      </div>

      <div class="row pb-5">
        <div class="col-lg-12 pt-4 pt-lg-0 pb-2">
          @if($elemen->count() > 0)<h4>Elemen</h4>@endif
        <ul>
          @foreach($elemen as $data)
          <li>
            <a href="{{url('caridetail/'.$data->id)}}#cari" class="text-primary">
              {{$data->nama}}
            </a>
          </li>
          @endforeach
        </ul>
        </div>
        <div class="col-lg-12 pt-4 pt-lg-0 pb-2">
          @if($subelemen->count() > 0)<h4>Sub Elemen</h4>@endif
        <ul>
          @foreach($subelemen as $data)
          <li>
            <a href="{{url('caridetail/'.$data->id)}}#cari" class="text-primary">
              {{$data->nama}}
            </a>
          </li>
          @endforeach
        </ul>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

</main><!-- End #main -->
@endsection
