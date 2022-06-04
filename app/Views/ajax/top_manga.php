<div class="row">
    <div class="col text-left">
        <strong>Top <?= $type; ?></strong>
    </div>
</div>
<hr class="mt-0">
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
    <?php foreach ($mangaTop['data'] as $a) : ?>
        <?= printManga($a); ?>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col">
        <?= printPagination($url, $offset); ?>
    </div>
</div>