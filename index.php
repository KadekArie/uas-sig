<?php include "header.php"; ?>

<!-- start banner Area -->
<section class="banner-area relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row fullscreen align-items-center justify-content-between">
      <div class="col-lg-6 col-md-6 banner-left">
        <h6 class="text-white">SISTEM INFORMASI GEOGRAFIS WISATA</h6>
        <h1 class="text-white">KOTA DENPASAR</h1>
        <p class="text-white">
          Sistem informasi ini merupakan aplikasi pemetaan geografis tempat wisata di Kota Denpasar. Aplikasi ini merupakan projek UAS Matakuliah SIG Teknik Elektro, Udayana 2024.
        </p>
        <a href="#peta_wisata" class="primary-btn text-uppercase">Lihat Peta</a>
      </div>

    </div>
  </div>
  </div>
</section>
<!-- End banner Area -->


<main id="main">

      <!-- Start popular-destination Area -->
<section class="popular-destination-area section-gap">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="menu-content pb-70 col-lg-8">
        <div class="title text-center">
          <h1 class="mb-10">Destinasi Populer</h1>
          <p>Temukan Pesona Denpasar dengan Beragam Wisata yang Menginspirasi!</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="single-destination relative">
          <div class="thumb relative">
            <div class="overlay overlay-bg"></div>
            <img class="img-fluid" src="img/img1.jpg" alt="">
          </div>
          <div class="desc">
            <a href="detail.php?id_wisata=53" class="price-btn">Gratis</a>
            <h4>Pantai Sanur</h4>
            <p>Tenang, Indah, Eksotis!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="single-destination relative">
          <div class="thumb relative">
            <div class="overlay overlay-bg"></div>
            <img class="img-fluid" src="img/img2.jpg" alt="">
          </div>
          <div class="desc">
            <a href="detail.php?id_wisata=54" class="price-btn">Rp50.000</a>
            <h4>Monumen Bajra Sandhi</h4>
            <p>Megah, Bersejarah, Ikonik!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="single-destination relative">
          <div class="thumb relative">
            <div class="overlay overlay-bg"></div>
            <img class="img-fluid" src="img/img3.jpg" alt="">
          </div>
          <div class="desc">
            <a href="detail.php?id_wisata=67" class="price-btn">Rp250.000</a>
            <h4>Bali Camel Ride</h4>
            <p>Unta, Berkesan, Seru!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End popular-destination Area -->


<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container">
    <div class="row counters">

      <?php
      include_once "countpantai.php";
      $obj = json_decode($data);
      $wpantai = "";
      foreach ($obj->results as $item) {
        $wpantai .= $item->pantai;
      }
      ?>
      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up"><?php echo $wpantai; ?></span>
        <p><br>Wisata Pantai</p>
      </div>

      <?php
      include_once "countmuseum.php";
      $obj = json_decode($data);
      $wmuseum = "";
      foreach ($obj->results as $item) {
        $wmuseum .= $item->museum;
      }
      ?>
      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up"><?php echo $wmuseum; ?></span>
        <p><br>Wisata Museum</p>
      </div>

      <?php
      include_once "counttaman.php";
      $obj = json_decode($data);
      $wtaman = "";
      foreach ($obj->results as $item) {
        $wtaman .= $item->taman;
      }
      ?>
      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up"><?php echo $wtaman; ?></span>
        <p><br>Wisata Taman</p>
      </div>

      <?php
      include_once "countlain.php";
      $obj = json_decode($data);
      $wlain = "";
      foreach ($obj->results as $item) {
        $wlain .= $item->lain;
      }
      ?>
      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up"><?php echo $wlain; ?></span>
        <p><br>Wisata Lainnya</p>
      </div>

    </div>
  </div>
</section><!-- End Counts Section -->



  <!-- Start about-info Area -->
  <section class="price-area">

    <section id="peta_wisata" class="about-info-area">
      <div class="container">

        <div class="title text-center">
          <h1 class="mb-10">Peta Lokasi Wisata</h1>
          <br>
        </div>

        <div class="row align-items-center">

          <div id="map" style="width:100%;height:480px;"></div>
          <script src="https://maps.google.com/maps/api/js?key=AIzaSyAAgY3Vew0LpTLCBR_Sg98TKXrW_8Yk_4o&libraries=geometry"></script>

          <script type="text/javascript">
            function initialize() {

              var mapOptions = {
                zoom: 11.8,
                center: new google.maps.LatLng(-8.656488,115.211177),
                disableDefaultUI: false
              };

              var mapElement = document.getElementById('map');

              var map = new google.maps.Map(mapElement, mapOptions);

              setMarkers(map, officeLocations);

            }

            var officeLocations = [
              <?php
              $data = file_get_contents('http://localhost/SIG-WISATA/ambildata.php');
              $no = 1;
              if (json_decode($data, true)) {
                $obj = json_decode($data);
                foreach ($obj->results as $item) {
              ?>[<?php echo $item->id_wisata ?>, '<?php echo $item->nama_wisata ?>', '<?php echo $item->alamat ?>', <?php echo $item->longitude ?>, <?php echo $item->latitude ?>],
              <?php
                }
              }
              ?>
            ];

function setMarkers(map, locations) {
  for (var i = 0; i < locations.length; i++) {
    var office = locations[i];
    var myLatLng = new google.maps.LatLng(office[4], office[3]);
    var contentString =
      '<div id="content">' +
      '<div id="siteNotice">' +
      '</div>' +
      '<h5 id="firstHeading" class="firstHeading">' + office[1] + '</h5>' +
      '<div id="bodyContent">' +
      '<a href=detail.php?id_wisata=' + office[0] + '>Info Detail</a>' +
      '</div>' +
      '</div>';

    var markerIcon = getMarkerIcon(office[1]); // Mendapatkan ikon marker berdasarkan kategori

    // Menyesuaikan ukuran gambar marker (misalnya 32x32 piksel)
    var iconSize = new google.maps.Size(32, 32);
    var scaledIcon = {
      url: markerIcon,
      scaledSize: iconSize
    };

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: office[1],
      icon: scaledIcon // Menggunakan ikon dengan ukuran yang sudah diatur
    });

    // Menambahkan event listener untuk menampilkan info window ketika marker diklik
    google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
  }
}

function getMarkerIcon(category) {
  // Fungsi ini mengembalikan path gambar marker berdasarkan kategori wisata
  // Sesuaikan dengan kategori yang ada di database
  if (category.toLowerCase().includes('pantai')) {
    return 'img/markerpantai.png'; // Contoh: marker untuk Pantai
  } else if (category.toLowerCase().includes('museum')) {
    return 'img/markermuseum.png'; // Contoh: marker untuk Museum
  } else if (category.toLowerCase().includes('taman')) {
    return 'img/markertaman.png'; // Contoh: marker untuk Taman
  } else {
    return 'img/markerlain.png'; // Jika kategori tidak cocok, gunakan marker umum
  }
}



            function getInfoCallback(map, content) {
              var infowindow = new google.maps.InfoWindow({
                content: content
              });
              return function() {
                infowindow.setContent(content);
                infowindow.open(map, this);
              };
            }

            initialize();
          </script>

        </div>


      </div>
    </section>
    <!-- End about-info Area -->

    </div>
  </section>
  <!-- End testimonial Area -->


  <?php include "footer.php"; ?>