<div class="row justify-content-center mb-4">
    <div class="col-sm-12 col-md-10 col-lg-8">
        <nav>
            <div class="nav nav-tabs flex-row" id="nav-tab" role="tablist">
                <a class="nav-link active flex-fill text-center" id="nav-airing-tab" data-toggle="tab" href="#nav-airing" role="tab" aria-controls="nav-airing" aria-selected="true">Airing</a>
                <a class="nav-link flex-fill text-center" id="nav-movie-tab" data-toggle="tab" href="#nav-movie" role="tab" aria-controls="nav-movie" aria-selected="true">Movie</a>
                <a class="nav-link flex-fill text-center" id="nav-series-tab" data-toggle="tab" href="#nav-series" role="tab" aria-controls="nav-series" aria-selected="false">Series</a>
            </div>
        </nav>
    </div>
</div>

<div class="tab-content" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-airing" role="tabpanel" aria-labelledby="nav-airing-tab">
        <div class="row">
            <div class="col text-left text-nowrap">
                <strong>12 Top Airing Anime</strong>
            </div>
            <div class="col text-right">
                <a class="small" href="/anime/top/airing">View More</a>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
            <?php foreach ($airing as $a) : ?>
                <?= printAnime($a); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="tab-pane fade" id="nav-movie" role="tabpanel" aria-labelledby="nav-movie-tab">
        <div class="row">
            <div class="col text-left text-nowrap">
                <strong>12 Top Movie Anime</strong>
            </div>
            <div class="col text-right">
                <a class="small" href="/anime/top/movie">View More</a>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
            <?php foreach ($movie as $m) : ?>
                <?= printAnime($m); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="tab-pane fade" id="nav-series" role="tabpanel" aria-labelledby="nav-series-tab">
        <div class="row">
            <div class="col text-left text-nowrap">
                <strong>12 Top Series Anime</strong>
            </div>
            <div class="col text-right">
                <a class="small" href="/anime/top/tv">View More</a>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
            <?php foreach ($series as $s) : ?>
                <?= printAnime($s); ?>
            <?php endforeach; ?>
        </div>
    </div>

</div>