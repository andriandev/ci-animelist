<div class="row justify-content-center mb-4">
    <div class="col-sm-12 col-md-10 col-lg-8">
        <nav>
            <div class="nav nav-tabs flex-row" id="nav-tab" role="tablist">
                <a class="nav-link active flex-fill text-center" id="nav-anime-tab" data-toggle="tab" href="#nav-anime" role="tab" aria-controls="nav-anime" aria-selected="true">Anime</a>
                <a class="nav-link flex-fill text-center" id="nav-manga-tab" data-toggle="tab" href="#nav-manga" role="tab" aria-controls="nav-manga" aria-selected="true">Manga</a>
            </div>
        </nav>
    </div>
</div>

<div class="tab-content" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-anime" role="tabpanel" aria-labelledby="nav-anime-tab">
        <?php if (isset($anime['data'])) : ?>
            <?php if (empty($anime['data'])) : ?>
                <div class="row">
                    <div class="col text-center">
                        <h5 class="my-5">Anime Not Found !</h5>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
                <?php foreach ($anime['data'] as $a) : ?>
                    <?= printAnime($a); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="tab-pane fade show" id="nav-manga" role="tabpanel" aria-labelledby="nav-manga-tab">
        <?php if (isset($manga['data'])) : ?>
            <?php if (empty($manga['data'])) : ?>
                <div class="row">
                    <div class="col text-center">
                        <h5 class="my-5">Manga Not Found !</h5>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center">
                <?php foreach ($manga['data'] as $a) : ?>
                    <?= printManga($a); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<div class="row">
    <div class="col">
        <?= printPagination($url, $offset); ?>
    </div>
</div>