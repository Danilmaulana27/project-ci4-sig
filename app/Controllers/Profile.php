<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        return view('/Profile/index', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Profile',
            // Menampilkan pesan error
            'validation' => $this->getValidationErrors(),
            'user' => ($id !== null) ? $this->userModel->getUserDetail($id) : null,
        ];

        return view('/Profile/edit', $data);
    }

    public function update($id = null)
    {

        $validationRules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi.'
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi.'
                ]
            ],
            'image' => [
                'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,5120]',
                'errors' => [
                    'is_image' => 'Yang anda masukan bukan foto',
                    'mime_in' => 'Yang anda masukan bukan foto.',
                    'max_size]' => 'Ukuran foto terlalu besar.'
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            $this->setValidationErrors($this->validator->getErrors());
            return redirect()->to("Profile/edit")->withInput();
        }

        $Username = $this->request->getPost('username');
        $namaLengap = $this->request->getPost('fullname');
        $Profile = $this->request->getFile('image');
        $fotoLama = $this->request->getVar('fotoLama');
        $password = $this->request->getPost('password');

        if ($Profile && $Profile->getError() == 4) {
            // Pengguna tidak mengunggah foto baru, gunakan yang lama
            $fileFoto = $fotoLama;
        } else {
            // Generate nama file random
            $fileFoto = $Profile->getRandomName();
            // Pindahkan gambar ke folder
            $Profile->move('login/img_profile', $fileFoto);
            // Periksa apakah gambar lama bukan default.svg
            if ($fotoLama != 'default.svg') {
                // Jika bukan default.svg, hapus gambar lama
                $fotoLamaPath = 'login/img_profile/' . $fotoLama;
                if (file_exists($fotoLamaPath)) {
                    unlink($fotoLamaPath);
                } else {
                    // Menangani kasus di mana file tidak ada
                    echo 'File foto tidak ada ' . $fotoLamaPath;
                }
            }
        }

        if ($password != '') {
            $validationRules['password'] = [
                'rules' => 'min_length[8]',
                'errors' => [
                    'min_length' => 'Password harus memiliki minimal 8 karakter.'
                ]
            ];
            $validationRules['pass_confirm'] = [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password harus sama dengan Password.'
                ]
            ];
        }

        if (!$this->validate($validationRules)) {
            $this->setValidationErrors($this->validator->getErrors());
            return redirect()->to("Profile/edit")->withInput();
        }

        // Memastikan bahwa password adalah string
        if ($password != '') {
            if (is_string($password)) {
                // Hash password
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            } else {
                // Menampilkan pesan error dan menghentikan eksekusi lebih lanjut
                echo 'Password harus berupa string.';
                return;
            }
        } else {
            // Jika password tidak diisi, gunakan password lama
            $hashPassword = $this->userModel->getPassword($id);
        }


        // Menginisialisasi array data
        $data = [
            'username' => $Username,
            'fullname' => $namaLengap,
            'image' => $fileFoto,
            'password' => $hashPassword,
        ];

        // Mengupdate user di database
        $updateResult = $this->userModel->getupdateUser($id, $data);
        $hashPassword = $this->userModel->getPassword($id);

        if ($updateResult === false) {
            // Menampilkan pesan error
            session()->setFlashdata('error', 'Gagal mengubah profile.');
            return redirect()->back();
        } else {
            // Menampilkan pesan sukses
            session()->setFlashdata('success', 'Profile berhasil di update.');
            return redirect()->to('/Profile');
        }
    }
}
