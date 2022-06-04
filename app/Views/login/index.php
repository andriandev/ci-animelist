<?= $this->extend('layout/template-login'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-xl-8 col-lg-8 col-md-10">

            <div class="card border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-8 col-md-10">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
                                </div>
                                <form class="user" action="/login/cek" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="veriv2" required value="<?= hash('sha256', date('s') + date('i')); ?>">
                                    <div class="form-group">
                                        <input type="teks" class="form-control form-control-user rounded-pill" name="username" autocomplete="off" required placeholder="Masukan username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user rounded-pill" name="password" required placeholder="Masukan password">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user rounded-pill" name="veriv" required placeholder="Hasil dari <?= date('s'); ?> + <?= date('i'); ?>">
                                    </div>
                                    <?php if (session()->getFlashdata('pesan')) : ?>
                                        <?= session()->getFlashdata('pesan'); ?>
                                    <?php endif; ?>
                                    <button type="submit" class="btn btn-primary btn-user btn-block rounded-pill">Login</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/register">Create an Account</a>
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