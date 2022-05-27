<?php

namespace App\Controllers;

class Manga extends BaseController
{
    public function index()
    {
        // Mengirim data ke view
        $data = [
            'title' => 'Top List Manga',
            'index_manga' => true
        ];

        return view('manga/index', $data);
    }

    public function detail($id, $title)
    {
        // Jika id kosong arahkan ke 404
        if (empty($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $title = str_replace('-', ' ', $title);
        $title = ucwords($title);

        // Mengirim data ke view
        $data = [
            'title' =>  $title,
            'id' => $id,
            'detail_manga' => true
        ];

        return view('manga/detail', $data);
    }

    public function top($type, $offset = 1)
    {
        // Jika type kosong arahkan ke 404
        if (empty($type)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        // Mengirim data ke view
        $data = [
            'title' => 'Top ' . 'Manga ' . ($type == 'manga' ? '' : ucwords($type)),
            'type' => $type,
            'offset' => $offset,
            'top_manga' => true
        ];

        return view('manga/top', $data);
    }

    //--------------------------------------------------------------------

}
