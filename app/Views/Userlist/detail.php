<?= $this->extend('Userlist/Template/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Card Heading -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">User Detail</h1>
    <div class="card shadow mb-3" style="max-width: 750px;">
        <div class="row g-0">

            <!-- Mengambil data foto profile -->
            <div class="col-md-4 d-flex align-items-center justify-content-center pl-5">
                <img src="<?= base_url('/login/img_profile/' . $user['image']); ?>" class="img-fluid rounded-start profile-image" alt="<?= $user['username']; ?>">
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <!-- Mengambil data username -->
                        <li class="list-group-item">
                            <h5 class="mb-0"><?= $user['username']; ?></h5>
                        </li>

                        <!-- Mengambil data nama lengkap -->
                        <?php if ($user['fullname']) : ?>
                            <li class="list-group-item">
                                <h6 class="mb-0"><?= $user['fullname']; ?></h6>
                            </li>
                        <?php endif; ?>

                        <li class="list-group-item">
                            <span class="badge badge-<?= ($user['role'] == 'Admin') ? 'danger' : (($user['role'] == 'Tim Survei') ? 'warning' : (($user['role'] == 'KABAG') ? 'success' : 'secondary')); ?>"><?= $user['role']; ?></span>
                        </li>

                        <!-- Tombol kembali ke halaman sebelumnya -->
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <small><a href="<?= base_url('Userlist'); ?>">&laquo; Back to User List</a></small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>