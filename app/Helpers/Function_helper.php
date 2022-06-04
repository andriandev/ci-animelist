<?php

function convertTime($time)
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 3600) . ' hours ';
    $minutes = date('i', $time) . ' minutes ';
    if ($hours == 0) {
        $result = $minutes;
    } else {
        $result = $hours . $minutes;
    }
    return $result;
}

function queryUserByUsername($username)
{
    $adminModel = new \App\Models\Admin_Model();
    return $adminModel->where(['username' => $username])->first();
}

function printAnime($data)
{
    // Mengambil data rating anime
    if (isset($data['node']['mean'])) {
        $mean = ($data['node']['mean'] ? $data['node']['mean'] : '0');
    } else {
        $mean = 0;
    }

    // Mengambil data type anime
    if ($data['node']['media_type'] == "unknown") {
        $media_type = "? ? ?";
    } else if ($data['node']['media_type'] == "tv") {
        $media_type = "Series";
    } else {
        $media_type = ucwords($data['node']['media_type']);
    }

    // Mengambil data poster anime
    $main_picture = ($data['node']['main_picture']['medium'] ? $data['node']['main_picture']['medium'] : '/assets/img/img-blank.jpg');

    return "<div class='col mb-4'>
                <div class='card h-100 shadow'>
                    <span class='text-sm tex-left badge-bg-left'></span>
                    <span class='text-sm tex-left badge-rate-left'>
                        <i class='fas fa-star text-yellow'></i> " . $mean . "</span>
                    <span class='text-sm tex-right badge-bg-right'></span>
                    <span class='text-sm tex-right badge-rate-right'>" . $media_type . "</span>                  
                    <img src='" . $main_picture . "' class='card-img-top'>
                    <div class='card-body text-center'>
                        <h6 class='card-title'>" . $data['node']['title'] . "</h6>
                    </div>
                    <div class='card-footer text-center text-muted'>
                        <a href='/anime/" . $data['node']['id'] . "/" . url_title($data['node']['title'], '-', true) . "' class='badge badge-primary px-3 py-2'> Detail</a>
                    </div>
                </div>
            </div>";
}

function printManga($data)
{
    // Mengambil data rating manga
    if (isset($data['node']['mean'])) {
        $mean = ($data['node']['mean'] ? $data['node']['mean'] : '0');
    } else {
        $mean = 0;
    }

    // Mengambil data type manga
    if ($data['node']['media_type'] == "unknown") {
        $media_type = "? ? ?";
    } else if ($data['node']['media_type'] == "one_shot") {
        $media_type = "OneS";
    } else if ($data['node']['media_type'] == "doujinshi") {
        $media_type = "Doujin";
    } else if ($data['node']['media_type'] == "manhwa") {
        $media_type = "Manwa";
    } else if ($data['node']['media_type'] == "light_novel") {
        $media_type = "Novel";
    } else {
        $media_type = ucwords($data['node']['media_type']);
    }

    // Mengambil data poster manga
    $main_picture = ($data['node']['main_picture']['medium'] ? $data['node']['main_picture']['medium'] : '/assets/img/img-blank.jpg');

    return "<div class='col mb-4'>
                <div class='card h-100 shadow'>
                    <span class='text-sm tex-left badge-bg-left'></span>
                    <span class='text-sm tex-left badge-rate-left'>
                        <i class='fas fa-star text-yellow'></i> " . $mean . "</span>
                    <span class='text-sm tex-right badge-bg-right'></span>
                    <span class='text-sm tex-right badge-rate-right'>" . $media_type . "</span>                  
                    <img src='" . $main_picture . "' class='card-img-top'>
                    <div class='card-body text-center'>
                        <h6 class='card-title'>" . $data['node']['title'] . "</h6>
                    </div>
                    <div class='card-footer text-center text-muted'>
                        <a href='/manga/" . $data['node']['id'] . "/" . url_title($data['node']['title'], '-', true) . "' class='badge badge-primary px-3 py-2'> Detail</a>
                    </div>
                </div>
            </div>";
}

function printPagination($url, $offset)
{
    if ($offset <= 1) {
        $left = $offset;
        $disabled = 'disabled';
    } else {
        $left = $offset - 1;
        $disabled = '';
    }

    return "<nav>
                <ul class='pagination justify-content-center'>
                    <li class='page-item " . $disabled . "'>
                        <a class='page-link' href='" . $url . $left . "'><i class='fas fa-arrow-left'></i></a>
                    </li>
                    <li class='page-item'>
                        <a class='page-link' href='" . $url . "'><i class='fas fa-home'></i></a>
                    </li>
                    <li class='page-item'>
                        <a class='page-link' href='" . $url . ($offset + 1) . "'><i class='fas fa-arrow-right'></i></a>
                    </li>
                </ul>
            </nav>";
}

function printLoader()
{
    return '<img src="/assets/img/data/loader-sing.gif " class="img-fluid mx-auto d-block mt-3">
            <img src="/assets/img/data/loader.gif " class="img-fluid mx-auto d-block">
            <p class="text-center">Loading...</p>';
}
