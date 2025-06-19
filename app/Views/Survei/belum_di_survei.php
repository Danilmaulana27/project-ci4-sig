<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Menampilkan Pesan Data berhasil di simpan -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Card Header -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Kegiatan Bantuan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 btn-green">
            <h6 class="m-0 font-weight-bold">Data Bantuan di PEMDA Subang</h6>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-4">
                    <!-- Form Pencarian -->
                    <form action="" method="get" autocomplete="off">
                        <div class="input-group">
                            <input type="text" class="form-control " name="keyword" placeholder="Cari..." style="width: 155pt;">
                            <div class="input-group-append">
                                <button class="btn btn-green" type="submit" name="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="offset-md-6">
                    <!-- Form Filter Tahun -->
                    <form action="" method="get" autocomplete="off" id="yearForm">
                        <div class="input-group">
                            <select name="year" class="form-control" onchange="document.getElementById('yearForm').submit();" style="width: 100pt;">
                                <option value="">Pilih Tahun</option>
                                <?php
                                foreach ($years as $year) {
                                    echo "<option value=\"" . $year . "\">" . $year . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Penerima <a href="?sort=nama_penerima&order=<?= $order == 'asc' ? 'desc' : 'asc' ?>"><i class="fas fa-exchange-alt fa-rotate-90 fa-xs"></i></a></th>
                            <th scope="col">Jenis Bantuan<a href="?sort=penerima_bantuan&order=<?= $order == 'asc' ? 'desc' : 'asc' ?>"><i class="fas fa-exchange-alt fa-rotate-90 fa-xs"></i></a></th>
                            <th scope="col">Nama Desa <a href="?sort=nama_desa&order=<?= $order == 'asc' ? 'desc' : 'asc' ?>"><i class="fas fa-exchange-alt fa-rotate-90 fa-xs"></i></a></th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Survei</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $page = isset($_GET['page']) ? ($_GET['page']) : 1;
                        $no = 1 + (10 * ($page - 1));
                        foreach ($survei as $row) : ?>

                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><a href="<?= base_url('Pages/detailLokasi/' . $row['id_survei']); ?>">
                                        <?= $row['nama_penerima']; ?>
                                </td>
                                <td><?= $row['jenis_bantuan']; ?></td>
                                <td><?= $row['nama_desa']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= date('d-m-Y', strtotime($row['tanggal_belum_survei'])); ?></td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">
                                        <!-- Tombol Edit -->
                                        <form action="<?= base_url('Survei/edit/' . $row['id_survei']); ?>" method="get">
                                            <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        </form>

                                        <span style="margin: 0 5px;"></span>

                                        <!-- Tombol Delete -->
                                        <form action="<?= base_url('Survei/delete/' . $row['id_survei']); ?>" method="post" class="deleteForm">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="btn btn-danger btn-sm" id="deleteButton"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="float-left">
                <i>Menampilkan <?= 1 + (10 * ($page - 1)) ?> sampai <?= $no - 1; ?> dari <?= $pager->getTotal(); ?> data</i>
            </div>
            <div class="float-right">
                <?= $pager->links('default', 'pagination'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>