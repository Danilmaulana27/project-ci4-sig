<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- Card Header -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Survei</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 btn-green">
            <h6 class="m-0 font-weight-bold">Menambahkan Data Baru</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Survei/simpan_data'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <!-- Nama Penerima -->
                <div class="mb-3">
                    <label class="form-label">Nama Penerima Bantuan</label>
                    <input type="text" placeholder="Masukan nama penerima" class="form-control <?= ($validation && array_key_exists('nama_penerima', $validation)) ? 'is-invalid' : ''; ?>" id="nama_penerima" name="nama_penerima" value="<?= old('nama_penerima'); ?>">
                    <div id="nama_penerima" class="invalid-feedback">
                        <?= ($validation && array_key_exists('nama_penerima', $validation)) ? $validation['nama_penerima'] : ''; ?>
                    </div>
                </div>

                <!-- Jenis Bantuan -->
                <div class="mb-3">
                    <label class="form-label">Jenis Bantuan</label>
                    <select class="form-control <?= ($validation && array_key_exists('jenis_bantuan', $validation)) ? 'is-invalid' : ''; ?>" id="jenis_bantuan" name="jenis_bantuan">
                        <option value="">Pilih Jenis Bantuan</option>
                        <option value="Dana Hibah">Dana Hibah</option>
                        <option value="Bantuan Sosial">Bantuan Sosial</option>
                    </select>
                    <div id="jenis_bantuan" class="invalid-feedback">
                        <?= ($validation && array_key_exists('jenis_bantuan', $validation)) ? $validation['jenis_bantuan'] : ''; ?>
                    </div>
                </div>

                <!-- Penerima Hibah -->
                <div class="mb-3">
                    <label class="form-label">Penerima Hibah</label>
                    <select class="form-control <?= ($validation && array_key_exists('penerima_hibah', $validation)) ? 'is-invalid' : ''; ?>" id="penerima_hibah" name="penerima_hibah">
                        <option value="">Pilih Penerima Hibah</option>
                        <option value="Pemerintah atau Pemerintah Daerah Lainnya">Pemerintah atau Pemerintah Daerah Lainnya</option>
                        <option value="Perusahaan Daerah">Perusahaan Daerah</option>
                        <option value="Badan, Lembaga dan Organisasi Kemasyarakatan">Badan, Lembaga dan Organisasi Kemasyarakatan</option>
                    </select>
                    <div id="penerima_hibah" class="invalid-feedback">
                        <?= ($validation && array_key_exists('penerima_hibah', $validation)) ? $validation['penerima_hibah'] : ''; ?>
                    </div>
                </div>
                <script src="<?= base_url(); ?>/login/js/penerimaBantuan.js"></script>

                <!-- Penerima Bansos -->
                <div class="mb-3">
                    <label class="form-label">Penerima Bansos</label>
                    <select class="form-control <?= ($validation && array_key_exists('penerima_bansos', $validation)) ? 'is-invalid' : ''; ?>" id="penerima_bansos" name="penerima_bansos">
                        <option value="">Pilih Penerima Bansos</option>
                        <option value="Individu">Individu</option>
                        <option value="Keluarga">Keluarga</option>
                        <option value="Kelompok dan/atau Masyarakat">Kelompok dan/atau Masyarakat</option>
                    </select>
                    <div id="penerima_bansos" class="invalid-feedback">
                        <?= ($validation && array_key_exists('penerima_bansos', $validation)) ? $validation['penerima_bansos'] : ''; ?>
                    </div>
                </div>

                 <!-- Penghasilan -->
                 <div class="mb-3">
                    <label class="form-label">Penghasilan</label>
                    <input type="text" placeholder="Masukan jumlah penghasilan" class="form-control <?= ($validation && array_key_exists('penghasilan', $validation)) ? 'is-invalid' : ''; ?>" id="penghasilan" name="penghasilan" value="<?= old('penghasilan'); ?>">
                    <div id="penghasilan" class="invalid-feedback">
                        <?= ($validation && array_key_exists('penghasilan', $validation)) ? $validation['penghasilan'] : ''; ?>
                    </div>
                </div>
                <script src="<?= base_url(); ?>/login/js/penghasilan.js"></script>
                
                <!-- Jumlah Keluarga -->
                <div class="mb-3">
                    <label class="form-label">Jumlah Keluarga</label>
                    <input type="text" placeholder="Masukan jumlah keluarga" class="form-control <?= ($validation && array_key_exists('keluarga', $validation)) ? 'is-invalid' : ''; ?>" id="keluarga" name="keluarga" value="<?= old('keluarga'); ?>">
                    <div id="keluarga" class="invalid-feedback">
                        <?= ($validation && array_key_exists('keluarga', $validation)) ? $validation['keluarga'] : ''; ?>
                    </div>
                </div>  

                <!-- Bentuk Bantuan -->
                <div class="mb-3">
                    <label class="form-label">Bentuk Bantuan</label>
                    <select class="form-control <?= ($validation && array_key_exists('bentuk_bantuan', $validation)) ? 'is-invalid' : ''; ?>" id="bentuk_bantuan" name="bentuk_bantuan">
                        <option value="">Pilih Bentuk Bantuan</option>
                        <option value="Uang">Uang</option>
                        <option value="Barang">Barang</option>
                        <option value="Jasa">Jasa</option>
                    </select>
                    <div id="bentuk_bantuan" class="invalid-feedback">
                        <?= ($validation && array_key_exists('bentuk_bantuan', $validation)) ? $validation['bentuk_bantuan'] : ''; ?>
                    </div>
                </div>

                <!-- Nama Desa -->
                <div class="mb-3">
                    <label class="form-label">Nama Desa</label>
                    <input type="text" placeholder="Masukan nama desa" class="form-control <?= ($validation && array_key_exists('nama_desa', $validation)) ? 'is-invalid' : ''; ?>" id="nama_desa" name="nama_desa" value="<?= old('nama_desa'); ?>">
                    <div id="nama_desa" class="invalid-feedback">
                        <?= ($validation && array_key_exists('nama_desa', $validation)) ? $validation['nama_desa'] : ''; ?>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" placeholder="Masukan alamat lengkap" class="form-control <?= ($validation && array_key_exists('alamat', $validation)) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                    <div id="alamat" class="invalid-feedback">
                        <?= ($validation && array_key_exists('alamat', $validation)) ? $validation['alamat'] : ''; ?>
                    </div>
                </div>

                <!-- Anggota Survei -->
                <div class="mb-3">
                    <label for="namaAnggota1" class="form-label">Anggota Survei</label>
                    <div id="anggotaSurveiContainer">
                        <input type="text" id="namaAnggota1" class="form-control mb-2 anggotaSurveiInput" placeholder="Masukan nama anggota">
                        <input type="hidden" name="anggotaSurveiId[]">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="tambahAnggota()">Tambah Anggota</button>
                    <button type="button" class="btn btn-danger" onclick="hapusAnggota()">Hapus Anggota</button>
                </div>
                <script src="<?= base_url(); ?>/login/js/anggotaSurvei.js"></script>

                <!-- Status Survei -->
                <div class="mb-3">
                    <label class="form-label">Status Survei</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="status_survei" name="status_survei" value="1">
                        <label class="form-check-label" for="status_survei"><span id="survei_status_text"><?= $survei ? 'Belum di Survei' : 'Sudah di Survei'; ?></span></label>
                    </div>
                </div>
                <!-- checkbox -->
                <script src="<?= base_url();  ?>/login/js/checkbox.js"></script>

                <!-- Tanggal Akan di Survei -->
                <div class="mb-3" id="tanggal_belum_survei_div">
                    <label for="tanggal_belum_survei" class="form-label">Tanggal Akan di Survei</label>
                    <input type="date" class="form-control <?= ($validation && array_key_exists('tanggal_belum_survei', $validation)) ? 'is-invalid' : ''; ?>" id="tanggal_belum_survei" name="tanggal_belum_survei" value="<?= old('tanggal_belum_survei') ? date('Y-d-m', strtotime(old('tanggal_belum_survei'))) : ''; ?>">
                    <div id="tanggal_belum_survei" class="invalid-feedback">
                        <?= ($validation && array_key_exists('tanggal_belum_survei', $validation)) ? $validation['tanggal_belum_survei'] : ''; ?>
                    </div>
                </div>

                <!-- Tanggal Selesai di Survei-->
                <div class="mb-3" id="tanggal_selesai_survei_div">
                    <label for="tanggal_survei" class="form-label">Tanggal Selesai di Survei</label>
                    <input type="date" class="form-control <?= ($validation && array_key_exists('tanggal_survei', $validation)) ? 'is-invalid' : ''; ?>" id="tanggal_survei" name="tanggal_survei" value="<?= old('tanggal_survei') ? date('Y-d-m', strtotime(old('tanggal_survei'))) : ''; ?>">
                    <div id="tanggal_survei" class="invalid-feedback">
                        <?= ($validation && array_key_exists('tanggal_survei', $validation)) ? $validation['tanggal_survei'] : ''; ?>
                    </div>
                </div>

                <!-- Foto -->
                <div class="form-group row">
                    <label for="foto" class="col-sm-1 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/assets/img_survei/default.jpeg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation && array_key_exists('foto', $validation)) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                            <div id="foto" class="invalid-feedback">
                                <?= ($validation && array_key_exists('foto', $validation)) ? $validation['foto'] : ''; ?>
                            </div>
                            <label class="custom-file-label" for="foto">Pilih gambar...</label>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" <?= old('deskripsi'); ?>></textarea>
                </div>

                <!-- Tambah Lokasi -->
                <div class="mb-3">
                    <label class="form-label">Lokasi Survei</label>
                    <div id="map" style="height: 180px;"></div>
                    <script>
                        function initialize() {
                            var map = L.map('map');

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

                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function(position) {
                                    // Dapatkan koordinat dari posisi pengguna
                                    var lat = position.coords.latitude;
                                    var lon = position.coords.longitude;

                                    // Tambahkan marker ke peta di posisi pengguna
                                    L.marker([lat, lon]).addTo(map);

                                    // Pindahkan tampilan peta ke posisi pengguna
                                    map.setView([lat, lon], 13);

                                    // Isi form dengan koordinat pengguna
                                    document.getElementById('latitude').value = lat;
                                    document.getElementById('longitude').value = lon;
                                });

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
                        }
                        // Panggil fungsi initialize setelah halaman selesai dimuat
                        document.addEventListener("DOMContentLoaded", function() {
                            initialize();
                        });
                    </script>
                </div>

                <!-- Latitude -->
                <div class="mb-3">
                    <label class="form-label">Latitude</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('latitude', $validation)) ? 'is-invalid' : ''; ?>" id="latitude" name="latitude" value="<?= old('latitude'); ?>">
                    <div id="latitude" class="invalid-feedback">
                        <?= ($validation && array_key_exists('latitude', $validation)) ? $validation['latitude'] : ''; ?>
                    </div>
                </div>

                <!-- Longitude -->
                <div class="mb-3">
                    <label class="form-label">Longitude</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('longitude', $validation)) ? 'is-invalid' : ''; ?>" id="longitude" name="longitude" value="<?= old('longitude'); ?>">
                    <div id="longitude" class="invalid-feedback">
                        <?= ($validation && array_key_exists('longitude', $validation)) ? $validation['longitude'] : ''; ?>
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="custom-button btn-sm">Simpan</button>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>