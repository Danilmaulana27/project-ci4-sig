<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="container-fluid ">
    <h1 class="h3 mb-4 text-gray-800">Profile Saya</h1>
    <div class="card shadow mb-3 " style="max-width: 750px;">
        <div class="row g-0">

            <!-- Foto Profil -->
            <div class="col-md-4 d-flex align-items-center justify-content-center pl-5">
                <img src="<?= base_url('/login/img_profile/' . user()['image']); ?>" class="img-fluid rounded-start profile-image " alt="<?= user()['username']; ?>">
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <ul class="list-group list-group-flush ">

                        <!-- Username -->
                        <li class="list-group-item">
                            <h5 class="mb-0"><?= user()['username']; ?></h5>
                        </li>

                        <!-- Nama Lengkap -->
                        <?php if (user()['fullname']) : ?>
                            <li class="list-group-item">
                                <h6 class="mb-0"><?= user()['fullname']; ?></h6>
                            </li>
                        <?php endif; ?>

                        <!-- Tombol Edit -->
                        <li class="list-group-item">
                            <form action="<?= base_url('Profile/edit'); ?>" method="get">
                                <button type="submit" class="custom-button btn-sm">Edit Profile</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>