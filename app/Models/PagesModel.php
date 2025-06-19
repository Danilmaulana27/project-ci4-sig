<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'data_survei';
    protected $primaryKey = 'id_survei';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama_desa', 'alamat', 'deskripsi', 'foto', 'latitude', 'longitude', 'tanggal_belum_survei', 'tanggal_survei', 'status_survei', 'jenis_bantuan', 'nama_penerima', 'bentuk_bantuan', 'penerima_hibah', 'penerima_bansos', 'penghasilan', 'keluarga'];

    public function pencarian($keyword)
    {
        $builder = $this->table('data_survei');
        $builder->like('nama_desa', $keyword)
            ->orLike('alamat', $keyword);
        return $builder;
    }

    public function getDistinctYears()
    {
        $tahun = $this->select('tahun')->distinct()->orderBy('tahun', 'desc')->findColumn('tahun');
        $tahun_belum_survei = $this->select('tahun_belum_survei')->distinct()->orderBy('tahun_belum_survei', 'desc')->findColumn('tahun_belum_survei');

        $years = array_unique(array_merge($tahun, $tahun_belum_survei));

        // Filter out null or 0 values
        $years = array_filter($years, function ($value) {
            return !is_null($value) && $value != 0;
        });

        return $years;
    }

    public function getSurveiById($id)
    {
        return $this->db->table('data_survei')
            ->select('nama_desa, alamat, deskripsi, foto, latitude, longitude, tanggal_belum_survei, tanggal_survei, status_survei, jenis_bantuan, nama_penerima, bentuk_bantuan, penerima_hibah, penerima_bansos, penghasilan, keluarga')
            ->where('id_survei', $id)
            ->get()
            ->getRow();
    }

    public function hitungSudahDiSurvei()
    {
        return $this->where('status_survei', 1)->countAllResults();
    }

    public function hitungBelumDiSurvei()
    {
        return $this->where('status_survei', 0)->countAllResults();
    }
}
