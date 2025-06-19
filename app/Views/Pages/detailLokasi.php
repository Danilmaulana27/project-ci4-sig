<?= $this->extend('Pages/Layout/template'); ?>

<?= $this->section('content'); ?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keyfwords">

    <title><?= $title ?></title>

</head>

<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Detail Informasi Data Survei di SETDA Kabupaten Subang</h1>
    </div>
</section><!-- End Hero -->

<!-- Start about-info Area -->
<section class="about-info-area section-gap">
    <div class="container">
        <div class=" row">
            <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
                <div class="panel panel-info panel-dashboard">
                    <div class="panel-heading centered">
                        <h2 class="panel-title"><strong>Informasi Bantuan </strong></h4>
                    </div>
                    <div class="panel-body scroll">
                        <table class="table">
                            <tr>
                                <th style="color: gray;">Detail</th>
                            </tr>
                            <tr>
                                <td style="color: gray;">Nama Penerima Bantuan</td>
                                <td>
                                    <p><?= $survei->nama_penerima; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Jenis Bantuan</td>
                                <td>
                                    <p><?= $survei->jenis_bantuan; ?></p>
                                </td>
                            </tr>
                            <?php if ($survei->jenis_bantuan == 'Dana Hibah') : ?>
                                <tr>
                                    <td style="color: gray;">Penerima Hibah</td>
                                    <td>
                                        <p><?= $survei->penerima_hibah; ?></p>
                                    </td>
                                </tr>
                            <?php elseif ($survei->jenis_bantuan == 'Bantuan Sosial') : ?>
                                <tr>
                                    <td style="color: gray;">Penerima Bansos</td>
                                    <td>
                                        <p><?= $survei->penerima_bansos; ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($survei->jenis_bantuan == 'Bantuan Sosial') : ?>
                                <tr>
                                    <td style="color: gray;">Penghasilan</td>
                                    <td>
                                        <p><?= $survei->penghasilan; ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($survei->jenis_bantuan == 'Bantuan Sosial') : ?>
                                    <td style="color: gray;">Jumlah Keluarga</td>
                                    <td>
                                        <p><?= $survei->keluarga; ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td style="color: gray;">Bentuk Bantuan</td>
                                <td>
                                    <p><?= $survei->bentuk_bantuan; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Nama Desa</td>
                                <td>
                                    <p><?= $survei->nama_desa; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Alamat</td>
                                <td>
                                    <p><?= $survei->alamat; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Anggota Survei</td>
                                <td>
                                    <?php foreach ($anggotaSurvei as $anggota) : ?>
                                        <p><?= $anggota['fullname']; ?></p>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Status Survei</td>
                                <td>
                                    <p style="color: <?php echo $survei->status_survei == 0 ? 'red' : 'green'; ?>;">
                                        <?php echo $survei->status_survei == 0 ? 'Tidak Di Setujui' : 'Di Setujui'; ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Tanggal Akan di Survei</td>
                                <td>
                                    <?php if (!empty($survei->tanggal_belum_survei)) : ?>
                                        <p><?= date('d-m-Y', strtotime($survei->tanggal_belum_survei)); ?></p>
                                    <?php else : ?>
                                        <p>Data tidak tersedia</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Tanggal Selesai di Survei</td>
                                <td>
                                    <?php if (!empty($survei->tanggal_survei)) : ?>
                                        <p><?= date('d-m-Y', strtotime($survei->tanggal_survei)); ?></p>
                                    <?php else : ?>
                                        <p>Tidak ada data</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Deskripsi</td>
                                <td>
                                    <p><?= $survei->deskripsi; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Foto</td>
                                <td>
                                    <img src="<?= base_url('/assets/img_survei/' . $survei->foto); ?>" width="200">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-5" data-aos="zoom-in">
                <div class="panel panel-info panel-dashboard">
                    <div class="panel-heading centered">
                        <h2 class="panel-title"><strong>Lokasi Survei</strong></h4>
                    </div>
                    <div class="panel-body">
                        <div id="map" style="width:100%;height:380px;"></div>
                        <!-- Leaflet CSS -->
                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

                        <!-- Leaflet JavaScript -->
                        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                        <script>
                            function initialize() {
                                var officeLocation = <?php echo json_encode($survei); ?>;

                                var map = L.map('map').setView([officeLocation.latitude, officeLocation.longitude], 12.5);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                }).addTo(map);

                                var greenIcon = L.icon({
                                    iconUrl: '/img/marker-hijau.png',
                                    iconSize: [28, 44],
                                    iconAnchor: [24, 48],
                                    popupAnchor: [0, -48],
                                });

                                var redIcon = L.icon({
                                    iconUrl: '/img/marker-merah.png',
                                    iconSize: [48, 48],
                                    iconAnchor: [24, 48],
                                    popupAnchor: [0, -48],
                                });

                                var markerIcon = parseInt(officeLocation.status_survei) ? greenIcon : redIcon;
                                var marker = L.marker([officeLocation.latitude, officeLocation.longitude], {
                                    icon: markerIcon
                                }).addTo(map);

                                var contentString =
                                    '<div id="content">' +
                                    '<h5 id="firstHeading" class="firstHeading">' + officeLocation.nama_desa + '</h5>' +
                                    '<div id="bodyContent">' +
                                    '<a href="<?= base_url('Pages/detailLokasi/'); ?>' + officeLocation.id_survei + '">Info Detail</a>' +
                                    '</div>' +
                                    '</div>';

                                marker.bindPopup(contentString);
                            }

                            // Panggil fungsi initialize setelah halaman selesai dimuat
                            document.addEventListener("DOMContentLoaded", function() {
                                initialize();
                            });
                        </script>
                    </div>
                </div>
            </div>
            <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</section>

<?= $this->endSection(); ?>