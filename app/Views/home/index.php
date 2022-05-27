<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container mt-3">
        <div class="alert alert-primary text-center" role="alert">
            Welcome to My Animelist Enjoy Everyday.
        </div>

        <div id="content-home">
            <img src="/assets/img/data/adikanime-1.gif " class="img-fluid mx-auto d-block mt-3">
            <img src="/assets/img/data/loader.gif " class="img-fluid mx-auto d-block">
            <p class="text-center">Loading...</p>
        </div>

    </div>
</main>
<?= $this->endSection(); ?>