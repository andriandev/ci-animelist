<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// Mengirim data ke view
		$data = [
			'title' => 'My Animelist - Top List Anime and Manga',
			'description' => 'My Adikanime is website top list anime and manga database',
			'index_home' => true,
		];

		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
