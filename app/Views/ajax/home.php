<div class="row">
    <div class="col text-left text-nowrap">
        <strong>Anime <?= ucwords($musim); ?> <?= $year; ?></strong>
    </div>
    <div class="col text-right text-nowrap">
        <a class="small" href="/anime/season/<?= $musim; ?>/<?= $year; ?>">View More</a>
    </div>
</div>
<hr class="mt-0">
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center mb-5">
    <?php foreach ($animeSeasonal as $a) : ?>
        <?= printAnime($a); ?>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col text-left text-nowrap">
        <strong>Novels Favorite</strong>
    </div>
    <div class="col text-right text-nowrap">
        <a class="small" href="/manga/top/lightnovels">View More</a>
    </div>
</div>
<hr class="mt-0">
<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
    <?php foreach ($mangaNovels as $a) : ?>
        <?= printManga($a); ?>
    <?php endforeach; ?>
</div>