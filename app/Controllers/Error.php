<?php

namespace App\Controllers;

class Error extends BaseController
{
    public function notfound()
    {
        $data = [
            'title' => '404 Page Not Found'
        ];

        return view('error/notfound', $data);
    }

    //--------------------------------------------------------------------

}
