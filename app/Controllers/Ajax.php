<?php

namespace App\Controllers;

class Ajax extends BaseController
{
    // Variabel crurlModel
    protected $curlModel;
    protected $cache;

    public function __construct()
    {
        // Inisialisasi model
        $this->curlModel = new \App\Models\Curl_Model();
        $this->cache = \Config\Services::cache();
    }

    public function home()
    {
        if (!'ajaxHome' == cache('ajaxHome')) {
            // Function untuk ambil data anime dari MAL
            $num = substr(str_shuffle('0123'), 0, 1);
            $limit = 6;
            // Untuk anime musiman home
            $musim = 'spring';
            $year = date('Y');

            $animeSeasonal = $this->curlModel->getAnimeSeasonal($year, $musim, $limit, $num * $limit)['data'];
            $mangaNovels = $this->curlModel->getMangaRanking('lightnovels', $limit, $num * $limit)['data'];

            // Mengirim data ke view
            $data = [
                'title' => 'My Animelist - Top List Anime and Manga',
                'musim' => $musim,
                'year' => $year,
                'animeSeasonal' => $animeSeasonal,
                'mangaNovels' => $mangaNovels
            ];

            // Save cache 7 hari
            $this->cache->save('ajaxHome', $data, 604800);
        } else {
            $data = $this->cache->get('ajaxHome');
        }

        return view('ajax/home', $data);
    }

    public function search()
    {
        // Menangkap inputan $_GET
        $judul = htmlspecialchars(strtolower($this->request->getVar('q')));
        $offset = htmlspecialchars(($this->request->getVar('p') ? $this->request->getVar('p') : 1));
        $type = 'anime';
        $types = 'manga';

        // Jika judul kosong arahkan ke 404
        if (empty($judul) || empty($type) || empty($types) || $type != 'anime' || $types != 'manga') {
            return view('error/notfound');
        }

        // Mengambil data anime dan manga berdasarkan judul
        $limit = 12;
        $anime = $this->curlModel->getSearch($judul, $type, $limit, ($offset - 1) * $limit);
        $manga = $this->curlModel->getSearch($judul, $types, $limit, ($offset - 1) * $limit);

        // Url untuk pagination
        $url = '/search/?q=' . url_title($judul, '+', true) . '&p=';

        // Mengirim data ke view
        $data = [
            'home' => url_title($judul, '+', true),
            'anime' => $anime,
            'manga' => $manga,
            'url' => $url,
            'offset' => $offset
        ];

        return view('ajax/search', $data);
    }

    public function index_anime()
    {
        if (!'indexAnime' == cache('indexAnime')) {
            // Function untuk ambil data dari MAL
            $anime = [
                'airing' => $this->curlModel->getAnimeRanking('airing', '12')['data'],
                'movie' => $this->curlModel->getAnimeRanking('movie', '12')['data'],
                'series' => $this->curlModel->getAnimeRanking('tv', '12')['data']
            ];

            // Mengirim data ke view
            $data = [
                'airing' => $anime['airing'],
                'movie' => $anime['movie'],
                'series' => $anime['series']
            ];

            // Save cache 7 hari
            $this->cache->save('indexAnime', $data, 604800);
        } else {
            $data = $this->cache->get('indexAnime');
        }

        return view('ajax/index_anime', $data);
    }

    public function top_anime()
    {
        // Menangkap data dari ajax
        $type = strtolower(htmlspecialchars($this->request->getVar('type')));
        $offset = htmlspecialchars($this->request->getVar('offset'));
        $keyCache = 'topAnime' . $type . $offset;

        if (!$keyCache == cache($keyCache)) {
            // Function untuk ambil data berdasarkan top
            $limit = 12;
            $anime = $this->curlModel->getAnimeRanking($type, $limit, ($offset - 1) * $limit);

            // Url untuk pagination
            $url = '/anime/top/' . $type . '/';

            // Mengirim data ke view
            $data = [
                'animeTop' => $anime,
                'type' => ucwords($type),
                'url' => $url,
                'offset' => $offset
            ];

            if (!empty($anime['data'])) {
                // Save cache 7 hari
                $this->cache->save($keyCache, $data, 604800);
            }
        } else {
            $data = $this->cache->get($keyCache);
        }

        return view('ajax/top_anime', $data);
    }

