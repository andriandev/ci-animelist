<?php

namespace App\Controllers;

class Anime extends BaseController
{
    public function index()
    {
        // Mengirim data ke view
        $data = [
            'title' => 'Top List Anime',
            'index_anime' => true
        ];

        return view('anime/index', $data);
    }

    public function detail($id, $title)
    {
        // Jika id kosong arahkan ke 404
        if (empty($id) || empty($title)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        // Security
        $title = str_replace('-', ' ', $title);
        $title = ucwords(htmlspecialchars($title));

        // Mengirim data ke view
        $data = [
            'title' => $title,
            'id' => $id,
            'detail_anime' => true
        ];

        return view('anime/detail', $data);
    }

    public function season($season = false, $year = false, $offset = 1)
    {
        // Jika season atau year kosong arahkan ke 404
        if ($year == false || $season == false) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        // Security
        $season = htmlspecialchars($season);
        $year = htmlspecialchars($year);
        $offset = htmlspecialchars($offset);

        // Mengirim data ke view
        $data = [
            'title' => 'Anime ' . ucwords($season) . ' ' . $year,
            'season' => htmlspecialchars(strtolower($season)),
            'year' => htmlspecialchars(strtolower($year)),
            'offset' => htmlspecialchars($offset),
            'season_anime' => true
        ];


        return view('anime/season', $data);
    }

    public function top($type, $offset = 1)
    {
        // Security
        $type = htmlspecialchars($type);
        $offset = htmlspecialchars($offset);

        // Mengirim data ke view
        $data = [
            'title' => 'Top ' . 'Anime ' . ucwords($type),
            'type' => ucwords($type),
            'offset' => $offset,
            'top_anime' => true
        ];

        return view('anime/top', $data);
    }

    //--------------------------------------------------------------------

}
