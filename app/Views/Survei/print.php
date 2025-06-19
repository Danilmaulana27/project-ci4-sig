<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<div class="row mt-4 no-print">
    <div class="col-md-12 text-center">
        <button class="btn btn-primary" onclick="window.print()">Print Halaman Ini</button>
    </div>
</div>


<div class="header">
    <img src="<?= base_url('/assets/img/logo.png'); ?>" class="logo">
    <div class="company-details">
        <h1 class="nama-pemda">PEMERINTAHAN DEARAH KABUPATEN SUBANG</h1>
        <p class="alamat-pemda">Jl. S. Parman No. 3 Telp. (0260) 4245054. FAX (0260) 4244498 Subang</p>
    </div>
    <hr class="garis-panjang">
    <hr class="garis-panjang">

    <div class="container mt-5">
        <h1 class="text-center mb-4">Laporan Data Survei</h1>

        <div class="row">
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    <p class="indent larger">
                        1. Informasi Umum
                    </p>
                    <p class="content spacing">
                        Nama Tim Survei : <?php if (!empty($anggota_survei)) : ?>
                            <?php foreach ($anggota_survei as $anggota) : ?>
                                <?= $anggota['fullname']; ?><br>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </p>
                    <p class="content spacing">
                        Tanggal Pelaksanaan : <?php if (!empty($survei['tanggal_belum_survei'])) : ?>
                            <?= $survei['tanggal_belum_survei']; ?>
                        <?php endif; ?>
                        <?php if (!empty($survei['tanggal_survei'])) : ?>
                            <?= $survei['tanggal_survei']; ?>
                        <?php endif; ?>
                    </p>
                    <p class="content spacing">
                        Lokasi : <?php if (!empty($survei['nama_desa'])) : ?><?= $survei['nama_desa']; ?><?php endif; ?>,
                        <?php if (!empty($survei['alamat'])) : ?><?= $survei['alamat']; ?><?php endif; ?>
                    </p>

                    <p class="indent larger">2. Tujuan Survei:
                    <ul class="content spacing">
                        <li>Menilai tingkat kebutuhan masyarakat terkait bantuan hibah/bantuan sosial.</li>
                        <li>Mengidentifikasi penerima bantuan yang memenuhi kriteria yang telah ditetapkan.</li>
                    </ul>
                    </p>
                    <p class="indent larger">3. Hasil Survei</p>
                    <p class="content spacing">
                        Nama Penerima Bantuan : <?php if (!empty($survei['nama_penerima'])) : ?>
                            <?= $survei['nama_penerima']; ?></li>
                        <?php endif; ?>
                    </p>
                    <p class="content spacing">
                        Jenis Bantuan : <?php if (!empty($survei['jenis_bantuan'])) : ?>
                            <?= $survei['jenis_bantuan']; ?>
                        <?php endif; ?>
                    </p>
                    <p class="content spacing">
                        Penerima Dana Hibah : <?php if (!empty($survei['penerima_hibah'])) : ?>
                            <?= $survei['penerima_hibah']; ?>
                        <?php endif; ?>
                    </p>
                    <p class="content spacing">
                        Penerima Bantuan Sosial : <?php if (!empty($survei['penerima_bansos'])) : ?>
                            <?= $survei['penerima_bansos']; ?>
                        <?php endif; ?>
                    </p>
                    <p class="content spacing">
                        Bentuk Bantuan Berupa : <?php if (!empty($survei['bentuk_bantuan'])) : ?>
                            <?= $survei['bentuk_bantuan']; ?>
                        <?php endif; ?>
                    </p>
                    <p class="content spacing">
                        Status Survei : <?php if (!empty($survei['status_survei'])) : ?>
                            <?= $survei['status_survei'] == 1 ? 'Di Setujui' : 'Tidak Di Setujui'; ?>
                        <?php endif; ?>
                    </p>
                    <p class="content spacing">
                        Deskripsi : <?php if (!empty($survei['deskripsi'])) : ?>
                            <?= $survei['deskripsi']; ?>
                        <?php endif; ?>
                    </p>
                    <p class="indent larger">4. Rekomendasi</p>
                    <p class="content spacing">
                        Berdasarkan hasil survei, kami merekomendasikan agar pemerintah daerah segera mendistribusikan bantuan hibah dan bantuan sosial kepada penerima yang telah diidentifikasi.
                    </p>
                    <p class="indent larger">5. Lampiran</p>
                    <p class="content spacing">
                        <img class="img-fluid" src="<?= base_url('/assets/img_survei/' . $survei['foto']); ?>" style="max-height: 200px; width: 60%;">
                    </p>

                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('F d Y');

                    echo '<div style="margin-left: 700px; margin-top: 20px;"><p>Subang, ' . $tanggal . '</p>';
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';
                    if (user()['fullname']) {
                        echo '<div style="margin-left: 25px;"><p>' . user()['fullname'] . '</p>';
                    }
                    echo '</div>';
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>