    public function season_anime()
    {
        // Menangkap inputan dari ajax
        $season = htmlspecialchars($this->request->getVar('season'));
        $year = htmlspecialchars($this->request->getVar('year'));
        $offset = htmlspecialchars($this->request->getVar('offset'));
        $keyCache = 'seasonAnime' . $season . $year . $offset;

        if (!$keyCache == cache($keyCache)) {
            // Function untuk ambil data berdasarkan season
            $limit = 12;
            $anime = $this->curlModel->getAnimeSeasonal($year, $season, $limit, ($offset - 1) * $limit);

            // Url untuk pagination
            $url = '/anime/season/' . $season . '/' . $year . '/';

            // Mengirim data ke view
            $data = [
                'animeSeasonal' => $anime,
                'url' => $url,
                'offset' => $offset
            ];

            if (!empty($anime['data'])) {
                // Save cache 7 hari
                $this->cache->save($keyCache, $data, 604800);
            }
        } else {
            $data = $this->cache->get($keyCache);
        }

        return view('ajax/season_anime', $data);
    }

    public function detail_anime()
    {
        // Menangkap inputan dari ajax
        $id = $this->request->getPost('id');

        // Jika id kosong arahkan ke 404
        if ($id == false) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $keyCache = 'detailAnime' . $id;

        if (!$keyCache == cache($keyCache)) {
            // Function untuk ambil detail anime dari MAL
            $anime = $this->curlModel->getAnimeDetail($id);

            // Function acak string
            $num = substr(str_shuffle('0123456789'), 0, 1);
            // Function untuk ambil anime suggestion dari MAL
            $animeSuggestion = $this->curlModel->getAnimeSuggestion('6', $num * 6);

            // Mengirim data ke view
            $data = [
                'anime' => $anime,
                'animeSuggestion' => $animeSuggestion
            ];

            if (isset($anime['id'])) {
                // Save cache 7 hari
                $this->cache->save($keyCache, $data, 604800);
            }
        } else {
            $data = $this->cache->get($keyCache);
        }

        return view('ajax/detail_anime', $data);
    }

    public function index_manga()
    {
        if (!'indexManga' == cache('indexManga')) {
            // Function untuk ambil data dari MAL
            $manga = [
                'manga' => $this->curlModel->getMangaRanking('manga', '12')['data'],
                'novels' => $this->curlModel->getMangaRanking('lightnovels', '12')['data'],
                'favorite' => $this->curlModel->getMangaRanking('favorite', '12')['data']
            ];

            // Mengirim data ke view
            $data = [
                'manga' => $manga['manga'],
                'novels' => $manga['novels'],
                'favorite' => $manga['favorite']
            ];

            // Save cache 7 hari
            $this->cache->save('indexManga', $data, 604800);
        } else {
            $data = $this->cache->get('indexManga');
        }

        return view('ajax/index_manga', $data);
    }

    public function top_manga()
    {
        // Menangkap inputan dari ajax
        $type = htmlspecialchars(strtolower($this->request->getPost('type')));
        $offset = htmlspecialchars($this->request->getPost('offset'));
        $keyCache = 'topManga' . $type . $offset;

        // Jika type kosong arahkan ke 404
        if (empty($type)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        if (!$keyCache == cache($keyCache)) {
            // Function untuk ambil mamga top dari MAL
            $limit = 12;
            $manga = $this->curlModel->getMangaRanking($type, $limit, ($offset - 1) * $limit);

            // Url untuk pagination
            $url = '/manga/top/' . $type . '/';

            // Mengirim data ke view
            $data = [
                'mangaTop' => $manga,
                'type' => ucwords($type),
                'url' => $url,
                'offset' => $offset
            ];

            if (!empty($manga['data'])) {
                // Save cache 7 hari
                $this->cache->save($keyCache, $data, 604800);
            }
        } else {
            $data = $this->cache->get($keyCache);
        }

        return view('ajax/top_manga', $data);
    }

    public function detail_manga()
    {
        // Menangkap inputan dari ajax
        $id = htmlspecialchars($this->request->getPost('id'));

        // Jika id kosong arahkan ke 404
        if (empty($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $keyCache = 'detailManga' . $id;

        if (!$keyCache == cache($keyCache)) {
            // Function untuk ambil detail manga dari MAL
            $manga = $this->curlModel->getMangaDetail($id);
            // Function acak string
            $num = substr(str_shuffle('0123456789'), 0, 1);
            // Function untuk ambil mamga top dari MAL
            $mangaRank = $this->curlModel->getMangaRanking('all', '6', $num * 6);

            // Mengirim data ke view
            $data = [
                'manga' => $manga,
                'mangaRank' => $mangaRank
            ];

            if (isset($manga['id'])) {
                // Save cache 7 hari
                $this->cache->save($keyCache, $data, 604800);
            }
        } else {
            $data = $this->cache->get($keyCache);
        }

        return view('ajax/detail_manga', $data);
    }

    //--------------------------------------------------------------------

}
