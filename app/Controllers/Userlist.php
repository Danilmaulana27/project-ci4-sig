<?php

namespace App\Controllers;

use App\Models\UserModel;

class Userlist extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $data = $this->userModel->getUserList(10, $keyword);

        return view('Userlist/index', $data);
    }

    public function detail($id = 0)
    {

        $data = [
            'title' => 'Detail User',
            'user' => $this->userModel->getUserDetail($id),
        ];

        if (empty($data['user'])) {
            return redirect()->to('Userlist');
        }

        return view('Userlist/detail', $data);
    }

    public function delete($id)
    {
        // Menghapus data dari database
        $this->userModel->deleteUser($id);

        // Jika berhasil kembali ke halaman admin dan menampilkan pesan sukses
        return redirect()->to('Userlist')->with('success', 'Data berhasil di hapus.');
    }

    public function edit($id = 0)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->userModel->getUserDetail($id),
        ];

        if (empty($data['user'])) {
            return redirect()->to('');
        }

        return view('Userlist/edit', $data);
    }

    public function update($id = 0)
    {
        $newRole = $this->request->getPost('role');

        // Mengupdate data ke database
        $updateResult = $this->userModel->updateUserRole($id, $newRole);

        if ($updateResult === false) {
            // Menampilkan pesan error
            return redirect()->back()->with('error', 'Gagal mengubah data user.');
        }

        // Jika berhasil kembali ke halaman admin dan menampilkan pesan sukses
        return redirect()->to('Userlist')->with('success', 'Data berhasil di ubah.');
    }

    public function tambah_user()
    {
        $data = [
            'title' => 'Tambah User',
            'validation' => $this->getValidationErrors(),
        ];

        // Menampilkan form penambahan user
        return view('Userlist/tambah_user', $data);
    }

    public function store()
    {
        // Aturan validasi form
        $validationRules = [
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah digunakan.'
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password harus memiliki minimal 8 karakter.'
                ]
            ],
            'pass_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi.',
                    'matches' => 'Konfirmasi Password harus sama dengan Password.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi.'
                ]
            ],
        ];

        // Jika form tidak valid, kembali ke form dengan pesan error
        if (!$this->validate($validationRules)) {
            $this->setValidationErrors($this->validator->getErrors());
            return redirect()->to("Userlist/tambah_user")->withInput();
        }

        // Mengambil data dari form
        $password = $this->request->getPost('password');

        // Memastikan bahwa password adalah string
        if (!is_string($password)) {
            // Menampilkan pesan error dan menghentikan eksekusi lebih lanjut
            return redirect()->to('Userlist/tambah_user')->with('error', 'Password harus berupa teks.');
        }

        // Mengambil data dari form
        $data = [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
            'image' => 'default.svg',
        ];

        // Menyimpan data user ke database
        $addResult = $this->userModel->addUser($data);

        if ($addResult === false) {
            // Menampilkan pesan error
            return redirect()->back()->with('error', 'Gagal menambahkan user.');
        }

        // Jika berhasil, kembali ke halaman admin dan menampilkan pesan sukses
        return redirect()->to('Userlist')->with('success', 'User berhasil ditambahkan.');
    }
}
