<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div id="content-detail-manga">
        <img src="/assets/img/data/adikanime-1.gif " class="img-fluid mx-auto d-block mt-5">
        <img src="/assets/img/data/loader.gif " class="img-fluid mx-auto d-block">
        <p class="text-center">Loading...</p>
    </div>
</main>
<?= $this->endSection(); ?>