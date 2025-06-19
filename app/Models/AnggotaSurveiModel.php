<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaSurveiModel extends Model
{
    protected $table = 'anggota_survei';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['user_id', 'survei_id'];

    public function tambahAnggota($data)
    {
        // Cek apakah user_id ada di tabel users
        $user = $this->db->table('users')->where('id', $data['user_id'])->get()->getRow();

        // Jika user tidak ada, kembalikan pesan kesalahan
        if (!$user) {
            return 'User dengan ID ' . $data['user_id'] . ' tidak ditemukan';
        }

        // Jika user ada, masukkan data ke tabel anggota_survei
        return $this->db->table($this->table)->insert($data);
    }

    public function hapusAnggota($surveiId)
    {
        return $this->db->table($this->table)->where('survei_id', $surveiId)->delete();
    }

    public function searchByName($term)
    {
        $builder = $this->db->table('users');
        $builder->select('id, fullname');
        $builder->like('fullname', $term);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getAnggotaBySurveiId($surveiId)
    {
        return $this->db->table($this->table)
            ->select('users.id as user_id, users.fullname')
            ->join('users', 'anggota_survei.user_id = users.id')
            ->where('anggota_survei.survei_id', $surveiId)
            ->get()
            ->getResultArray();
    }

    public function getAnggotaSurveiBySurveiId($surveiId)
    {
        return $this->db->table('anggota_survei')
            ->select('users.fullname')
            ->join('users', 'anggota_survei.user_id = users.id')
            ->where('anggota_survei.survei_id', $surveiId)
            ->get()
            ->getResultArray();
    }

    // public function findUsers()
    // {
    //     return $this->db->table($this->table)
    //         ->distinct()
    //         ->select('users.id as user_id, users.fullname')
    //         ->join('users', 'anggota_survei.user_id = users.id')
    //         ->get()
    //         ->getResultArray();
    // }
}
