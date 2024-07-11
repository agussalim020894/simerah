@extends('frontend.partials.app')
@section('content')
<!-- ======= Hero Section ======= -->
<div class="overlay-logo">
  <img id="logo-mobile" src="{{asset('images/satu-data.png')}}" alt="image">
</div>
<section id="hero" class="d-flex flex-column justify-content-center">
  <div class="container" data-aos="zoom-in" data-aos-delay="100">
    <div class="sys-logo">
      <img id="img-desktop" src="{{asset('images/satu-data.png')}}" alt="image">
      <img id="img-mobile" src="{{asset('images/Kabupaten Bengkalis Bermasa.png')}}" alt="image">
    </div>
    <p>"BERMASA" <span class="typed" data-typed-items="Bermarwah, Maju, Sejahtera"></span></p></p>
    <form class="search-big-form no-border search-shadow" method="get" action="{{url('cari#cari')}}">
			<div class="row m-0">
				<div class="col-lg-4 col-md-7 col-sm-12 p-0">
				  <div class="form-group">
				  <i class="ti-search"></i>
				    <input name="keyword" type="text" class="form-control b-r" placeholder="Pencarian Data ...">
				  </div>
				</div>
		    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
			    <button type="submit" class="btn btn-primary full-width"><i class="bx bx-search"></i> Cari</button>
			  </div>
			</div>
		</form>
    <div class="social-links">
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
    </div>
  </div>
</section>
<!-- End Hero -->

