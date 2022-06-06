<?php
if (empty($title)) {
    $title = '404 Page Not Found';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php if (isset($description)) : ?>
        <meta name="description" content="<?= $description; ?>" />
    <?php endif; ?>
    <meta name="author" content="Adikanime" />
    <title><?= esc($title); ?></title>
    <link href="/assets/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/assets/img/icon.png" />
    <script src="/assets/vendor/font-awesome/all.min.js"></script>
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand ml-2" href="/">My Animelist</a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-3 d-md-none">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i></a>
                <!-- Dropdown - Search-->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                    <form action="/search/" method="get" class="form-inline mr-auto w-100">
                        <div class="input-group input-group-joined input-group-solid">
                            <input class="form-control" type="text" placeholder="Search for..." name="q" minlength="3" maxlength="50" autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <form action="/search/" method="get" class="form-inline mr-auto d-none d-md-block">
                <div class="input-group input-group-joined input-group-solid mr-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="q" minlength="3" maxlength="50" autocomplete="off">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <a class="nav-link mt-3" href="/">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-home"></i></div>
                            Homepage
                        </a>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#admin" aria-expanded="false" aria-controls="admin">
                                <div class="nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                Admin
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="admin" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                    <a class="nav-link" href="/admin">
                                        Admin Area
                                    </a>
                                    <a class="nav-link" href="/admin/setting">
                                        Admin Setting
                                    </a>
                                </nav>
                            </div>
                        <?php endif; ?>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#top-anime" aria-expanded="false" aria-controls="top-anime">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-fire"></i></div>
                            Top Anime
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="top-anime" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <a class="nav-link" href="/anime">
                                    Top 12 Anime
                                </a>
                                <a class="nav-link" href="/anime/top/all">
                                    Top Anime All
                                </a>
                                <a class="nav-link" href="/anime/top/airing">
                                    Top Anime Airing
                                </a>
                                <a class="nav-link" href="/anime/top/upcoming">
                                    Top Anime Upcoming
                                </a>
                                <a class="nav-link" href="/anime/top/tv">
                                    Top Anime TV Series
                                </a>
                                <a class="nav-link" href="/anime/top/ova">
                                    Top Anime OVA Series
                                </a>
                                <a class="nav-link" href="/anime/top/movie">
                                    Top Anime Movies
                                </a>
                                <a class="nav-link" href="/anime/top/special">
                                    Top Anime Specials
                                </a>
                                <a class="nav-link" href="/anime/top/bypopularity">
                                    Top Anime Popularity
                                </a>
                                <a class="nav-link" href="/anime/top/favorite">
                                    Top Anime Favorite
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#season-anime" aria-expanded="false" aria-controls="season-anime">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-poll-h"></i></div>
                            Season Anime
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="season-anime" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <a class="nav-link" href="/anime/season/winter/2022">
                                    Anime Winter 2022
                                </a>
                                <a class="nav-link" href="/anime/season/spring/2022">
                                    Anime Spring 2022
                                </a>
                                <a class="nav-link" href="/anime/season/summer/2022">
                                    Anime Summer 2022
                                </a>
                                <a class="nav-link" href="/anime/season/fall/2022">
                                    Anime Fall 2022
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#top-manga" aria-expanded="false" aria-controls="top-manga">
                            <div class="nav-link-icon"><i class="fas fa-fw fa-book"></i></div>
                            Top Manga
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="top-manga" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <a class="nav-link" href="/manga">
                                    Top 12 Manga
                                </a>
                                <a class="nav-link" href="/manga/top/all">
                                    Top Manga All
                                </a>
                                <a class="nav-link" href="/manga/top/manga">
                                    Top Manga
                                </a>
                                <a class="nav-link" href="/manga/top/lightnovels">
                                    Top Novels
                                </a>
                                <a class="nav-link" href="/manga/top/oneshots">
                                    Top One-shots
                                </a>
                                <a class="nav-link" href="/manga/top/doujin">
                                    Top Doujin
                                </a>
                                <a class="nav-link" href="/manga/top/manhwa">
                                    Top Manhwa
                                </a>
                                <a class="nav-link" href="/manga/top/bypopularity">
                                    Top Manga Popularity
                                </a>
                                <a class="nav-link" href="/manga/top/favorite">
                                    Top Manga Favorite
                                </a>
                            </nav>
                        </div>
                        <?php if (session()->get('username')) : ?>
                            <a class="nav-link" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-sign-out-alt"></i></div>
                                Logout
                            </a>
                        <?php else : ?>
                            <a class="nav-link" href="/login">
                                <div class="nav-link-icon"><i class="fas fa-fw fa-sign-in-alt"></i></div>
                                Login
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as:</div>
                        <div class="sidenav-footer-subtitle"><?= (session()->get('name') ? session()->get('name') : 'Guest'); ?></div>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">