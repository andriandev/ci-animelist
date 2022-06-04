<?php if (isset($index_home) == true) : ?>
    <script>
        $(document).ready(function() {
            $('#content-home').load('/ajax/home');
        });
    </script>
<?php endif; ?>

<?php if (isset($index_anime) == true) : ?>
    <script>
        $(document).ready(function() {
            $('#content-index-anime').load('/ajax/index_anime');
        });
    </script>
<?php endif; ?>

<?php if (isset($index_manga) == true) : ?>
    <script>
        $(document).ready(function() {
            $('#content-index-manga').load('/ajax/index_manga');
        });
    </script>
<?php endif; ?>

<?php if (isset($_GET['q']) && isset($offset) && isset($index_search) == true) : ?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/ajax/search',
                type: 'post',
                data: {
                    'q': '<?= htmlspecialchars(strtolower($_GET['q'])); ?>',
                    'p': '<?= htmlspecialchars(strtolower($offset)); ?>'
                },
                success: function(result) {
                    $('#content-search').html(result);
                },
                error: function() {
                    $('#content-search').html(
                        `<div class="row">
                            <div class="col text-center">
                                <h5 class="mt-5">Search is Not Found !</h5>
                                <h5 class="mb-5">Try Again !</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link " href="#"><i class="fas fa-arrow-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="<?= $url . 1; ?>"><i class="fas fa-home"></i></a>
                                        </li>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>`
                    );
                }
            });
        });
    </script>
<?php endif; ?>

<?php if (isset($type) && isset($offset) && isset($top_anime) == true) : ?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/ajax/top_anime',
                type: 'post',
                data: {
                    'type': '<?= htmlspecialchars(strtolower($type)); ?>',
                    'offset': '<?= htmlspecialchars(strtolower($offset)); ?>'
                },
                success: function(result) {
                    $('#content-top-anime').html(result);
                },
                error: function() {
                    $('#content-top-anime').html(
                        `<div class="row">
                            <div class="col text-center">
                                <h5 class="mt-5">Top Anime is Not Found !</h5>
                            </div>
                        </div>`
                    );
                }
            });
        });
    </script>
<?php endif; ?>

<?php if (isset($season) && isset($year) && isset($offset) && isset($season_anime) == true) : ?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/ajax/season_anime',
                type: 'post',
                data: {
                    'season': '<?= htmlspecialchars(strtolower($season)); ?>',
                    'offset': '<?= htmlspecialchars(strtolower($offset)); ?>',
                    'year': '<?= htmlspecialchars(strtolower($year)); ?>',
                },
                success: function(result) {
                    $('#content-season-anime').html(result);
                },
                error: function() {
                    $('#content-season-anime').html(
                        `<div class="row">
                            <div class="col text-center">
                                <h5 class="my-5">Season Anime is Not Found !</h5>
                            </div>
                        </div>`
                    );
                }
            });
        });
    </script>
<?php endif; ?>

<?php if (isset($id) && isset($detail_anime) == true) : ?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/ajax/detail_anime',
                type: 'post',
                data: {
                    'id': '<?= htmlspecialchars(strtolower($id)); ?>'
                },
                success: function(result) {
                    $('#content-detail-anime').html(result);
                },
                error: function() {
                    $('#content-detail-anime').html(
                        `<div class="row">
                            <div class="col text-center">
                                <h5 class="my-5">Anime is Not Found !</h5>
                            </div>
                        </div>`
                    );
                }
            });
        });
    </script>
<?php endif; ?>

<?php if (isset($type) && isset($offset) && isset($top_manga) == true) : ?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/ajax/top_manga',
                type: 'post',
                data: {
                    'type': '<?= htmlspecialchars(strtolower($type)); ?>',
                    'offset': '<?= htmlspecialchars(strtolower($offset)); ?>'
                },
                success: function(result) {
                    $('#content-top-manga').html(result);
                },
                error: function() {
                    $('#content-top-manga').html(
                        `<div class="row">
                            <div class="col text-center">
                                <h5 class="mt-5">Top Manga is Not Found !</h5>
                            </div>
                        </div>`
                    );
                }
            });
        });
    </script>
<?php endif; ?>

<?php if (isset($id) && isset($detail_manga) == true) : ?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/ajax/detail_manga',
                type: 'post',
                data: {
                    'id': '<?= htmlspecialchars(strtolower($id)); ?>'
                },
                success: function(result) {
                    $('#content-detail-manga').html(result);
                },
                error: function() {
                    $('#content-detail-manga').html(
                        `<div class="row">
                            <div class="col text-center">
                                <h5 class="my-5">Manga is Not Found !</h5>
                            </div>
                        </div>`
                    );
                }
            });
        });
    </script>
<?php endif; ?>