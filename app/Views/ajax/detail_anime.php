<header class="bg-light">
    <div class="container">
        <div class="page-header-content">
            <ol class="breadcrumb mb-0 mt-4 text-nowrap flex-nowrap overflow-auto">
                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Anime</li>
                <li class="breadcrumb-item active" id="name_title"><?= $anime['title']; ?></li>
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
                        <?php if (isset($anime['main_picture']['medium'])) : ?>
                            <img src="<?= $anime['main_picture']['medium']; ?>" class="rounded mx-auto d-block img-thumbnail">
                        <?php else : ?>
                            <img src="/assets/img/img-blank.jpg" class="rounded mx-auto d-block img-thumbnail">
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive text-nowrap text-sm mt-2 text-center">
                        <ul class="list-group">
                            <?php if (isset($anime['mean']) && isset($anime['num_scoring_users'])) : ?>
                                <li>
                                    <i class="fas fa-star text-warning"></i> <?= (!empty($anime['mean']) ? $anime['mean'] : '0') . ' by ' . $anime['num_scoring_users'] . ' users'; ?>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($anime['rank'])) : ?>
                                <li>
                                    <i class="fas fa-trophy text-warning"></i> Ranked : <?= (!empty($anime['rank']) ? $anime['rank'] : '0'); ?>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($anime['popularity'])) : ?>
                                <li>
                                    <i class="fas fa-crown text-warning"></i> Popularity : <?= $anime['popularity']; ?>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($anime['start_season']['season']) && isset($anime['start_season']['year'])) : ?>
                                <li>
                                    <i class="fas fa-globe text-warning"></i> <?= ucwords($anime['start_season']['season']) . ' ' . $anime['start_season']['year']; ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-9">
                    <div class="table-responsive text-nowrap">
                        <p>
                            <strong>Title :</strong>
                            <?php if (isset($anime['title'])) : ?>
                                <?= $anime['title']; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Alt Title :</strong>
                            <?php if (isset($anime['alternative_titles']['en']) || isset($anime['alternative_titles']['ja'])) : ?>
                                <?= (!empty($anime['alternative_titles']['en']) ? $anime['alternative_titles']['en'] : $anime['alternative_titles']['ja']); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Type :</strong>
                            <?php if (isset($anime['media_type'])) : ?>
                                <?= ucwords($anime['media_type']); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Genres :</strong>
                            <?php if (isset($anime['genres'])) : ?>
                                <?php foreach ($anime['genres'] as $a) : ?>
                                    <?= $a['name'] . ','; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Episode :</strong>
                            <?php if (isset($anime['num_episodes'])) : ?>
                                <?= $anime['num_episodes']; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Duration :</strong>
                            <?php if (isset($anime['average_episode_duration']) && $anime['num_episodes']) : ?>
                                <?= convertTime($anime['average_episode_duration']); ?> <?= ($anime['num_episodes'] > 1 ? '/ episode' : ''); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Release :</strong>
                            <?php if (isset($anime['start_date'])) : ?>
                                <?= $anime['start_date']; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Status :</strong>
                            <?php if (isset($anime['status'])) : ?>
                                <?php if (isset($anime['status'])) : ?>
                                    <?php
                                    if ($anime['status'] == 'currently_airing') {
                                        echo 'Ongoing';
                                    } else if ($anime['status'] == 'finished_airing') {
                                        echo 'Complete';
                                    } else {
                                        echo preg_replace("/[^a-zA-Z]/", " ", ucwords($anime['status']));;
                                    }
                                    ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Source :</strong>
                            <?php if (isset($anime['source'])) : ?>
                                <?= preg_replace("/[^a-zA-Z]/", " ", ucwords($anime['source'])); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <strong>Studios :</strong>
                            <?php if (isset($anime['studios'])) : ?>
                                <?php foreach ($anime['studios'] as $a) : ?>
                                    <?= $a['name'] . ','; ?>
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
                    <?php if (isset($anime['synopsis'])) : ?>
                        <?= (!empty($anime['synopsis']) ? $anime['synopsis'] : 'No Data'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col text-left">
                            <strong>Related Anime :</strong>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="table-responsive text-nowrap">
                        <ul class="list-group list-group-flush">
                            <?php if (isset($anime['related_anime'])) : ?>
                                <?php foreach ($anime['related_anime'] as $a) : ?>
                                    <li class="list-group-item"><?= $a['relation_type_formatted']; ?> : <a href="/anime/<?= $a['node']['id'] . '/' . url_title($a['node']['title'], '-', true);  ?>"><?= $a['node']['title']; ?></a></li>
                                <?php endforeach; ?>
                                <?= (empty($anime['related_anime']) ? 'No Data' : ''); ?>
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
                    <strong>Suggestion Anime</strong>
                </div>
            </div>
            <hr class="my-1">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 justify-content-center mt-2">
                <?php foreach ($animeSuggestion['data'] as $a) : ?>
                    <?= printAnime($a); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('title').html('<?= $anime['title']; ?>');
    });
</script>