<div class="row justify-content-center mb-4">
    <div class="col-sm-12 col-md-10 col-lg-8">
        <nav>
            <div class="nav nav-tabs flex-row" id="nav-tab" role="tablist">
                <a class="nav-link active flex-fill text-center" id="nav-manga-tab" data-toggle="tab" href="#nav-manga" role="tab" aria-controls="nav-manga" aria-selected="true">Manga</a>
                <a class="nav-link flex-fill text-center" id="nav-novels-tab" data-toggle="tab" href="#nav-novels" role="tab" aria-controls="nav-novels" aria-selected="true">Novels</a>
                <a class="nav-link flex-fill text-center" id="nav-favorite-tab" data-toggle="tab" href="#nav-favorite" role="tab" aria-controls="nav-favorite" aria-selected="false">Favorite</a>
            </div>
        </nav>
    </div>
</div>

<div class="tab-content" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-manga" role="tabpanel" aria-labelledby="nav-manga-tab">
        <div class="row">
            <div class="col text-left text-nowrap">
                <strong>12 Top Manga</strong>
            </div>
            <div class="col text-right">
                <a class="small" href="/manga/top/manga">View More</a>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
            <?php foreach ($manga as $a) : ?>
                <?= printManga($a); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="tab-pane fade" id="nav-novels" role="tabpanel" aria-labelledby="nav-novels-tab">
        <div class="row">
            <div class="col text-left text-nowrap">
                <strong>12 Top Novels</strong>
            </div>
            <div class="col text-right">
                <a class="small" href="/manga/top/lightnovels">View More</a>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
            <?php foreach ($novels as $a) : ?>
                <?= printManga($a); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="tab-pane fade" id="nav-favorite" role="tabpanel" aria-labelledby="nav-favorite-tab">
        <div class="row">
            <div class="col text-left text-nowrap">
                <strong>12 Top Manga Favorite</strong>
            </div>
            <div class="col text-right">
                <a class="small" href="/manga/top/favorite">View More</a>
            </div>
        </div>
        <hr class="mt-0">
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
            <?php foreach ($favorite as $a) : ?>
                <?= printManga($a); ?>
            <?php endforeach; ?>
        </div>
    </div>

</div>