<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mt-4">
                    <img class="img-fluid p-4" src="/assets/img/freepik/404-error-pana.svg" alt />
                    <p class="lead">This requested URL was not found on this server.</p>
                    <a class="text-arrow-icon" href="/">
                        <i class="ml-0 mr-1 fas fa-arrow-left"></i>
                        Return to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>