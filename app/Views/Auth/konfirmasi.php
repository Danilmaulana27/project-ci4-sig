<?= $this->extend('Auth/Template/index'); ?>

<?= $this->section('login'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Konfirmasi Username</h1>
                                </div>

                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>

                                <form action="<?= url_to('Auth/konfirmasi') ?>" method="post" class="user">
                                    <?= csrf_field() ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= (isset($validation) && array_key_exists('username', $validation)) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Username">
                                        <div id="username" class="invalid-feedback">
                                            <?= (isset($validation) && array_key_exists('username', $validation)) ? $validation['username'] : ''; ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Konfirmasi</button>
                                </form>

                                <div class="text-center">
                                    <a class="small" href="<?= url_to('Auth/index') ?>">Kembali ke halaman Login</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>