<main id="main">
<!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>SATU DATA KABUPATEN BENGKALIS</h2>
        <p>Merupakan aplikasi resmi yang menyediakan data dari Perangkat Daerah di Lingkungan Pemerintah Kabupaten Bengkalis dan Instansi lainnya di Kabupaten Bengkalis yang akurat dan akuntabel, serta memberikan kemudahan dan kebutuhan akses data untuk masyarakat dan instansi pemerintahan dengan berkualitas dan terbuka.</p>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <img src="{{asset('images/tentang.png')}}" height="200" width="400" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content">
          <h3>Tentang Satu Data</h3>
          <p class="text-justify">
          Merupakan salah satu aplikasi yang dibangun oleh Dinas Komunikasi, Informatika dan Statistik Kabupaten Bengkalis. Dibuat dengan tujuan sebagai media untuk penyajian data informasi spesifik dari Data Sektoral dan Data Spasial. 
          Aplikasi ini dikelola oleh bidang Statistik yang ada di Dinas Komunikasi, Informatika dan Statistik Kabupaten Bengkalis yang bekerjasama dengan Organisasi Perangkat Daerah (OPD) lingkup Pemerintah Kabupaten Bengkalis. 
          Diharapkan dengan adanya aplikasi Satu Data ini, bisa membantu masyarakat/akademisi/pengusaha/instansi pemerintahan dalam mendapatkan data yang valid serta up to date.
          </p>
        </div>
      </div>

    </div>
  </section>
  <!-- End About Section -->

  <!-- ======= Facts Section ======= -->
  <section id="facts" class="facts">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>STATISTIK DATA</h2>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-clipboard-data"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$data->count()}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Semua Data</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-text"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$elemen->count()}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Data Elemen</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-building"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$opd->count()}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Data Instansi/SKPD</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-ui-checks"></i>
            <span data-purecounter-start="0" data-purecounter-end="{{$wilayah->count()}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Semua Kecamatan</p>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End Facts Section -->
  
  <!-- ======= Skills Section ======= -->
  <!-- <section id="skills" class="skills section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Persentasi Keterisian Data</h2>
        <p>Satu Data menyajikan berupa perbandingan volume dari komponen data per 5 tahun belakang, berikut persentasi keterisian data 5 tahun terakhir</p>
        <p>(dari Total Data Per Tahun: - data) :</p>
      </div>

      <div class="row skills-content">

        <div class="col-lg-6">

          <div class="progress">
            <span class="skill">2017 - 1300 DATA<i class="val">(87%)</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">2018 - 1420 DATA<i class="val">(89%)</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">2019 - 1530 DATA<i class="val">(91%)</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="progress">
            <span class="skill">2020 - 1580 DATA<i class="val">(93%)</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">2021 - 1810 DATA<i class="val">97%)</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">2022 - 1980 DATA<i class="val">(99%)</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section> -->
  <!-- End Skills Section -->

  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>JENIS DATA</h2>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="resume-item pb-0">
            <h4>Data Statistik Dasar</h4>
            <p><em>Data berupa angka tentang karakteristik atau ciri khusus suatu populasi yang diperoleh dengan cara pengumpulan, pengolahan, penyajian dan analisis.</em></p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="resume-item">
            <h4>Data Geospasial</h4>
            <p><em>Data tentang lokasi geografis, dimensi atau ukuran, dan/atau karakteristik objek alam dan/atau buatan manusia yang berada di bawah, pada atau di atas permukaan bumi.</em></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Resume Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>DATA STATISTIK SEKTORAL</h2>
        <p>Data Perangkat Daerah di Lingkungan Pemerintah Kabupaten Bengkalis dan Instansi lainnya</p>
      </div>

      <div class="row">
          @foreach ($opd as $key => $data)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue card-opd mb-5">
              <ul id="pagination-demo"
              class="pagination-sm"></ul>
              <div class="icon">
                  <img src="{{$data->file->url_stream ?? ''}}" alt="" style="width: 80px;">
                </div>
              <h4><a href="{{route('opdDetail', $data->id)}}#detail">{{$data->nama}}</a></h4>
              <a href="{{route('opdDetail', $data->id)}}#detail"><button class="buttonlihat button4">Lihat Data</button></a>
              <p><i class="bx bx-map"></i> {{$data->alamat}}</p>
            </div>
          </div>
          @if($key==5)
          @php break; @endphp
          @endif
          @endforeach
      </div>

      <div class="col-lg-12 col-md-12">
				<div class="text-center">
					<a href="opdAll"><button class="buttonselengkapnya button4">Selengkapnya <i class="bi bi-arrow-right-circle"></i></button></a>
				</div>
			</div>

    </div>
  </section>
  <!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>PUBLIKASI</h2>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach($buku as $data)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          
          <div class="portfolio-wrap">
            <img src="{{$data->file ? $data->file->getFileName($data->id,'gambar')->url_stream : ''}}" width="100%" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$data->nama}}</h4>
              <div class="portfolio-links">
              <a href="{{$data->file ? url($data->file->getFileName($data->id,'buku')->url_stream) : ''}}" target="blank_">
                <i class="bx bx-download"></i>
              </a>
              </div>
            </div>
            
          </div>
        </div>
      @endforeach
      </div>

      <div class="section-title">
        <h2>MONOGRAFI</h2>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @foreach($monografi as $data)
        <div class="col-lg-3 col-md-6 portfolio-item filter-app">
          
          <div class="portfolio-wrap">
            <img src="{{$data->file ? $data->file->getFileName($data->id,'gambar')->url_stream : ''}}" width="100%" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$data->nama}}</h4>
              <div class="portfolio-links">
              <a href="{{$data->file ? url($data->file->getFileName($data->id,'buku')->url_stream) : ''}}" target="blank_">
                <i class="bx bx-download"></i>
              </a>
              </div>
            </div>
            
          </div>
        </div>
      @endforeach
      </div>

    </div>


    </div>
  </section>
  <!-- End Portfolio Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>PEJABAT PIMPINAN DAERAH</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('images/bupati.jpg')}}" class="testimonial-img" alt="">
              <h3>Kasmarni, S.Sos, MMP</h3>
              <h4>Bupati Bengkalis</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Saya Yakin Dengan Adanya Aplikasi Satu Data Kabupaten Bengkalis Ini Bisa Memberikan Kemudahan dan Kebutuhan Akses Data Untuk Masyarakat dan Instansi Pemerintahan Dengan Berkualitas dan Terbuka, Untuk Mewujudkan Bengkalis Bermarwah, Maju dan Sejahtera (BERMASA).
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('images/wabup.jpg')}}" class="testimonial-img" alt="">
              <h3>Dr. H. Bagus Santoso, MP</h3>
              <h4>Wakil Bupati Bengkalis</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Mudah-mudahan Aplikasi Satu Data Kabupaten Bengkalis Ini Bisa Memberikan Data-Data Atau Informasi Dari Perangkat Daerah Dilingkungan Pemerintah Kabupaten Bengkalis Yang Akurat, Akuntabel dan Transparan dalam mendukung terwujudnya Kabupaten Bengkalis Bermarwah, Maju dan Sejahtera (BERMASA).
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('images/pltsekda.png')}}" class="testimonial-img" alt="">
              <h3>dr. Ersan Saputra, TH</h3>
              <h4>Plt. Sekretaris Daerah</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Semoga Dengan Aplikasi Satu Data Kabupaten Bengkalis Bisa Menyediakan Data-data Dari Perangkat Daerah Di Lingkungan Pemerintah Kabupaten Bengkalis Yang Bisa Memberikan Informasi Kepada Masyarakat Banyak Demi Mewujudkan Kabupaten Bengkalis Bermarwah, Maju dan Sejahtera (BERMASA).
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('images/kadis.jpg')}}" class="testimonial-img" alt="">
              <h3>Hendrik Dwi Yatmoko, S.Sos, MT</h3>
              <h4>Kepala Dinas Komunikasi Informatika dan Statistik</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Aplikasi Satu Data Yang Dibuat Bidang Pengelolaan Berbasis Elektronik Di Dinas Komunikasi Informatika dan Statistik Akan Terus Berupaya Memberikan Yang Terbaik Dalam Mendukung Terwujudnya Visi dan Misi Kabupaten Bengkalis dan Mewujudkan Kabupaten Bengkalis Bermarwah, Maju dan Sejahtera (BERMASA).
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('images/kabid.jpg')}}" class="testimonial-img" alt="">
              <h3>Azmar, S.Kom, MIP</h3>
              <h4>Kepala Bidang Statistik dan Persandian</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Aplikasi Satu Data Yang Kami Kelola Akan Memberikan Data-Data Dari Perangkat Daerah Di Lingkungan Pemerintah Kabupaten Bengkalis Yang Akurat dan Akuntabel, Serta Memberikan Kemudahan dan Kebutuhan Akses Data Untuk Masyarakat dan Instansi Pemerintahan Dengan Berkualitas dan Terbuka.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>
  <!-- End Testimonials Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>KONTAK KAMI</h2>
      </div>

      <div class="row mt-1">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Alamat:</h4>
              <p>Jl. Kartini No. 012 Kode Pos 28712 Bengkalis Riau</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>diskominfotik@bengkaliskab.go.id</p>
            </div>

            <div class="phone">
              <i class="bi bi-globe"></i>
              <h4>Website:</h4>
              <p>satudata.bengkaliskab.go.id</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          <iframe style="border-radius:5px;width:100%;height:250px;margin:0px;padding:0px;border:1px solid #0880e8;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.5100263836557!2d102.10877601475414!3d1.4673225989298937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15fb61176003d%3A0x69600c0570fcb2a2!2sDinas%20Komunikasi%2C%20Informatika%20Dan%20Statistik%20Kabupaten%20Bengkalis!5e0!3m2!1sid!2sid!4v1673957591465!5m2!1sid!2sid" allowfullscreen="" aria-hidden="false"></iframe>
        </div>

      </div>

    </div>
  </section>
  <!-- End Contact Section -->

</main>
<!-- End #main -->
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