<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Is_login implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $data = [
            'id' => session()->get('id'),
            'username' => session()->get('username'),
            'role' => session()->get('role'),
            'name' => session()->get('name'),
            'active' => session()->get('is_active')
        ];
        if ($data['id'] || $data['username'] || $data['role'] || $data['active']) {
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
