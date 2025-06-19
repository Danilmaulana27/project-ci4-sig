<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 btn-green">
            <h6 class="m-0 font-weight-bold">Menambah User</h6>
        </div>
        <div class="card-body">

            <form action="<?= url_to('Userlist/store') ?>" method="post" class="user">
                <?= csrf_field() ?>

                <!-- Username -->
                <div class="form-group">
                    <label class="username">Username</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('username', $validation)) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username'); ?>">
                    <div id="username" class="invalid-feedback">
                        <?= ($validation && array_key_exists('username', $validation)) ? $validation['username'] : ''; ?>
                    </div>
                </div>

                <!-- Nama Lengkap -->
                <div class="form-group">
                    <label class="fullname">Nama Lengkap</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('fullname', $validation)) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" value="<?= old('fullname'); ?>">
                    <div id="fullname" class="invalid-feedback">
                        <?= ($validation && array_key_exists('fullname', $validation)) ? $validation['fullname'] : ''; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?= ($validation && array_key_exists('password', $validation)) ? 'is-invalid' : ''; ?>" id="password" name="password">
                    <div id="password" class="invalid-feedback">
                        <?= ($validation && array_key_exists('password', $validation)) ? $validation['password'] : ''; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pass_confirm">Konfirmasi Password</label>
                    <input type="password" class="form-control <?= ($validation && array_key_exists('pass_confirm', $validation)) ? 'is-invalid' : ''; ?>" id="pass_confirm" name="pass_confirm">
                    <div id="pass_confirm" class="invalid-feedback">
                        <?= ($validation && array_key_exists('pass_confirm', $validation)) ? $validation['pass_confirm'] : ''; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control <?= ($validation && array_key_exists('role', $validation)) ? 'is-invalid' : ''; ?>" id="role" name="role" value="<?= old('role'); ?>">
                        <option value="">Pilih Role</option>
                        <option value="Admin">Admin</option>
                        <option value="KABAG">KABAG</option>
                        <option value="Tim Survei">Tim Survei</option>
                    </select>
                    <div id="role" class="invalid-feedback">
                        <?= ($validation && array_key_exists('role', $validation)) ? $validation['role'] : ''; ?>
                    </div>
                </div>

                <button type="submit" class="custom-button btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>