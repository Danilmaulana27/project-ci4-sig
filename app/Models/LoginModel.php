<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password'];

    public function checkLogin($username, $password)
    {
        // Cari user berdasarkan username
        $user = $this->where('username', $username)->first();

        // Jika user ditemukan dan password cocok, return user
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        // Jika user tidak ditemukan atau password tidak cocok, return false
        return false;
    }

    public function ubahPassword($username, $new_password)
    {
        // Hash password baru
        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        // Ubah password di database
        $this->where('username', $username)->set('password', $new_password_hash)->update();
    }

    public function checkUsername($username)
    {
        // Cari user berdasarkan username
        $user = $this->where('username', $username)->first();

        // Jika user ditemukan, return user
        if ($user) {
            return $user;
        }

        // Jika user tidak ditemukan, return false
        return false;
    }
}
