@extends('user.layouts.app')

@section('content')
<!--================Hero Banner Area Start =================-->
<section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
          <h1>Program Bantuan Masa COVID-19</h1>
          <p>Program bantuan yang disiapkan khusus oleh pemerintah untuk menjangkau program kesejahteraan rakyat pada masa COVID-19, melalui pemberian bantuan sosial pada masyarakat. Bantuan ini diberikan untuk memenuhi dan menjamin kebutuhan dasar serta meningkatkan taraf hidup penerima bansos.</p>
          <a class="button button-hero mt-4" href="#jenisBantuan">Lihat Bantuan</a>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
          <img class="objectAnimate img-fluid" src="{{ asset('asset/images/bantuan.png')}}" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->


  <!--================Service Area Start =================-->
  <section class="section-margin generic-margin">
    <div id="jenisBantuan" class="container">
      <div class="section-intro text-center pb-90px">
        <img class="section-intro-img" src="{{ asset('asset/images/helping-hand.png') }}" width="70"  alt="">
        <h2>Program Bantuan Yang Tersedia</h2>
        <p>program-program yang disediakan pemerintah</p>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 py-2">
          <div class="service-card text-center" style="height: 450px;">
            <img class="img-fluid" src="{{ asset('asset/images/sembako.png') }}" width="200" alt="">
            <div class="service-card-body">
              <h3>Sembako</h3>
              <p>
                Bantuan sosial berupa paket sembako dikucurkan sejak awal pandemi Covid-19.
                Bantuan ini diberikan bagi warga di DKI Jakarta dan wilayah sekitarnya, yakni Bogor, Depok, Tangerang, Tangerang Selatan, dan Bekasi.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 py-2">
          <div class="service-card text-center" style="height: 450px;">
            <img class="img-fluid" src="{{ asset('asset/images/raskin.png') }}" width="200" alt="">
            <div class="service-card-body">
              <h3>Raskin</h3>
              <p>
                program bantuan pangan bersyarat diselenggarakan oleh Pemerintah Indonesia berupa penjualan beras di bawah harga pasar kepada penerima tertentu.
                RASKIN yang bertujuan untuk memperkuat ketahanan pangan rumah tangga terutama rumah tangga miskin.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 py-2">
          <div class="service-card text-center" style="height: 450px;">
            <img class="img-fluid" src="{{ asset('asset/images/blt.png') }}" width="200" alt="">
            <div class="service-card-body">
              <h3>BLT</h3>
              <p>
                Bantuan ini diberikan bagi warga terdampak Covid-19 baik yang sudah atau belum masuk dalam Data Terpadu Kesejahteraan Sosial (DTKS) milik Kementerian Sosial (Kemensos).
                Bantuan ini diberikan bagi warga di luar JABODETABEK.
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 py-2">
          <div class="service-card text-center" style="height: 450px;">
            <img class="img-fluid" src="{{ asset('asset/images/pnpmm.png') }}" width="200" alt="">
            <div class="service-card-body">
              <h3>PNPM Mandiri</h3>
              <p>
                program nasional dalam wujud kerangka kebijakan sebagai dasar dan acuan pelaksanaan program-program penanggulangan kemiskinan berbasis pemberdayaan masyarakat. 
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 py-2">
          <div class="service-card text-center" style="height: 450px;">
            <img class="img-fluid" src="{{ asset('asset/images/coming_soon.png') }}" width="200" alt="">
            <div class="service-card-body">
              <h3>•••</h3>
              <p>
                Coming Soon
              </p>
            </div>
          </div>
        </div> 

      </div>
    </div>
  </section>
  <!--================Service Area End =================-->


  <!--================About Area Start =================-->
  <section class="bg-gray section-padding magic-ball magic-ball-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-6 mb-4 mb-md-0">
          <div class="about-img">
            <img class="img-fluid objectAnimate" src="{{ asset('asset/images/progress.png') }}" alt="" style="margin-bottom: -350px !important">
          </div>
        </div>
        <div class="col-lg-5 col-md-6 align-self-center about-content">
          <h2>Tahapan Program <br class="d-none d-xl-block"></h2>
          <p>Tahapan proses bantuan disesuaikan sesuai program masing-masing. Data penduduk yang menerima bantuan akan didata oleh RT masing-masing kemudian diseleksi oleh petugas kelurahan masing-masing</p>
        </div>
      </div>
    </div>
  </section>
  <!--================About Area End =================-->

  <!--================Search Package section Start =================-->
  <section class="section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 align-self-center mb-5 mb-lg-0">
          <div class="search-content">
            <h2>Ada permasalahaan?<br class="d-none d-xl-block"></h2>
            <p class="text-justify">Kirimkan pengaduan Anda terkait bantuan dinas sosial di sini, kami akan menghubungi paling lambat 2x24jam setelah pesan diterima.</p>
          </div>
        </div>

        <div class="col-lg-8 offset-xl-1">
          <div class="search-wrapper">
            <h3>Kirimkan Pengaduan</h3>

            <form action="{{Route('tambahPengaduan')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group text-nowrap">
                <label class="float-left" for="email">Email Anda :</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="email" placeholder="Masukkan email Anda...">
                </div>
              </div>

              <div class="form-group"> 
                <label class="float-left" for="attachment">Jelaskan keluhan Anda :</label>
                <div class="input-group">
                  <textarea name="keterangan" id="keterangan" cols="100vw" rows="10" placeholder="Jelaskan keluhan Anda..."> </textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="float-left" for="attachment">Tambahkan dokumen pendukung :</label>
                <div class="input-group">
                  <input id="attachment" type="file" class="form-control bg-transparent" name="attachment" accept="application/pdf" style="border: transparent">
                </div>
                <small class="float-left">*dokumen yang diterima adalah dokumen dengan ekstensi .pdf</small>
              </div>
              
              <div class="form-group">
                <button class="button border-0 mt-3" type="submit">Kirim Pengaduan</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--================Search Package section End =================-->


  <!--================Blog section Start =================-->
  <section class="section-padding bg-gray">
    <div class="container">
      <div class="section-intro text-center pb-90px">
        <img class="section-intro-img" src="{{ asset('asset/images/news.png') }}" width="100" alt="">
        <h2>Artikel terbaru</h2>
        <p>Artikel yang baru saja terbit terkait bantuan</p>
      </div>

      <div class="row">
        @foreach($artikel as $data)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card-blog">
              <img class="card-img rounded-0 " src="{{asset(explode(', ',$data->image)[1])}}" height="200"  style="object-fit:cover;" alt="">
              <div class="card-blog-body" style="max-width: 300px !important; height:350px">
                <a href="#">
                  <h4>{{$data->judul}}</h4>
                </a>
                <ul class="card-blog-info">
                  <li><a href="#"><span class="align-middle"><i class="ti-notepad"></i></span>{{explode("-",explode(" ", $data->created_at)[0])[2]}} {{explode("-",explode(" ", $data->created_at)[0])[1]}} {{explode("-",explode(" ", $data->created_at)[0])[0]}}</a></li>
                </ul>
                <p style="width: 250px"> {{str_split($data->content, 200)[0]}}...</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--================Blog section End =================-->
@endsection

@section('script')
	<script>
		$(document).ready(function() {
		});
	</script>
@endsection