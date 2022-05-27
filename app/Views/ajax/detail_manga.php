<header class="bg-light">
    <div class="container">
        <div class="page-header-content">
            <ol class="breadcrumb mb-0 mt-4 text-nowrap flex-nowrap overflow-auto">
                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active"><?= (isset($manga['media_type']) ? ucwords($manga['media_type']) : 'Manga'); ?></li>
                <li class="breadcrumb-item active"><?= $manga['title']; ?></li>
            </ol>
        </div>
    </div>
</header>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-3 mb-4">
                    <div class="table-responsive text-nowrap">
                        <?php if (isset($manga['main_picture']['medium'])) : ?>
                            <img src="<?= $manga['main_picture']['medium']; ?>" class="rounded mx-auto d-block img-thumbnail">
                        <?php else : ?>
                            <img src="/assets/img/img-blank.jpg" class="rounded mx-auto d-block img-thumbnail">
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive text-nowrap text-sm mt-2 text-center">
                        <ul class="list-group">
                            <?php if (isset($manga['mean']) && isset($manga['num_scoring_users'])) : ?>
                                <li>
                                    <i class="fas fa-star text-warning"></i> <?= (!empty($manga['mean']) ? $manga['mean'] : '0') . ' by ' . $manga['num_scoring_users'] . ' users'; ?>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($manga['rank'])) : ?>
                                <li>
                                    <i class="fas fa-trophy text-warning"></i> Ranked : <?= (!empty($manga['rank']) ? $manga['rank'] : '0'); ?>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($manga['popularity'])) : ?>
                                <li>
                                    <i class="fas fa-crown text-warning"></i> Popularity : <?= $manga['popularity']; ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-9">
                    <div class="table-responsive text-nowrap">
                        <p>
                            <strong>Title :</strong>
                            <?php if (isset($manga['title'])) : ?>
                                <?= $manga['title']; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Alt Title :</strong>
                            <?php if (isset($manga['alternative_titles']['en']) && isset($manga['alternative_titles']['ja'])) : ?>
                                <?= (!empty($manga['alternative_titles']['en']) ? $manga['alternative_titles']['en'] : $manga['alternative_titles']['ja']); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Type :</strong>
                            <?php if (isset($manga['media_type'])) : ?>
                                <?= ucwords($manga['media_type']); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Genres :</strong>
                            <?php if (isset($manga['genres'])) : ?>
                                <?php foreach ($manga['genres'] as $a) : ?>
                                    <?= $a['name'] . ','; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Volume :</strong>
                            <?php if (isset($manga['num_volumes'])) : ?>
                                <?= $manga['num_volumes']; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Chapters :</strong>
                            <?php if (isset($manga['num_chapters'])) : ?>
                                <?= $manga['num_chapters']; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Release :</strong>
                            <?php if (isset($manga['start_date'])) : ?>
                                <?= $manga['start_date']; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Status :</strong>
                            <?php if (isset($manga['status'])) : ?>
                                <?php
                                if ($manga['status'] == 'currently_publishing') {
                                    echo 'Ongoing';
                                } else if ($manga['status'] == 'finished_publishing') {
                                    echo 'Complete';
                                } else {
                                    echo preg_replace("/[^a-zA-Z]/", " ", ucwords($manga['status']));;
                                }
                                ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Authors :</strong>
                            <?php if (isset($manga['authors'])) : ?>
                                <?php foreach ($manga['authors'] as $m) : ?>
                                    <?= $m['node']['first_name'] . ' ' . $m['node']['last_name'] . ','; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Serialization :</strong>
                            <?php if (isset($manga['serialization'])) : ?>
                                <?php foreach ($manga['serialization'] as $m) : ?>
                                    <?= $m['node']['name'] . ','; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col text-left">
                            <strong>Synopsis :</strong>
                        </div>
                    </div>
                    <hr class="my-1">
                    <?php if (isset($manga['synopsis'])) : ?>
                        <?= (!empty($manga['synopsis']) ? $manga['synopsis'] : 'No Data'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col text-left">
                            <strong>Related <?= (isset($manga['media_type']) ? ucwords($manga['media_type']) : 'Manga'); ?> :</strong>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="table-responsive text-nowrap">
                        <ul class="list-group list-group-flush">
                            <?php if (isset($manga['related_manga'])) : ?>
                                <?php foreach ($manga['related_manga'] as $a) : ?>
                                    <li class="list-group-item"><?= $a['relation_type_formatted']; ?> : <a href="/manga/<?= $a['node']['id'] . '/' . url_title($a['node']['title'], '-', true);  ?>"><?= $a['node']['title']; ?></a></li>
                                <?php endforeach; ?>
                                <?= (empty($manga['related_manga']) ? 'No Data' : ''); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="row">
                <div class="col text-center">
                    <strong>Suggestion Manga</strong>
                </div>
            </div>
            <hr class="my-1">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center mt-2">
                <?php foreach ($mangaRank['data'] as $a) : ?>
                    <?= printManga($a); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('title').html('<?= $manga['title']; ?>');
    });
</script>