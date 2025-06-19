<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

<!-- Card Header -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 btn-green">
            <h6 class="m-0 font-weight-bold">Mengubah Data Profile</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Profile/update/' . user()['id']); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="fotoLama" value="<?= user()['image']; ?>">

                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('username', $validation)) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= user()['username']; ?>">
                    <div id="username" class="invalid-feedback">
                        <?= ($validation && array_key_exists('username', $validation)) ? $validation['username'] : ''; ?>
                    </div>
                </div>

                <!-- Nama lengkap -->
                <div class="mb-3">
                    <label for="fullname" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control <?= ($validation && array_key_exists('fullname', $validation)) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" value="<?= user()['fullname']; ?>">
                    <div id="fullname" class="invalid-feedback">
                        <?= ($validation && array_key_exists('fullname', $validation)) ? $validation['fullname'] : ''; ?>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?= ($validation && array_key_exists('password', $validation)) ? 'is-invalid' : ''; ?>" id="password" name="password">
                    <div id="password" class="invalid-feedback">
                        <?= ($validation && array_key_exists('password', $validation)) ? $validation['password'] : ''; ?>
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label for="pass_confirm" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control <?= ($validation && array_key_exists('pass_confirm', $validation)) ? 'is-invalid' : ''; ?>" id="pass_confirm" name="pass_confirm">
                    <div id="pass_confirm" class="invalid-feedback">
                        <?= ($validation && array_key_exists('pass_confirm', $validation)) ? $validation['pass_confirm'] : ''; ?>
                    </div>
                </div>

                <!-- Foto profile -->
                <div class="form-group row">
                    <label for="foto" class="col-sm-1 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/login/img_profile/<?= user()['image']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation && array_key_exists('image', $validation)) ? 'is-invalid' : ''; ?>" name="image" id="image" onchange="previewProfile()">
                            <div id="image" class="invalid-feedback">
                                <?= ($validation && array_key_exists('image', $validation)) ? $validation['image'] : ''; ?>
                            </div>
                            <label class="custom-file-label" for="image"><?= user()['image']; ?></label>
                        </div>
                    </div>
                </div>

                <!-- Tombol ubah profile -->
                <button type="submit" class="custom-button btn-sm">Ubah Profile</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>