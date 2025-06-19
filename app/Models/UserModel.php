<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['username', 'fullname', 'password', 'image', 'role'];

    public function getUserDetail($id)
    {
        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }

    public function getUserList($num, $keyword = null)
    {
        $builder = $this->builder();

        if ($keyword != '') {
            $builder->like('username', $keyword);
            $builder->orLike('fullname', $keyword);
        }

        return [
            'users' => $this->paginate($num),
            'pager' => $this->pager,
            'title' => 'User List',
        ];
    }

    public function deleteUser($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function updateUserRole($id, $newRole)
    {
        return $this->update($id, ['role' => $newRole]);
    }

    public function getupdateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function addUser($data)
    {
        return $this->insert($data);
    }

    public function getPassword($id)
    {
        $user = $this->find($id);
        return $user['password'];
    }
}
