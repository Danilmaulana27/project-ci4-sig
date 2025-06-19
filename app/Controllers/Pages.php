<?php

namespace App\Controllers;

use App\Models\PagesModel;
use App\Models\AnggotaSurveiModel;

class Pages extends BaseController
{
    protected $pagesModel;
    protected $anggotaSurveiModel;

    public function __construct()
    {
        $this->pagesModel = new PagesModel();
        $this->anggotaSurveiModel = new AnggotaSurveiModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        $year = $this->request->getVar('year');

        $survei = $this->pagesModel->orderBy('id_survei', 'desc');

        if ($year !== null) {
            $survei = $survei->groupStart()
                ->where('tahun', $year)
                ->orWhere('tahun_belum_survei', $year)
                ->groupEnd();
        }

        if ($keyword) {
            $survei = $this->pagesModel->pencarian($keyword);
        } else {
            $survei = $this->pagesModel;
        }

        $data = [
            'title' => 'Home || SETDA Subang',
            'survei' => $survei->paginate(150),
            'pager' => $this->pagesModel->pager,
            'jumlahSudahDiSurvei' => $this->pagesModel->hitungSudahDiSurvei(),
            'jumlahBelumDiSurvei' => $this->pagesModel->hitungBelumDiSurvei(),
            'years' => $this->pagesModel->getDistinctYears(),
        ];

        return view('Pages/index', $data);
    }

    public function detailLokasi($id)
    {
        $anggotaSurveiModel = new AnggotaSurveiModel();

        $data = [
            'title' => 'Detail Informasi || SETDA Subang',
            'survei' => $this->pagesModel->getSurveiById($id),
            'anggotaSurvei' => $anggotaSurveiModel->getAnggotaSurveiBySurveiId($id)
        ];

        return view('Pages/detailLokasi', $data);
    }

    public function map()
    {
        $data['survei'] = $this->pagesModel->findAll();

        echo view('map', $data);
    }
}
