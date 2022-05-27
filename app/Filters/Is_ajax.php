<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Is_ajax implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Accessing the request
        $request = \Config\Services::request();

        if (!$request->isAJAX()) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
