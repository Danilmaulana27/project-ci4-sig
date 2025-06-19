<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'data_survei';
    protected $primaryKey = 'id_survei';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama_desa', 'alamat', 'deskripsi', 'foto', 'latitude', 'longitude', 'tanggal_survei', 'status_survei'];

    public function hitungSudahDiSurvei()
    {
        return $this->where('status_survei', 1)->countAllResults();
    }

    public function hitungBelumDiSurvei()
    {
        return $this->where('status_survei', 0)->countAllResults();
    }
}
