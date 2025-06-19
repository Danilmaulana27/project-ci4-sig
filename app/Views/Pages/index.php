<?= $this->extend('Pages/Layout/template'); ?>

<?= $this->section('content'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keyfwords">
  <title><?= $title ?></title>

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

  <!-- Leaflet JavaScript -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script src="https://unpkg.com/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

</head>

<body>

  <!-- Judul Section -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>SISTEM INFORMASI GEOGRAFIS</h1>
      <h1>PEMETAAN BANTUAN KEGIATAN</h1>
      <h2>SEKRETARIAT DAERAH KABUPATEN SUBANG</h2>
      <!-- <a href="#services" class="btn-get-started scrollto">Mulai</a> -->
    </div>
  </section>
  <!-- End Judul -->

  <main id="main">

    <!-- Garis Section -->
    <section id="clients" class="clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-3 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <img src="/assets/img/client-1.png" class="img-fluid" alt="" style="opacity: 0;">
          </div>
        </div>
      </div>
    </section>
    <!-- End Garis Section -->

    <!-- About Section -->
    <section id="about" class="about">
      <div class="container">
        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <h2>PEMETAAN BANTUAN KEGIATAN DI SETDA KABUPATEN SUBANG</h2>
            <h5>Sistem Informasi Geografis adalah teknologi yang memungkinkan kita untuk memvisualisasikan, memahami, mempertanyakan, dan menganalisis data geografis dalam cara yang mengungkapkan hubungan, pola, dan tren. Dengan SIG, kami dapat memperbaiki kualitas layanan kami kepada masyarakat Kabupaten Subang dengan memastikan bantuan sosial dan hibah sampai ke lokasi yang tepat dan dibutuhkan.</h5>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <ul>
              <p>Visi</p>
              <li><i class="ri-check-double-line"></i> Menjadi pionir dalam penggunaan Sistem Informasi Geografis untuk transformasi digital dalam distribusi bantuan sosial dan hibah di Kabupaten Subang.</li>
            </ul>
            <ul>
              <p>Misi</p>
              <li><i class="ri-check-double-line"></i> Mengintegrasikan data geospasial dalam proses pengambilan keputusan dan distribusi bantuan sosial dan hibah.</li>
              <li><i class="ri-check-double-line"></i> Meningkatkan transparansi dan akuntabilitas melalui visualisasi data yang efektif.</li>
              <li><i class="ri-check-double-line"></i> Mendorong inovasi dan kolaborasi melalui pertukaran data dan ide.</li>
            </ul>
            <p class="font-italic">
              Informasi dapat berubah sewaktu-waktu
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- Jumlah Survei Section -->
    <section id="counts" class="counts">
      <div class="container">
        <div class="row counters">
          <div class="col-lg-3 col-6 text-center" style="opacity: 0;"></div>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $jumlahSudahDiSurvei; ?></span>
            <p>Sudah di Survei</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $jumlahBelumDiSurvei; ?></span>
            <p>Belum di Survei</p>
          </div>
          <div class="col-lg-3 col-6 text-center" style="opacity: 0;"></div>
        </div>
      </div>
    </section>
    <!-- End Jumlah Survei Section -->

    <!-- Cta Section  -->
    <section id="cta" class="cta">
      <div class="container">
        <div class="text-center" data-aos="zoom-in">
          <h3>SIG PEMETAAN BANTUAN KEGIATAN DI SETDA KABUPATEN SUBANG</h3>
          <p> Detail tempat yang di berikan bantuan di Kabupaten Subang</p>
          <a class="cta-btn" href="#portfolio">Lihat Detail</a>
        </div>
      </div>
    </section>
    <!-- End Cta Section -->

    <!-- Map Section -->
    <section id="services" class="services section-bg">
      <div class="container">
        <div class="text-center" data-aos="zoom-in">
          <h3 style="font-weight: bold; text-transform: uppercase;">Peta</h3>
        </div>
        <div class="panel-body" style="align-content: center;">
          <div id="map" style="width: 100%; height: 480px;"></div>

          <!-- Petunjuk Marker -->
          <div id="legend">
            <div class="legend-item">
              <img src="/img/marker-hijau.png" class="marker-hijau" alt="Marker Hijau"> Sudah di Survei
            </div>
            <div class="legend-item">
              <img src="/img/marker-merah.png" class="marker-merah" alt="Marker Merah"> Belum di Survei
            </div>
          </div>
          <!-- End Petunjuk Marker -->

          <script>
            function initialize() {
              var map = L.map('map').setView([-6.5623937916702335, 107.76113720152976], 12.5);

              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
              }).addTo(map);

              L.control.locate({
                position: 'bottomleft',
              }).addTo(map);

              L.Control.geocoder({
                position: 'topleft',
              }).addTo(map);

              var officeLocations = <?php echo json_encode($survei); ?>;

              var greenIcon = L.icon({
                iconUrl: '/img/marker-hijau.png',
                iconSize: [22, 34],
                iconAnchor: [24, 38],
                popupAnchor: [0, -38],
              });

              var redIcon = L.icon({
                iconUrl: '/img/marker-merah.png',
                iconSize: [38, 38],
                iconAnchor: [24, 38],
                popupAnchor: [0, -38],
              });

              for (var i = 0; i < officeLocations.length; i++) {
                var office = officeLocations[i];
                if (office.latitude && office.longitude) {
                  var markerIcon = parseInt(office.status_survei) ? greenIcon : redIcon;
                  var marker = L.marker([office.latitude, office.longitude], {
                    icon: markerIcon
                  }).addTo(map);

                  var contentString =
                    '<div id="content">' +
                    '<h5 id="firstHeading" class="firstHeading">' + office.nama_desa + '</h5>' +
                    '<div id="bodyContent">' +
                    '<a href="<?= base_url('Pages/detailLokasi/'); ?>' + office.id_survei + '">Info Detail</a>' +
                    '</div>' +
                    '</div>';

                  marker.bindPopup(contentString);
                }
              }
            }
            document.addEventListener("DOMContentLoaded", function() {
              initialize();
            });
          </script>
        </div>
      </div>
    </section>
    <!-- End Map Section -->

    <!-- Data Bantuan Section -->
    <section id="portfolio" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-3" data-aos="fade-right">
            <div class="section-title">
              <h2>Data Bantuan</h2>
              <p>Halaman ini memuat informasi tempat yang di berikan bantuan di Kabupaten Subang </p>
            </div>
          </div>
          <div class="col-lg-9" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-12">
              <div class="panel panel-info panel-dashboard">
                <div class="panel-heading centered">
                </div>

                <!-- Form Pencarian -->
                <div class="d-flex">
                  <p>Search :</p>
                  <div class="col-md-4 ">
                    <form action="" method="get" autocomplete="off">
                      <div class="input-group mb-3">
                        <?php $request = \Config\Services::request(); ?>
                        <input type="text" value="<?= $request->getGet('keyword'); ?>" name="keyword" class="form-control" placeholder="Cari..." aria-label="Cari..." aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-green" type="submit" name="submit" id="button-addon2">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="offset-md-5">
                    <!-- Form Filter Tahun -->
                    <form action="" method="get" autocomplete="off" id="yearForm">
                      <select name="year" class="form-control" onchange="document.getElementById('yearForm').submit();" style="width: 100pt;">
                        <option value="">Pilih Tahun</option>
                        <?php
                        foreach ($years as $year) {
                          echo "<option value=\"" . $year . "\">" . $year . "</option>";
                        }
                        ?>
                      </select>
                    </form>
                  </div>
                </div>
                <!-- End From Pencarian -->

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Penerima</th>
                        <th scope="col">Nama Desa</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status Survei</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $page = isset($_GET['page']) ? ($_GET['page']) : 1;
                      $no = 1 + (150 * ($page - 1));
                      foreach ($survei as $row) : ?>
                        <tr>
                          <th scope="row"><?= $no++; ?></th>
                          <td><?= $row['nama_penerima']; ?></td>
                          <td><?= $row['nama_desa']; ?></td>
                          <td><?= $row['alamat']; ?></td>
                          <td>
                            <?php if ($row['status_survei'] == 0) : ?>
                              <span style="color: red;">Belum di Survei</span>
                            <?php else : ?>
                              <span style="color: green;">Sudah di Survei</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php
                            if ($row['status_survei'] == 0) {
                              echo $row['tanggal_belum_survei'];
                            } else {
                              echo $row['tanggal_survei'];
                            }
                            ?>
                          </td>
                          <td>
                            <div class="btn-group" aria-label="Action Buttons">
                              <form action="<?= base_url('Pages/detailLokasi/' . $row['id_survei']); ?>" method="get">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></button>
                              </form>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="float-left">
                  <i>Menampilkan <?= 1 + (150 * ($page - 1)) ?> sampai <?= $no - 1; ?> dari <?= $pager->getTotal(); ?> data</i>
                </div>
                <div class="float-right">
                  <?= $pager->links('default', 'pagination'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Data Bantuan Section -->

  </main>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>

</html>
<?= $this->endSection(); ?>