<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <header class="bg-light">
        <div class="container">
            <div class="page-header-content">
                <ol class="breadcrumb mb-0 mt-4 text-nowrap flex-nowrap overflow-auto">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Manga</li>
                    <li class="breadcrumb-item active">Top</li>
                    <li class="breadcrumb-item active"><?= ucwords($type); ?></li>
                </ol>
            </div>
        </div>
    </header>

    <div class="container mt-3">
        <div id="content-top-manga">
            <?= printLoader(); ?>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>