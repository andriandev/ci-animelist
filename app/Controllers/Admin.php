<?php

namespace App\Controllers;

class Admin extends BaseController
{
    // Variabel configModel
    protected $configModel;
    protected $adminModel;
    protected $setModel;

    public function __construct()
    {
        // inisialisasi model
        $this->configModel = new \App\Models\Config_Model();
        $this->adminModel = new \App\Models\Admin_Model();
        $this->setModel = new \App\Models\Setting_Model();
    }

    public function index()
    {
        // Mengirim data ke view
        $data = [
            'title' => 'Admin Area',
            'client_id' => $this->configModel->getConfig('client_id')['value'],
            'client_secret' => $this->configModel->getConfig('client_secret')['value'],
            'code_challenge' => $this->configModel->getConfig('code_challenge')['value'],
            'access_token' => $this->configModel->getConfig('access_token')['value'],
            'refresh_token' => $this->configModel->getConfig('refresh_token')['value'],
            'created_token' => $this->configModel->getConfig('expired_token')['updated_at'],
            'expired_token' => $this->configModel->getConfig('expired_token')['value'],
            'user' => $this->adminModel->getUser(),
            'aktivasi' => $this->setModel->getSet('aktivasi_user')['value']
        ];

        return view('admin/index', $data);
    }

    public function save()
    {
        // Menangkap inputan form
        $client_id = $this->request->getVar('client_id');
        $client_secret = $this->request->getVar('client_secret');
        $code_challenge = $this->request->getVar('code_challenge');
        $access_token = $this->request->getVar('access_token');
        $refresh_token = $this->request->getVar('refresh_token');
        $expired_token = $this->request->getVar('expired_token');

        // Perintah update batch ke DB dengan query builder
        $data = [
            [
                'name' => 'client_id',
                'value' => $client_id
            ],
            [
                'name' => 'client_secret',
                'value' => $client_secret
            ],
            [
                'name' => 'code_challenge',
                'value' => $code_challenge
            ],
            [
                'name' => 'access_token',
                'value' => $access_token
            ],
            [
                'name' => 'refresh_token',
                'value' => $refresh_token
            ],
            [
                'name' => 'expired_token',
                'value' => $expired_token
            ]
        ];

        $this->configModel->updateBatch($data, 'name');

        // Session setFlashdata
        $pesan = '<div class="alert alert-success text-center" role="alert">
        Data berhasil di simpan.
        </div>';
        session()->setFlashdata('pesan', $pesan);

        return redirect()->to('/admin');
    }

    public function token()
    {
        // Menangkap inputan $_GET['code']
        $code = $this->request->getVar('code');
        // Inisialisasi model
        $curlModel = new \App\Models\Curl_Model();

        // Jika $_GET['code'] tidak ada
        if (empty($code)) {
            // Security
            $getToken = $this->request->getPost('get_token');
            if (!$getToken) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException();
            } else if ($getToken == 'update_token') {
                // Function untuk mengambil 'code' dari MAL
                return $curlModel->getCode();
            } else if ($getToken == 'refresh_token') {
                // Function untuk mengambil 'acces_token' dengan refresh_token dari MAL
                $token = $curlModel->getRefreshToken();

                // Menangkap data dari MAL
                $access_token = $token['access_token'];
                $refresh_token = $token['refresh_token'];
                $expire_token = date('t', $token['expires_in']) . ' Days';

                // Perintah save ke DB
                $this->configModel->save([
                    'name' => 'access_token',
                    'value' => $access_token
                ]);

                $this->configModel->save([
                    'name' => 'refresh_token',
                    'value' => $refresh_token
                ]);

                $this->configModel->save([
                    'name' => 'expired_token',
                    'value' => $expire_token
                ]);

                // Session setFlashdata
                $pesan = '<div class="alert alert-warning text-center" role="alert">
                Data token berhasil di update menggunakan refresh token.
                </div>';
                session()->setFlashdata('pesan', $pesan);

                return redirect()->to('/admin');
            } else {
                // Session setFlashdata
                $pesan = '<div class="alert alert-danger text-center" role="alert">
                Terjadi kesalahan.
                </div>';
                session()->setFlashdata('pesan', $pesan);

                return redirect()->to('/admin');
            }
        }

        // Jika $_GET['code'] ada
        if (isset($code)) {
            // Function untuk mengambil data token dari MAL
            $token = $curlModel->getToken($code);

            // Menangkap data dari MAL
            $access_token = $token['access_token'];
            $refresh_token = $token['refresh_token'];
            $expire_token = date('t', $token['expires_in']) . ' Days';

            // Perintah save ke DB
            $this->configModel->save([
                'name' => 'access_token',
                'value' => $access_token
            ]);

            $this->configModel->save([
                'name' => 'refresh_token',
                'value' => $refresh_token
            ]);

            $this->configModel->save([
                'name' => 'expired_token',
                'value' => $expire_token
            ]);

            // Session setFlashdata
            $pesan = '<div class="alert alert-warning text-center" role="alert">
            Data token berhasil di update.
            </div>';
            session()->setFlashdata('pesan', $pesan);

            return redirect()->to('/admin');
        }
    }

    public function delete_user()
    {
        // Menangkap inputan
        $id = $this->request->getVar('id');

        // Perintah delete DB
        $this->adminModel->delete($id);

        // Session setFlashdata
        $pesan = '<div class="alert alert-danger text-center" role="alert">
        Data user berhasil di hapus.
        </div>';
        session()->setFlashdata('pesan', $pesan);

        return redirect()->to('/admin');
    }

    public function edit_user()
    {
        // Menangkap inputan
        $id = $this->request->getVar('id');

        // Mengambil data dari DB
        $user = $this->adminModel->getUser($id);

        $data = [
            'title' => 'Edit User',
            'user' => $user
        ];

        return view('admin/user/edit', $data);
    }

    public function update_user()
    {
        // Menangkap inputan
        $id = htmlspecialchars($this->request->getVar('id'));
        $username = htmlspecialchars($this->request->getVar('username'));
        $password = $this->request->getVar('password');
        $name = htmlspecialchars($this->request->getVar('name'));
        $role = htmlspecialchars($this->request->getVar('role'));
        $aktivasi = htmlspecialchars($this->request->getVar('aktivasi'));

        // Cek password diubah tidak
        $user = $this->adminModel->getUser($id);

        if ($password == $user['password']) {
            $password = $user['password'];
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }

        // Perintah update ke DB
        $this->adminModel->save([
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'role' => $role,
            'is_active' => $aktivasi
        ]);

        // Session setFlashdata
        $pesan = '<div class="alert alert-primary text-center" role="alert">
        Data user berhasil di ubah.
        </div>';
        session()->setFlashdata('pesan', $pesan);

        return redirect()->to('/admin');
    }

    public function save_setting()
    {
        // Menagkap inputan
        $aktivasi = $this->request->getVar('aktivasi');

        // Perintah update DB
        $this->setModel->save([
            'name' => 'aktivasi_user',
            'value' => $aktivasi
        ]);

        // Session setFlashdata
        $pesan = '<div class="alert alert-success text-center" role="alert">
        Data setting berhasil di ubah.
        </div>';
        session()->setFlashdata('pesan', $pesan);

        return redirect()->to('/admin');
    }

    //--------------------------------------------------------------------

}
