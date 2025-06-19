<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Tampilkan pesan Flashdata data user update -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- Card Header -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">User List</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 btn-green">
            <h6 class="m-0 font-weight-bold ">Daftar Pengguna</h6>
        </div>
        <div class="card-body">

            <!-- Form Pencarian -->
            <div class="d-flex">
                <div class="col-md-4 mb-3">
                    <form action="" method="get" autocomplete="off">
                        <div class="input-group">
                            <?php $request = \Config\Services::request(); ?>
                            <input type="text" value="<?= $request->getGet('keyword'); ?>" class="form-control " name="keyword" placeholder="Cari..." style="width: 155pt;">
                            <div class="input-group-append">
                                <button class="btn btn-green" type="submit" name="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $page = isset($_GET['page']) ? ($_GET['page']) : 1;
                        $no = 1 + (10 * ($page - 1));
                        foreach ($users as $user) : ?>

                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['fullname']; ?></td>
                                <td><?= $user['role']; ?></td>
                                <td>

                                    <div class="btn-group" role="group" aria-label="Action Buttons">
                                        <!-- Tombol Detail -->
                                        <form action="<?= base_url('Userlist/detail/' . $user['id']); ?>" method="get">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></button>
                                        </form>

                                        <span style="margin: 0 5px;"></span>

                                        <!-- Tombol Edit -->
                                        <form action="<?= base_url('Userlist/edit/' . $user['id']); ?>" method="get">
                                            <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        </form>

                                        <span style="margin: 0 5px;"></span>

                                        <!-- Tombol Delete -->
                                        <form action="<?= base_url('Userlist/delete/' . $user['id']); ?>" method="post" id="deleteForm">
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
                <i>Menampilkan <?= 1 + (10 * ($page - 1)) ?> sampai <?= $no - 1; ?> dari <?= $pager->getTotal(); ?> entri</i>
            </div>
            <div class="float-right">
                <?= $pager->links('default', 'pagination'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>