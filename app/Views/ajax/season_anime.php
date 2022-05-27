<div class="row">
    <div class="col text-left">
        <strong>Anime <?= ucwords($animeSeasonal['season']['season']) . ' ' . $animeSeasonal['season']['year']; ?></strong>
    </div>
</div>
<hr class="mt-0">
<?php if (empty($animeSeasonal['data'])) : ?>
    <div class="row">
        <div class="col text-center">
            <h5 class="my-5">Season Anime is Not Found !</h5>
        </div>
    </div>
<?php endif; ?>
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
    <?php foreach ($animeSeasonal['data'] as $a) : ?>
        <?= printAnime($a); ?>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col">
        <?= printPagination($url, $offset); ?>
    </div>
</div>