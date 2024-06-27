<?php include "header.php"; ?>
<?php
$id = $_GET['id_wisata'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$id_wisata = "";
$nama_wisata = "";
$alamat = "";
$deskripsi = "";
$harga_tiket = "";
$lat = "";
$long = "";
foreach ($obj->results as $item) {
  $id_wisata .= $item->id_wisata;
  $nama_wisata .= $item->nama_wisata;
  $alamat .= $item->alamat;
  $deskripsi .= $item->deskripsi;
  $harga_tiket .= $item->harga_tiket;
  $lat .= $item->latitude;
  $long .= $item->longitude;
}

$title = "Detail dan Lokasi : " . $nama_wisata;
//include_once "header.php"; 
?>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAAgY3Vew0LpTLCBR_Sg98TKXrW_8Yk_4o&libraries=geometry"></script>

<script>
  function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $long ?>);
  var mapOptions = {
    zoom: 13,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">' +
    '<div id="siteNotice">' +
    '</div>' +
    '<h1 id="firstHeading" class="firstHeading"><?php echo $nama_wisata ?></h1>' +
    '<div id="bodyContent">' +
    '<p><?php echo $alamat ?></p>' +
    '</div>' +
    '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  var markerIcon = getMarkerIcon('<?php echo $nama_wisata ?>'); // Mendapatkan ikon marker berdasarkan kategori

  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: 'Maps Info',
     icon: {
        url: markerIcon,
        scaledSize: new google.maps.Size(40, 40) // Atur ukuran marker di sini
      }
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });

    document.getElementById('btnDetailRute').addEventListener('click', function() {
      var directionsService = new google.maps.DirectionsService();
      var directionsDisplay = new google.maps.DirectionsRenderer();

      var request = {
        origin: new google.maps.LatLng(-8.796186318035083, 115.1776932506282), // Ganti dengan lokasi saat ini atau koordinat yang sesuai
        destination: myLatlng,
        travelMode: google.maps.TravelMode.DRIVING
      };

      directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          directionsDisplay.setDirections(result);
          directionsDisplay.setMap(map);

          // Tampilkan petunjuk arah di dalam sidebar
          var directionsPanel = document.getElementById('directions-panel');
          directionsPanel.innerHTML = '<h2>Detail Rute</h2>';
          directionsDisplay.setPanel(directionsPanel);
        } else {
          alert('Error in finding the route');
        }
      });
    });
}

function getMarkerIcon(category) {
  // Fungsi ini mengembalikan ikon marker berdasarkan kategori wisata
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

google.maps.event.addDomListener(window, 'load', initialize);

</script>

<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Detail Informasi Geografis Wisata
        </h1>

      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container" style="padding-top: 120px;">
    <div class="row">

      <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Informasi Wisata </strong></h4>
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <!-- <th>Item</th> -->
                <th>Detail</th>
              </tr>
              <tr>
                <td>Nama Wisata</td>
                <td>
                  <h5><?php echo $nama_wisata ?></h5>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <h5><?php echo $alamat ?></h5>
                </td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td>
                  <h5><?php echo $deskripsi ?></h5>
                </td>
              </tr>
              <tr>
                <td>Harga Tiket</td>
                <td>
                  <h5>Rp. <?php echo $harga_tiket ?></h5>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-5" data-aos="zoom-in">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Lokasi</strong></h4>
          </div>
          <div class="panel-body">
            <div id="map-canvas" style="width:100%;height:380px;"></div>
            <button id="btnDetailRute" class="btn btn-primary">Detail Rute</button>
      <!-- Tambahkan div untuk menampilkan petunjuk arah di sidebar -->
      <div id="directions-panel"></div>
          </div>
        </div>
      </div>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>