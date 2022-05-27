<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Is_admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil data is_active dari DB
        helper('Function');
        $user = queryUserByUsername(session()->get('username'));

        if (session()->get('role') != 'admin') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        if (session()->get('is_active') != '1') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        if (!empty($user)) {
            if ($user['role'] != 'admin') {
                throw new \CodeIgniter\Exceptions\PageNotFoundException();
            }
            if ($user['is_active'] != '1') {
                throw new \CodeIgniter\Exceptions\PageNotFoundException();
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
