<?php

namespace App\Controllers;

use App\Models\SurveiModel;
use App\Models\AnggotaSurveiModel;

class Survei extends BaseController
{
    protected $surveiModel;
    protected $anggotaSurveiModel;

    public function __construct()
    {
        $this->surveiModel = new SurveiModel();
        $this->anggotaSurveiModel = new AnggotaSurveiModel();
    }

    public function getUserRole()
    {
        return session()->get('role');
    }

    public function sudah_di_survei()
    {
        $userRole = $this->getUserRole();

        // Pengecekan peran pengguna
        if ($userRole == 'KABAG' || $userRole == 'Tim Survei') {
            $keyword = $this->request->getVar('keyword');
            $year = $this->request->getVar('year');
            $sort = $this->request->getVar('sort');
            $order = $this->request->getVar('order') ?: 'asc';

            $survei = $this->surveiModel->where('status_survei', 1)->orderBy('id_survei', 'desc');

            if ($year !== null) {
                $survei = $survei->where('tahun', $year);
            }

            if ($keyword !== null) {
                $survei = $survei->pencarian($keyword);
            }

            if ($sort !== null) {
                $survei = $survei->orderBy($sort, $order);
            }

            $data = [
                'survei' => $survei->paginate(10),
                'pager' => $this->surveiModel->pager,
                'title' => 'Data Survei - Sudah di Survei',
                'years' => $this->surveiModel->getDistinctYears(1),
                'order' => $order,
            ];

            return view('Survei/sudah_di_survei', $data);
        } else {
            // Redirect atau tampilkan pesan error jika peran tidak diizinkan
            return redirect()->to('/')->with('error', 'Akses ditolak.');
        }
    }

    public function belum_di_survei()
    {
        $userRole = $this->getUserRole();

        // Pengecekan peran pengguna
        if ($userRole == 'KABAG' || $userRole == 'Tim Survei') {
            $keyword = $this->request->getVar('keyword');
            $year = $this->request->getVar('year');
            $sort = $this->request->getVar('sort');
            $order = $this->request->getVar('order') ?: 'asc';

            $survei = $this->surveiModel->where('status_survei', 0)->orderBy('id_survei', 'desc');
            if ($year !== null) {
                $survei = $survei->where('tahun_belum_survei', $year);
            }

            if ($keyword !== null) {
                $survei = $survei->pencarian($keyword);
            }

            if ($sort !== null) {
                $survei = $survei->orderBy($sort, $order);
            }

            $data = [
                'survei' => $survei->paginate(10),
                'pager' => $this->surveiModel->pager,
                'title' => 'Data Survei - Belum di Survei',
                'years' => $this->surveiModel->getDistinctYears2(0),
                'order' => $order,
            ];

            return view('Survei/belum_di_survei', $data);
        } else {
            // Redirect atau tampilkan pesan error jika peran tidak diizinkan
            return redirect()->to('/')->with('error', 'Akses ditolak.');
        }
    }

    public function tambah_data()
    {

        $surveiModel = new surveiModel();
        $anggotaSurveiModel = new AnggotaSurveiModel();

        $survei = $surveiModel->findAll();
        $anggotaSurvei = $anggotaSurveiModel->findAll();

        $data = [
            'title' => 'Tambah Data Survei',
            'validation' => $this->getValidationErrors(),
            'survei' => $survei,
            'anggotaSurvei' => $anggotaSurvei,
        ];

        return view('Survei/tambah_data', $data);
    }

