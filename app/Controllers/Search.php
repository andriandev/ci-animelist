<?php

namespace App\Controllers;

class Search extends BaseController
{
    public function index()
    {
        // Menangkap inputan $_GET
        $judul = htmlspecialchars($this->request->getVar('q'));
        $offset = htmlspecialchars(($this->request->getVar('p') ? $this->request->getVar('p') : 1));

        // Jika judul kosong arahkan ke 404
        if (empty($judul)) {
            return view('error/notfound');
        }

        // Url untuk pagination
        $url = '/search/?q=' . url_title($judul, '+', true) . '&p=';

        // Mengirim data ke view
        $data = [
            'title' => 'Search ' . ucwords($judul) . ($offset > 1 ? ' | Page ' . $offset : ''),
            'judul' => ucwords($judul),
            'offset' => $offset,
            'url' => $url,
            'index_search' => true
        ];

        return view('search/index', $data);
    }

    //--------------------------------------------------------------------

}
