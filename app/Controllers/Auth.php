<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Auth extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => $this->getValidationErrors(),
        ];

        // Tampilkan view login
        return view('Auth/index', $data);
    }

    public function login()
    {
        // Aturan saat melakukan validasi
        $validationRules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/Auth/index')->withInput()->with('validation', $this->validator);
        }

        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        // Cek login
        $user = $this->loginModel->checkLogin($username, $password);

        if ($user) {
            // Jika login berhasil, buat session dan redirect ke halaman utama
            session()->set('isLoggedIn', true);
            session()->set('role', $user['role']);
            session()->set('id', $user['id']);

            // Jika pengguna memilih "remember me", buat cookie
            if ($remember) {
                setcookie('remember', $username, time() + (86400 * 7), "/"); // 86400 = 1 day
            }

            return redirect()->to('/');
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            session()->setFlashdata('error', 'Username atau password salah');
            return redirect()->to('/Auth/index')->withInput()->with('validation', $this->validator);
        }
    }

    public function konfirmasi()
    {
        // Aturan saat melakukan validasi
        $validationRules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi.'
                ]
            ],
        ];

        // Cek apakah form telah dikirim
        if ($this->request->getMethod() == 'post') {
            // Jika form telah dikirim, lakukan validasi
            if (!$this->validate($validationRules)) {
                return view('Auth/konfirmasi', [
                    'validation' => $this->validator->getErrors(),
                    'old' => $this->request->getPost()
                ]);
            }

            // Ambil data dari form
            $username = $this->request->getPost('username');

            // Cek username
            $user = $this->loginModel->checkUsername($username);

            if ($user) {
                // Jika username ada, simpan username ke dalam session dan redirect ke halaman ubah password
                session()->set('username', $username);
                return redirect()->to('/Auth/ubahPassword');
            } else {
                // Jika username tidak ada, tampilkan pesan error di halaman konfirmasi
                session()->setFlashdata('error', 'Username tidak ditemukan');
                return view('Auth/konfirmasi', [
                    'validation' => $this->validator->getErrors(),
                    'old' => $this->request->getPost()
                ]);
            }
        } else {
            // Jika form belum dikirim, tampilkan halaman konfirmasi tanpa validasi
            return view('Auth/konfirmasi');
        }
    }


    public function ubahPassword()
    {
        // Ambil username dari sesi
        $username = session()->get('username');

        // Jika username tidak ada dalam sesi, redirect ke halaman konfirmasi
        if (!$username) {
            return redirect()->to('/Auth/konfirmasi');
        }

        // Cek apakah form telah dikirim
        if ($this->request->getMethod() == 'post') {
            // Aturan saat melakukan validasi
            $validationRules = [
                'new_password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'Password harus diisi.',
                        'min_length' => 'Password harus memiliki minimal 8 karakter.'
                    ]
                ],
                'confirm_password' => [
                    'rules' => 'required|matches[new_password]',
                    'errors' => [
                        'required' => 'Konfirmasi password harus diisi.',
                        'matches' => 'Konfirmasi password tidak sama dengan password baru.'
                    ]
                ],
            ];

            if (!$this->validate($validationRules)) {
                return view('Auth/ubahPassword', [
                    'validation' => $this->validator->getErrors(),
                    'old' => $this->request->getPost()
                ]);
            }

            // Ambil data dari form
            $new_password = $this->request->getPost('new_password');

            // Ubah password
            $this->loginModel->ubahPassword($username, $new_password);
            session()->setFlashdata('success', 'Password berhasil diubah');
            return redirect()->to('/Auth/index');
        } else {
            return view('Auth/ubahPassword');
        }
    }

    public function logout()
    {
        session()->remove('isLoggedIn');

        return redirect()->to('/Auth/index');
    }
}
