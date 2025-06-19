<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    protected $dashboardModel;

    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
    }

    public function index()
    {
        $userRole = $this->getUserRole();

        // Pengecekan peran pengguna
        if ($userRole == 'Admin' || $userRole == 'KABAG') {
            $jumlahSudahDiSurvei = $this->dashboardModel->hitungSudahDiSurvei();
            $jumlahBelumDiSurvei = $this->dashboardModel->hitungBelumDiSurvei();

            $data = [
                'title' => 'Dashboard',
                'jumlahSudahDiSurvei' => $jumlahSudahDiSurvei,
                'jumlahBelumDiSurvei' => $jumlahBelumDiSurvei,
            ];

            return view('Dashboard/index', $data);
        } else {
            // Redirect atau tampilkan pesan error jika peran tidak diizinkan
            return redirect()->to('/')->with('error', 'Akses ditolak.');
        }
    }

    // Metode ini dapat disesuaikan dengan metode autentikasi yang kamu gunakan
    protected function getUserRole()
    {
        // Misalnya, mengembalikan peran pengguna dari sesi
        return session()->get('role');
    }
}
