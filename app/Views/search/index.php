<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <header class="bg-light">
        <div class="container">
            <div class="page-header-content">
                <ol class="breadcrumb mb-0 mt-4 text-nowrap flex-nowrap overflow-auto">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Search</li>
                    <li class="breadcrumb-item active"><?= $judul; ?></li>
                </ol>
            </div>
        </div>
    </header>

    <div class="container mt-3">
        <div id="content-search">
            <img src="/assets/img/data/adikanime-1.gif " class="img-fluid mx-auto d-block mt-5">
            <img src="/assets/img/data/loader.gif " class="img-fluid mx-auto d-block">
            <p class="text-center">Loading...</p>
        </div>
    </div>

</main>
<?= $this->endSection(); ?>