    public function simpan_data()
    {

        if ($this->request->getMethod() === 'post') {
            $surveiModel = new surveiModel();
            $anggotaSurveiModel = new AnggotaSurveiModel();

            // Aturan saat melakukan validasi
            $validationRules = [
                'nama_desa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Desa harus diisi.'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat harus diisi.'
                    ]
                ],
                'tanggal_belum_survei' => [
                    'rules' => 'permit_empty|valid_date',
                    'errors' => [
                        'valid_date' => 'Tanggal harus berformat yang benar.'
                    ]
                ],
                'tanggal_survei' => [
                    'rules' => 'permit_empty|valid_date',
                    'errors' => [
                        'valid_date' => 'Tanggal harus berformat yang benar.'
                    ]
                ],
                'latitude' => [
                    'rules' => 'numeric',
                    'errors' => [
                        'numeric' => 'Latitude harus berupa angka.'
                    ]
                ],
                'longitude' => [
                    'rules' => 'numeric',
                    'errors' => [
                        'numeric' => 'Longitude harus berupa angka.'
                    ]
                ],
                'foto' => [
                    'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,5120]',
                    'errors' => [
                        'is_image' => 'Yang anda masukan bukan foto',
                        'mime_in' => 'Yang anda masukan bukan foto.',
                        'max_size]' => 'Ukuran foto terlalu besar.'
                    ]
                ],
                'jenis_bantuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis bantuan harus diisi.'
                    ]
                ],
                'nama_penerima' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama penerima harus diisi.'
                    ]
                ],
                'bentuk_bantuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Bentuk bantuan harus diisi.'
                    ]
                ],
            ];

            if (!$this->validate($validationRules)) {
                $this->setValidationErrors($this->validator->getErrors());
                return redirect()->to("Survei/tambah_data")->withInput();
            }

            $namaDesa = $this->request->getPost('nama_desa');
            $alamat = $this->request->getPost('alamat');
            $deskripsi = $this->request->getPost('deskripsi');
            $tanggalBelumSurvei = $this->request->getPost('tanggal_belum_survei') ?: NULL;
            $tanggalSurvei = $this->request->getPost('tanggal_survei') ?: NULL;
            $latitude = $this->request->getPost('latitude');
            $longitude = $this->request->getPost('longitude');
            $Foto = $this->request->getFile('foto');
            $jenisBantuan = $this->request->getPost('jenis_bantuan') ?: NULL;
            $bentukBantuan = $this->request->getPost('bentuk_bantuan') ?: NULL;
            $namaPenerima = $this->request->getPost('nama_penerima');
            $penerimaHibah = $this->request->getPost('penerima_hibah') ?: NULL;
            $penerimaBansos = $this->request->getPost('penerima_bansos') ?: NULL;
            $statusSurvei = $this->request->getPost('status_survei') ? 1 : 0;
            $penghasilan = $this->request->getPost('penghasilan') ?: NULL;
            $keluarga = $this->request->getPost('keluarga') ?: NULL;

            // Jika tidak menambah foto akan mengupload foto default
            if ($Foto->getError() == 4) {
                $fileFoto = 'default.jpeg';
            } else {
                // Generate nama file random
                $fileFoto = $Foto->getRandomName();
                // Pindahkan gambar ke folder
                $Foto->move('assets/img_survei', $fileFoto);
            }

            $data = [
                'nama_desa' => $namaDesa,
                'alamat' => $alamat,
                'deskripsi' => $deskripsi,
                'foto' => $fileFoto,
                'tanggal_belum_survei' => $tanggalBelumSurvei,
                'tanggal_survei' => $tanggalSurvei,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'status_survei' => $statusSurvei,
                'jenis_bantuan' => $jenisBantuan,
                'nama_penerima' => $namaPenerima,
                'bentuk_bantuan' => $bentukBantuan,
                'penerima_hibah' => $penerimaHibah,
                'penerima_bansos' => $penerimaBansos,
                'penghasilan' => $penghasilan,
                'keluarga' => $keluarga,
            ];

            // Simpan data survei
            $surveiId = $surveiModel->insert($data);

            if ($surveiId === false) {
                // Menampilkan pesan error
                return redirect()->back()->with('error', 'Gagal menambah data survei.');
            }

            // Ambil anggota_surveiId dari form
            $anggotaSurveiId = $this->request->getPost('anggotaSurveiId');

            // Loop untuk menyimpan data anggota_survei
            foreach ($anggotaSurveiId as $anggotaId) {
                $dataAnggotaSurvei = [
                    'user_id' => $anggotaId,
                    'survei_id' => $surveiId,
                ];

                // Panggil method tambahAnggota di model AnggotaSurveiModel
                $result = $anggotaSurveiModel->tambahAnggota($dataAnggotaSurvei);

                // Cek hasil operasi dan tampilkan pesan jika ada error
                if ($result !== true) {
                    return redirect()->back()->with('error', 'Gagal menambah data anggota survei: ' . $result);
                }
            }

            // Jika berhasil kembali ke halaman survei dan menampilkan pesan sukses
            if ($statusSurvei == 1) {
                return redirect()->to('Survei/sudah_di_survei')->with('success', 'Data berhasil di tambah.');
            } else {
                return redirect()->to('Survei/belum_di_survei')->with('success', 'Data berhasil di tambah.');
            }
        }
    }

    // public function api_survey_members()
    // {
    //     $anggotaSurveiModel = new \App\Models\AnggotaSurveiModel();
    //     $anggotaSurvei = $anggotaSurveiModel->findUsers();

    //     // Ubah setiap item data menjadi array dengan properti 'id' dan 'fullname'
    //     $anggotaSurvei = array_map(function ($item) {
    //         return [
    //             'id' => $item['user_id'],
    //             'fullname' => $item['fullname']
    //         ];
    //     }, $anggotaSurvei);

    //     return $this->response->setJSON($anggotaSurvei);
    // }

    public function print($id_survei)
    {
        // Ambil data survei berdasarkan id_survei
        $survei = $this->surveiModel->find($id_survei);
        $anggota_survei = $this->anggotaSurveiModel->getAnggotaSurveiBySurveiId($id_survei);

        if (!$survei) {
            // Jika tidak ada data survei dengan id_survei tersebut, tampilkan pesan error
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data survei dengan ID ' . $id_survei . ' tidak ditemukan.');
        }

        // Siapkan data yang akan ditampilkan di halaman print
        $data = [
            'survei' => $survei,
            'anggota_survei' => $anggota_survei,
            'title' => 'Print Data Survei'
        ];

        // Tampilkan halaman print dengan data yang telah disiapkan
        echo view('Survei/print', $data);
    }


    public function searchUsers()
    {
        $term = $this->request->getVar('term');
        $users = $this->anggotaSurveiModel->searchByName($term);
        return $this->response->setJSON($users);
    }

    public function edit($id)
    {
        $anggotaSurveiModel = new AnggotaSurveiModel();

        $data = [
            'title' => 'Edit Data',
            'validation' => $this->getValidationErrors(),
            'survei' => $this->surveiModel->getSurveiById($id),
            'anggotaSurvei' => $anggotaSurveiModel->getAnggotaBysurveiId($id),
        ];

        return view('Survei/edit', $data);
    }

    public function update($id)
    {
        // Aturan saat melakukan validasi
        $validationRules = [
            'nama_desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Desa harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.'
                ]
            ],
            'tanggal_belum_survei' => [
                'rules' => 'permit_empty|valid_date',
                'errors' => [
                    'valid_date' => 'Tanggal harus berformat yang benar.'
                ]
            ],
            'tanggal_survei' => [
                'rules' => 'permit_empty|valid_date',
                'errors' => [
                    'valid_date' => 'Tanggal harus berformat yang benar.'
                ]
            ],
            'latitude' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Longitude harus berupa angka.'
                ]
            ],
            'longitude' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Longitude harus berupa angka.'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,5120]',
                'errors' => [
                    'is_image' => 'Yang anda masukan bukan foto',
                    'mime_in' => 'Yang anda masukan bukan foto.',
                    'max_size]' => 'Ukuran foto terlalu besar.'
                ]
            ],
            'jenis_bantuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis bantuan harus diisi.'
                ]
            ],
            'nama_penerima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama penerima harus diisi.'
                ]
            ],
            'bentuk_bantuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bentuk bantuan harus diisi.'
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            $this->setValidationErrors($this->validator->getErrors());
            return redirect()->to("Survei/edit/{$id}")->withInput();
        }

        $namaDesa = $this->request->getPost('nama_desa');
        $alamat = $this->request->getPost('alamat');
        $deskripsi = $this->request->getPost('deskripsi');
        $tanggalBelumSurvei = $this->request->getPost('tanggal_belum_survei');
        $tanggalSurvei = $this->request->getPost('tanggal_survei');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $newImage = $this->request->getFile('foto');
        $jenisBantuan = $this->request->getPost('jenis_bantuan');
        $namaPenerima = $this->request->getPost('nama_penerima');
        $bentukBantuan = $this->request->getPost('bentuk_bantuan');
        $penerimaHibah = $this->request->getPost('penerima_hibah');
        $penerimaBansos = $this->request->getPost('penerima_bansos');
        $statusSurvei = $this->request->getPost('status_survei') ? 1 : 0;

        // Mengecek gambar apakah tetap gambar lama
        if ($newImage->getError() == 4) {
            $fileFoto = $this->request->getVar('fotoLama');
        } else {
            // Generate nama file random
            $fileFoto = $newImage->getRandomName();
            // Pindahkan gambar ke folder
            $newImage->move('assets/img_survei', $fileFoto);
            // Hapus file lama
            unlink('assets/img_survei/' . $this->request->getVar('fotoLama'));
        }

        $data = [
            'nama_desa' => $namaDesa,
            'alamat' => $alamat,
            'deskripsi' => $deskripsi,
            'tanggal_belum_survei' => $tanggalBelumSurvei,
            'tanggal_survei' => $tanggalSurvei,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'foto' => $fileFoto,
            'status_survei' => $statusSurvei,
            'jenis_bantuan' => $jenisBantuan,
            'nama_penerima' => $namaPenerima,
            'bentuk_bantuan' => $bentukBantuan,
            'penerima_hibah' => $penerimaHibah,
            'penerima_bansos' => $penerimaBansos,
        ];

        // Melakukan update di database
        $updateResult = $this->surveiModel->getupdateSurvei($id, $data);

        // Ambil data anggota Survei dari request
        $anggotaSurveiIds = $this->request->getPost('anggotaSurveiId');
        $anggotaSurveiNames = $this->request->getPost('anggotaSurveiName');

        // Perbarui data anggota Survei
        $anggotaSurveiModel = new AnggotaSurveiModel();
        $anggotaSurveiModel->hapusAnggota($id);

        if (is_array($anggotaSurveiIds) || is_object($anggotaSurveiIds)) {
            foreach ($anggotaSurveiIds as $index => $userId) {
                if (!empty($userId)) {
                    $anggotaSurveiModel->tambahAnggota([
                        'user_id' => $userId,
                        'survei_id' => $id
                    ]);
                } else {
                    $user = $anggotaSurveiModel->searchByName($anggotaSurveiNames[$index]);
                    if ($user) {
                        $anggotaSurveiModel->tambahAnggota([
                            'user_id' => $user['id'],
                            'survei_id' => $id
                        ]);
                    }
                }
            }
        }

        if ($updateResult === false) {
            // Menampilkan pesan error
            return redirect()->back()->with('error', 'Gagal mengubah data survei.');
        }

        // Jika berhasil kembali ke halaman survei dan menampilkan pesan sukses
        if ($statusSurvei == 1) {
            return redirect()->to('Survei/sudah_di_survei')->with('success', 'Data berhasil di ubah.');
        } else {
            return redirect()->to('Survei/belum_di_survei')->with('success', 'Data berhasil di ubah.');
        }
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        // Hapus semua entri anggota Survei yang terkait dengan survei ini
        $db->table('anggota_survei')->where('survei_id', $id)->delete();

        // Mengecek berdasarkan ID
        $survei = $this->surveiModel->find($id);

        // Mendapatkan status survei
        $statusSurvei = $survei['status_survei'];

        // Mengecek jika gambarnya default tidak di hapus
        if ($survei !== null && $survei['foto'] != 'default.jpeg') {
            // Menghapus gambar dari folder
            unlink('assets/img_survei/' . $survei['foto']);
        }

        // Melakukan penghapusan data survei
        $this->surveiModel->delete($id);

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            // Terjadi kesalahan, transaksi gagal
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        } else {
            // Jika berhasil kembali ke halaman survei dan menampilkan pesan sukses
            if ($statusSurvei == 1) {
                return redirect()->to('Survei/sudah_di_survei')->with('success', 'Data berhasil di hapus.');
            } else {
                return redirect()->to('Survei/belum_di_survei')->with('success', 'Data berhasil di hapus.');
            }
        }
    }
}
