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
                                    <h1 class="h4 text-gray-900 mb-4">Ubah Password</h1>
                                </div>

                                <form action="<?= url_to('Auth/ubahPassword') ?>" method="post" class="user">
                                    <?= csrf_field() ?>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= (isset($validation) && array_key_exists('new_password', $validation)) ? 'is-invalid' : ''; ?>" id="new_password" name="new_password" placeholder="Password Baru">
                                        <div id="new_password" class="invalid-feedback">
                                            <?= (isset($validation) && array_key_exists('new_password', $validation)) ? $validation['new_password'] : ''; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= (isset($validation) && array_key_exists('confirm_password', $validation)) ? 'is-invalid' : ''; ?>" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password Baru">
                                        <div id="confirm_password" class="invalid-feedback">
                                            <?= (isset($validation) && array_key_exists('confirm_password', $validation)) ? $validation['confirm_password'] : ''; ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Ubah Password</button>
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