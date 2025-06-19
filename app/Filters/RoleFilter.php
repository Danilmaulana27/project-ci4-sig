<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Dapatkan role pengguna dari sesi
        $userRole = session()->get('role');

        // Cek apakah pengguna memiliki peran yang diperlukan
        if ($userRole !== $arguments[0]) {
            // Jika tidak, arahkan mereka ke halaman error atau halaman lain
            return redirect()->to('/error');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa setelah request
    }
}
