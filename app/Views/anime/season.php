<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <header class="bg-light">
        <div class="container">
            <div class="page-header-content">
                <ol class="breadcrumb mb-0 mt-4 text-nowrap flex-nowrap overflow-auto">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Anime</li>
                    <li class="breadcrumb-item active"><?= ucwords($season); ?></li>
                    <li class="breadcrumb-item active"><?= $year; ?></li>
                </ol>
            </div>
        </div>
    </header>

    <div class="container mt-3">
        <div id="content-season-anime">
            <?= printLoader(); ?>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>