<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container mt-3">
        <div class="alert alert-primary text-center" role="alert">
            Welcome to My Animelist Enjoy Everyday.
        </div>

        <div id="content-home">
            <?= printLoader(); ?>
        </div>

    </div>
</main>
<?= $this->endSection(); ?>