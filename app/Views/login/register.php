<?= $this->extend('layout/template-login'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-xl-8 col-lg-9 col-md-10">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-9 col-md-10">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Form Register</h1>
                                </div>
                                <form class="user" action="/register/cek" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="veriv2" required value="<?= hash('sha256', date('s') + date('i')); ?>">
                                    <div class="form-group">
                                        <input type="teks" class="form-control form-control-user rounded-pill <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" required autocomplete="off" placeholder="Masukan username">
                                    </div>
                                    <div class="form-group">
                                        <input type="teks" class="form-control form-control-user rounded-pill <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" name="name" required autocomplete="off" placeholder="Masukan public name">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user rounded-pill <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" required placeholder="Masukan password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user rounded-pill <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" name="password2" required placeholder="Masukan password kembali">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user rounded-pill <?= ($validation->hasError('veriv') || $validation->hasError('veriv2')) ? 'is-invalid' : ''; ?>" name="veriv" required placeholder="Hasil dari <?= date('s'); ?> + <?= date('i'); ?>">
                                        <div class="invalid-feedback text-center">
                                            <?= $validation->getError('veriv'); ?>
                                            <?= $validation->getError('veriv2'); ?>
                                        </div>
                                    </div>
                                    <?php if (session()->getFlashdata('pesan')) : ?>
                                        <?= session()->getFlashdata('pesan'); ?>
                                    <?php endif; ?>
                                    <button type="submit" class="btn btn-primary btn-user btn-block rounded-pill">Register</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account? Login!</a>
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