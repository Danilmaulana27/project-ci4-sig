<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- Card Header -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Survei</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 btn-green">
            <h6 class="m-0 font-weight-bold">Mengubah Data Survei</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Survei/update/' . $survei['id_survei']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="fotoLama" value="<?= $survei['foto']; ?>">

                <!-- Nama Penerima -->
                <div class="form-group">
                    <label for="nama_penerima">Nama Penerima Bantuan</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('nama_penerima', $validation)) ? 'is-invalid' : ''; ?>" id="nama_penerima" name="nama_penerima" value="<?= $survei['nama_penerima']; ?>">
                    <div id="nama_penerima" class="invalid-feedback">
                        <?= ($validation && array_key_exists('nama_penerima', $validation)) ? $validation['nama_penerima'] : ''; ?>
                    </div>
                </div>

                <!-- Jenis Bantuan -->
                <div class="form-group">
                    <label for="jenis_bantuan">Jenis Bantuan</label>
                    <select class="form-control <?= ($validation && array_key_exists('jenis_bantuan', $validation)) ? 'is-invalid' : ''; ?>" id="jenis_bantuan" name="jenis_bantuan">
                        <option value="">Pilih Jenis Bantuan</option>
                        <option value="Dana Hibah" <?= $survei['jenis_bantuan'] == 'Dana Hibah' ? 'selected' : ''; ?>>Dana Hibah</option>
                        <option value="Bantuan Sosial" <?= $survei['jenis_bantuan'] == 'Bantuan Sosial' ? 'selected' : ''; ?>>Bantuan Sosial</option>
                    </select>
                    <div id="jenis_bantuan" class="invalid-feedback">
                        <?= ($validation && array_key_exists('jenis_bantuan', $validation)) ? $validation['jenis_bantuan'] : ''; ?>
                    </div>
                </div>

                <!-- Penerima Hibah -->
                <div class="form-group">
                    <label for="penerima_hibah">Penerima Hibah</label>
                    <select class="form-control <?= ($validation && array_key_exists('penerima_hibah', $validation)) ? 'is-invalid' : ''; ?>" id="penerima_hibah" name="penerima_hibah">
                        <option value="">Pilih Penerima Hibah</option>
                        <option value="Pemerintah atau Pemerintah Daerah Lainnya" <?= $survei['penerima_hibah'] == 'Pemerintah atau Pemerintah Daerah Lainnya' ? 'selected' : ''; ?>>Pemerintah atau Pemerintah Daerah Lainnya</option>
                        <option value="Perusahaan Daerah" <?= $survei['penerima_hibah'] == 'Perusahaan Daerah' ? 'selected' : ''; ?>>Perusahaan Daerah</option>
                        <option value="Badan, Lembaga dan Organisasi Kemasyarakatan" <?= $survei['penerima_hibah'] == 'Badan, Lembaga dan Organisasi Kemasyarakatan' ? 'selected' : ''; ?>>Badan, Lembaga dan Organisasi Kemasyarakatan</option>
                    </select>
                    <div id="penerima_hibah" class="invalid-feedback">
                        <?= ($validation && array_key_exists('penerima_hibah', $validation)) ? $validation['penerima_hibah'] : ''; ?>
                    </div>
                </div>
                <script src="<?= base_url(); ?>/login/js/penerimaBantuan.js"></script>

                <!-- Penerima Bansos -->
                <div class="form-group">
                    <label for="penerima_bansos">Penerima Bansos</label>
                    <select class="form-control <?= ($validation && array_key_exists('penerima_bansos', $validation)) ? 'is-invalid' : ''; ?>" id="penerima_bansos" name="penerima_bansos">
                        <option value="">Pilih Penerima Bansos</option>
                        <option value="Individu" <?= $survei['penerima_bansos'] == 'Individu' ? 'selected' : ''; ?>>Individu</option>
                        <option value="Keluarga" <?= $survei['penerima_bansos'] == 'Keluarga' ? 'selected' : ''; ?>>Keluarga</option>
                        <option value="Kelompok dan/atau Masyarakat" <?= $survei['penerima_bansos'] == 'Kelompok dan/atau Masyarakat' ? 'selected' : ''; ?>>Kelompok dan/atau Masyarakat</option>
                    </select>
                    <div id="penerima_bansos" class="invalid-feedback">
                        <?= ($validation && array_key_exists('penerima_bansos', $validation)) ? $validation['penerima_bansos'] : ''; ?>
                    </div>
                </div>

                <!-- Bentuk Bantuan -->
                <div class="form-group">
                    <label for="bentuk_bantuan">Bentuk Bantuan</label>
                    <select class="form-control <?= ($validation && array_key_exists('bentuk_bantuan', $validation)) ? 'is-invalid' : ''; ?>" id="bentuk_bantuan" name="bentuk_bantuan">
                        <option value="">Pilih Bentuk Bantuan</option>
                        <option value="Uang" <?= $survei['bentuk_bantuan'] == 'Uang' ? 'selected' : ''; ?>>Uang</option>
                        <option value="Barang" <?= $survei['bentuk_bantuan'] == 'Barang' ? 'selected' : ''; ?>>Barang</option>
                        <option value="Jasa" <?= $survei['bentuk_bantuan'] == 'Jasa' ? 'selected' : ''; ?>>Jasa</option>
                    </select>
                    <div id="bentuk_bantuan" class="invalid-feedback">
                        <?= ($validation && array_key_exists('bentuk_bantuan', $validation)) ? $validation['bentuk_bantuan'] : ''; ?>
                    </div>
                </div>

                <!-- Nama Desa -->
                <div class="form-group">
                    <label for="nama_desa">Nama Desa</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('nama_desa', $validation)) ? 'is-invalid' : ''; ?>" id="nama_desa" name="nama_desa" value="<?= $survei['nama_desa']; ?>">
                    <div id="nama_desa" class="invalid-feedback">
                        <?= ($validation && array_key_exists('nama_desa', $validation)) ? $validation['nama_desa'] : ''; ?>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('alamat', $validation)) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= $survei['alamat']; ?>">
                    <div id="alamat" class="invalid-feedback">
                        <?= ($validation && array_key_exists('alamat', $validation)) ? $validation['alamat'] : ''; ?>
                    </div>
                </div>

                <!-- Anggota Survei -->
                <div class="mb-3">
                    <label for="namaAnggota1" class="form-label">Anggota Survei</label>
                    <div id="anggotaSurveiContainer">
                        <?php foreach ($anggotaSurvei as $index => $anggota) : ?>
                            <input type="text" id="namaAnggota1<?= $index + 1; ?>" class="form-control mb-2 anggotaSurveiInput" placeholder="Nama Anggota" value="<?= $anggota['fullname']; ?>">
                            <input type="hidden" name="anggotaSurveiId[]" value="<?= $anggota['user_id']; ?>">
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="tambahAnggota()">Tambah Anggota</button>
                    <button type="button" class="btn btn-danger" onclick="hapusAnggota()">Hapus Anggota</button>
                </div>
                <script src="<?= base_url(); ?>/login/js/anggotaSurvei.js"></script>

                <!-- Status Survei -->
                <div class="mb-3">
                    <label class="form-label">Status Survei</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="status_survei" name="status_survei" value="1" <?= isset($survei['status_Survei']) && $survei['status_survei'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="status_survei"><span id="survei_status_text"><?= isset($survei['status_survei']) && $survei['status_survei'] ? 'Di Setujui' : 'Tidak Di Setujuis'; ?></span></label>
                    </div>
                </div>

                <!-- Tanggal Akan di Survei -->
                <div class="form-group" id="tanggal_belum_survei_div">
                    <label for="tanggal_belum_survei">Tanggal Akan di Survei</label>
                    <input type="date" class="form-control <?= ($validation && array_key_exists('tanggal_belum_survei', $validation)) ? 'is-invalid' : ''; ?>" id="tanggal_belum_survei" name="tanggal_belum_survei" value="<?= $survei['tanggal_belum_survei'] ? date('Y-m-d', strtotime($survei['tanggal_belum_survei'])) : ''; ?>">
                    <div id="tanggal_belum_survei" class="invalid-feedback">
                        <?= ($validation && array_key_exists('tanggal_belum_survei', $validation)) ? $validation['tanggal_belum_survei'] : ''; ?>
                    </div>
                </div>

                <!-- Tanggal Selesai di Survei -->
                <div class="form-group" id="tanggal_selesai_survei_div">
                    <label for="tanggal_survei">Tanggal Selesai di Survei</label>
                    <input type="date" class="form-control <?= ($validation && array_key_exists('tanggal_survei', $validation)) ? 'is-invalid' : ''; ?>" id="tanggal_survei" name="tanggal_survei" value="<?= $survei['tanggal_survei'] ? date('Y-m-d', strtotime($survei['tanggal_survei'])) : ''; ?>">
                    <div id="tanggal_survei" class="invalid-feedback">
                        <?= ($validation && array_key_exists('tanggal_survei', $validation)) ? $validation['tanggal_survei'] : ''; ?>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Dapatkan referensi ke checkbox
                        var checkbox = document.getElementById('status_survei');

                        // Tambahkan event listener untuk memantau perubahan pada checkbox
                        checkbox.addEventListener('change', function() {
                            // Ubah teks label berdasarkan status checkbox
                            document.getElementById('survei_status_text').innerText = this.checked ? 'Di Setujui' : 'Tidak Di Setujui';

                            // Tampilkan atau sembunyikan kolom tanggal berdasarkan status checkbox
                            document.getElementById('tanggal_belum_survei_div').style.display = this.checked ? 'none' : 'block';
                            document.getElementById('tanggal_selesai_survei_div').style.display = this.checked ? 'block' : 'none';
                        });

                        // Atur status checkbox berdasarkan data yang ada
                        checkbox.checked = <?= $survei['status_survei'] == 1 ? 'true' : 'false'; ?>;

                        // Panggil fungsi change saat halaman dimuat
                        checkbox.dispatchEvent(new Event('change'));
                    });
                </script>

                <!-- Foto -->
                <div class="form-group row">
                    <label for="foto" class="col-sm-1 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/assets/img_survei/<?= $survei['foto']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation && array_key_exists('foto', $validation)) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                            <div id="foto" class="invalid-feedback">
                                <?= ($validation && array_key_exists('foto', $validation)) ? $validation['foto'] : ''; ?>
                            </div>
                            <label class="custom-file-label" for="foto"><?= $survei['foto']; ?></label>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $survei['deskripsi']; ?></textarea>
                </div>

                <!-- Tambah Lokasi -->
                <div class="mb-3">
                    <label class="form-label">Lokasi Survei</label>
                    <div id="map" style="height: 180px;"></div>
                    <script>
                        function initialize() {
                            <?php if ($survei && isset($survei['latitude']) && isset($survei['longitude'])) : ?>
                                var map = L.map('map').setView([<?= $survei['latitude']; ?>, <?= $survei['longitude']; ?>], 12.5);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                }).addTo(map);

                                // Membuat control lokasi dan menambahkannya ke peta
                                L.control.locate({
                                    position: 'bottomleft',
                                }).addTo(map);

                                // Membuat control pencarian dan menambahkannya ke peta
                                L.Control.geocoder({
                                    position: 'topleft',
                                }).addTo(map);

                                var marker;

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

                                var office = <?php echo json_encode($survei); ?>;

                                if (office.latitude && office.longitude) {
                                    var markerIcon = parseInt(office.status_Survei) ? greenIcon : redIcon;
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

                                map.on('click', function(e) {
                                    if (marker) {
                                        map.removeLayer(marker);
                                    }
                                    marker = new L.marker(e.latlng).addTo(map);
                                    marker.on('click', function() {
                                        map.removeLayer(marker);
                                    });

                                    // Menyimpan koordinat ke dalam form
                                    document.getElementById('latitude').value = e.latlng.lat;
                                    document.getElementById('longitude').value = e.latlng.lng;
                                });
                            <?php endif; ?>
                        }
                        // Panggil fungsi initialize setelah halaman selesai dimuat
                        document.addEventListener("DOMContentLoaded", function() {
                            initialize();
                        });
                    </script>
                </div>


                <!-- Latitude -->
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('latitude', $validation)) ? 'is-invalid' : ''; ?>" id="latitude" name="latitude" value="<?= $survei['latitude']; ?>">
                    <div id="latitude" class="invalid-feedback">
                        <?= ($validation && array_key_exists('latitude', $validation)) ? $validation['latitude'] : ''; ?>
                    </div>
                </div>

                <!-- Longitude -->
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('longitude', $validation)) ? 'is-invalid' : ''; ?>" id="longitude" name="longitude" value="<?= $survei['longitude']; ?>">
                    <div id="longitude" class="invalid-feedback">
                        <?= ($validation && array_key_exists('longitude', $validation)) ? $validation['longitude'] : ''; ?>
                    </div>
                </div>

                <!-- Tombol Edit -->
                <div class="form-group row" style="margin-top: 20px;">
                    <div class="col-sm-10 ">
                        <button type="submit" class="custom-button btn-sm">Ubah data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>