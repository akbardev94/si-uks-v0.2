<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>SI-UKS</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>assets/img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel=" stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/highchart.css" rel="stylesheet">

</head>
<script src="assets/js/highchart/highcharts.js"></script>
<script src="assets/js/highchart/exporting.js"></script>
<script src="assets/js/highchart/export-data.js"></script>
<script src="assets/js/highchart/accessibility.js"></script>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">
      <div class="bg">
        <div class="logo float-left">
          <!-- Uncomment below if you prefer to use an image logo -->

          <h1 class="text-light"><img src="assets/img/sdimh.png" class="mb-3"><a href="#intro" class="scrollto"><span class="ml-3 mb-2">SI-UKS</span></a></h1>
          <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
          <ul>
            <li class="active"><a href="#intro">Home</a></li>
            <li><a href="#about">Chart</a></li>
            <li><a href="#portfolio">About</a></li>
            <li><a href="#footer">Contact Us</a></li>
            <li><a href="<?= base_url('auth') ?>" class="btn success">Login</a>
            </li>
          </ul>
        </nav><!-- .main-nav -->
      </div>
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
          <h2 class="text-responsive">Ini merupakan<br>website halaman depan <span>Sistem Informasi UKS</span></h2>
          <div>
            <a href="#portfolio" class="btn-get-started scrollto">Read More</a>
            <div class="social-links ml-1 mt-2 fa-2x">
              <a href="#" class="twitter mr-2"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook mr-2"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram mr-2"><i class="fa fa-instagram"></i></a>
              <a href="#" class="youtube mr-2"><i class="fa fa-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="assets/img/asset2.png" alt="Responsive-image" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <!--==========================
      About Us Section
    ============================-->
  <section id="about" class="chart">
    <h1 class="text-center font-weight-bolder">Grafik Kesehatan Siswa</h1>
    <figure class="highcharts-figure">
      <div id="container"></div>
      <p class="highcharts-description">
        <script>
          Highcharts.chart('container', {
            chart: {
              type: 'column'
            },
            title: {
              text: 'Review Tahun 2019'
            },
            subtitle: {
              text: 'Source: SI-UKS'
            },
            xAxis: {
              categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
              ],
              crosshair: true
            },
            yAxis: {
              min: 0,
              title: {
                text: 'Jumlah Siswa'
              }
            },
            tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} siswa</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
            },
            plotOptions: {
              column: {
                pointPadding: 0.2,
                borderWidth: 0
              }
            },
            series: [{
              name: 'Sehat',
              data: [420, 430, 400, 436, 436, 390, 436, 415, 422, 424, 425, 431]

            }, {
              name: 'Tidak Sehat',
              data: [16, 6, 36, 0, 0, 46, 0, 21, 14, 12, 9, 5]

            }]
          });
        </script>
        <h4 class="text-justify">Grafik diatas merupakan grafik kesehatan siswa di tahun 2019 dan selalu terupdate tiap
          1 sampai 2 bulan sekali. Sesuai dengan dasar yang di berikan oleh PUKESMAS dan Dinas
          Kesehatan.</h4>
      </p>
    </figure>


  </section><!-- #chart -->

  <!--==========================
      About Section
    ============================-->
  <section id="portfolio" class="section-bg">
    <div class="container">
      <header class="section-header">
        <h3 class="section-title">Our About</h3>
      </header>
      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Foto</li>
            <li data-filter=".filter-card">Kegiatan</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/img2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><a href="#">Foto 1</a></h4>
              <p>Foto</p>
              <div>
                <a href="assets/img/portfolio/img2.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/img1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><a href="#">Foto 2</a></h4>
              <p>Foto</p>
              <div>
                <a href="assets/img/portfolio/img1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/img3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><a href="#">Foto 3</a></h4>
              <p>Foto</p>
              <div>
                <a href="assets/img/portfolio/img3.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- #about -->

  <!--==========================
      Pricing Section
    ============================-->
  <section id="pricing" class="wow fadeInUp section-bg">

    <div class="container">

      <header class="section-header">
        <h3>LAYANAN KESEHATAN</h3>
        <p>Ini merupakan pilihan layanan kesehatan terpadu jika siswa mengalami keluhan</p>
      </header>

      <div class="row flex-items-xs-middle flex-items-xs-center">

        <!-- Klinik  -->
        <div class="col-xs-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>KLINIK</h4>
            </div>
            <div class="card-block">
              <a href="https://klinikbungamelati.com/" class="btn">Pilih</a>
            </div>
          </div>
        </div>

        <!-- Pukesmas  -->
        <div class="col-xs-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>PUKESMAS</h4>
            </div>
            <div class="card-block">
              <a href="https://puskkendalsari.malangkota.go.id/jenis-pelayanan/" class="btn">Pilih</a>
            </div>
          </div>
        </div>

        <!-- Rumah Sakit  -->
        <div class="col-xs-12 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>RUMAH SAKIT</h4>
            </div>
            <div class="card-block">
              <a href="https://www.rsusaifulanwarjatimprov.web.id/" class="btn">Pilih</a>
            </div>
          </div>
        </div>

      </div>
    </div>

  </section><!-- # -->

  <!--==========================
      Frequently Asked Questions Section
    ============================-->
  <section id="faq">
    <div class="container">
      <header class="section-header">
        <h3>Pertanyaan yang sering diajukan</h3>
        <p>Ini merupakan pertanyaan yang orang tanyakan tentang UKS</p>
      </header>

      <ul id="faq-list" class="wow fadeInUp">
        <li>
          <a data-toggle="collapse" class="collapsed" href="#faq1">Apakah yang dimaksud UKS? <i class="ion-android-remove"></i></a>
          <div id="faq1" class="collapse" data-parent="#faq-list">
            <p>
              Usaha kesehatan sekolah atau UKS adalah suatu usaha yang dilakukan pihak sekolah dan pihak-pihak yang terkait untuk meningkatkan pola hidup sehat serta derajat kesehatan warga sekolah.
            </p>
          </div>
        </li>

        <li>
          <a data-toggle="collapse" href="#faq2" class="collapsed">Apakah tujuan UKS ? <i class="ion-android-remove"></i></a>
          <div id="faq2" class="collapse" data-parent="#faq-list">
            <p>
              1. Untuk menyelenggarakan pendidikan yang bermutu.
              <br>2. Diharapkan dapat memberikan ilmu pengetahuan, sikap, serta keterampilan sehingga mereka (warga sekolah, utamanya anak-anak), dapat menjalankan prinsip-prinsip hidup sehat.
              <br>3. Melalui prinsip-prinsip hidup sehat yang dimilki, siswa akan mampu menangkal segala pengaruh-pengaruh yang datang dari lingkungannya agar selalu terhindar dari penyalahgunaan narkotika, minuman keras, obat-obat terlarang, kebiasaan merokok, dan berbagai hal lain yang tentunya akan berdampak buruk bagi kesehatan mereka pribadi.
            </p>
          </div>
        </li>

        <li>
          <a data-toggle="collapse" href="#faq3" class="collapsed">Siapa saja sasaran dari UKS ?<i class="ion-android-remove"></i></a>
          <div id="faq3" class="collapse" data-parent="#faq-list">
            <p>
              Semua siswa dari jenjang terendah (TK/RA) hingga siswa pada sekolah jenjang atas (SMA/MA/SMK) merupakan sasaran utama dari program UKS di sekolah.
            </p>
          </div>
        </li>

        <li>
          <a data-toggle="collapse" href="#faq4" class="collapsed">Apa yang dimaksud TRIAS UKS ( 3 program utama UKS) ! sebutkan ? <i class="ion-android-remove"></i></a>
          <div id="faq4" class="collapse" data-parent="#faq-list">
            <p>
              Ketiga program pokok UKS itu adalah:
              <br>(1) melakukan pendidikan kesehatan;
              <br>(2) melakukan pelayanan kesehatan; dan
              <br>(3) melakukan pembinaan sekolah sehat.
            </p>
          </div>
        </li>

      </ul>

    </div>
  </section><!-- # -->

  </main>

  <!--==========================
      Clients Section
    ============================-->
  <section id="clients" class="wow fadeInUp">
    <div class="container">

      <header class="section-header">
        <h3>Support By</h3>
      </header>
      <div class="owl-carousel clients-carousel">
        <img src="assets/img/clients/client-1.png" alt="">
        <img src="assets/img/clients/client-2.png" height="90px" alt="">
        <img src="assets/img/clients/client-3.png" alt="">
        <img src="assets/img/clients/client-4.png" height="100px" alt="">

      </div>

    </div>
  </section><!-- #clients -->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">


        <div class="row">

          <div class="col-lg-6">

            <div class="form">

              <h4>Send us a message</h4>
              <p>Jika ada kritik dan saran bisa menggunakan formulir pesan dibawah ini</p>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>

                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>

          </div>

          <div class="col-lg-6">

            <div class="row">

              <div class="col-sm-6">
                <div class="footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Chart</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                  </ul>
                </div>

                <div class="footer-links">
                  <h4>Contact Us</h4>
                  <p>
                    Simpang Flamboyan Street No.30 <br>
                    Malang, 65163<br>
                    Jawa Timur <br>
                    <strong>Phone:</strong> +62 431 413 003<br>
                    <strong>Email:</strong> admsdimh@gmail.com<br>
                  </p>
                </div>

                <div class="social-links">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Anas</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="assets/lib/jquery/jquery.min.js"></script>
  <script src="assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/lib/easing/easing.min.js"></script>
  <script src="assets/lib/mobile-nav/mobile-nav.js"></script>
  <script src="assets/lib/wow/wow.min.js"></script>
  <script src="assets/lib/waypoints/waypoints.min.js"></script>
  <script src="assets/lib/counterup/counterup.min.js"></script>
  <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="assets/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="assets/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="assets/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/chart.js"></script>

  <!-- Chart Demo -->
  <script src="assets/js/demo/chart-area-demo.js"></script>

</body>

</html>