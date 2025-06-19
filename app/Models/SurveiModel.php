<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveiModel extends Model
{
    protected $table = 'data_survei';
    protected $primaryKey = 'id_survei';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama_desa', 'alamat', 'deskripsi', 'foto', 'latitude', 'longitude', 'tanggal_belum_survei', 'tanggal_survei', 'status_survei', 'anggota_survei', 'jenis_bantuan', 'nama_penerima', 'bentuk_bantuan', 'penerima_hibah', 'penerima_bansos', 'tahun_belum_survei', 'penghasilan', 'keluarga'];

    public function getSurvei($data)
    {
        return $this->db->table('data_survei')->insert($data);
    }

    public function pencarian($keyword)
    {
        $builder = $this->table('data_survei');
        $builder->like('nama_desa', $keyword)
            ->orlike('jenis_bantuan', $keyword)
            ->orlike('nama_penerima', $keyword)
            ->orLike('alamat', $keyword);

        return $builder;
    }

    public function getSurveiByYear($year)
    {
        if ($year != "") {
            return $this->where('tahun', $year);
        } else {
            return $this;
        }
    }

    public function getDistinctYears($status = null)
    {
        if ($status !== null) {
            return $this->where('status_survei', $status)->select('tahun')->distinct()->orderBy('tahun', 'desc')->findColumn('tahun');
        } else {
            return $this->select('tahun')->distinct()->orderBy('tahun', 'desc')->findColumn('tahun');
        }
    }

    public function getDistinctYears2($status = null)
    {
        if ($status !== null) {
            return $this->where('status_survei', $status)->select('tahun_belum_survei')->distinct()->orderBy('tahun_belum_survei', 'desc')->findColumn('tahun_belum_survei');
        } else {
            return $this->select('tahun_belum_survei')->distinct()->orderBy('tahun_belum_survei', 'desc')->findColumn('tahun_belum_survei');
        }
    }


    public function gethapusSurvei($id)
    {
        return $this->db->table('data_survei')->where('id_survei', $id)->delete();
    }

    public function getupdateSurvei($id, $data)
    {
        return $this->db->table('data_survei')->set($data)->where('id_survei', $id)->update();
    }

    public function getSurveiById($id)
    {
        return $this->where('id_survei', $id)->first();
    }
}
