<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- Card Header -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 btn-green">
            <h6 class="m-0 font-weight-bold">Mengubah Data Pengguna</h6>
        </div>
        <div class="card-body">

            <!-- Mengubah data ke database -->
            <form action="<?= base_url('Userlist/update/' . $user['id']); ?>" method="post">
                <?= csrf_field(); ?>

                <!-- Role user -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="Admin" <?= (isset($user['role']) && $user['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="Tim Survei" <?= (isset($user['role']) && $user['role'] == 'Tim Survei') ? 'selected' : ''; ?>>Tim Survei</option>
                        <option value="KABAG" <?= (isset($user['role']) && $user['role'] == 'KABAG') ? 'selected' : ''; ?>>KABAG</option>
                    </select>
                </div>

                <!-- Tombol mengubah data -->
                <button type="submit" class="custom-button btn-sm">Ubah data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>