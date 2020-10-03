<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AkunModel;

class Auth extends BaseController
{

    protected $AkunModel;

    public function __construct()
    {
        $this->AkunModel = new AkunModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'cart' => \Config\Services::cart(),
        ];


        if ($this->request->getMethod() == 'post') {
            $rules = [
                'user' => [
                    'label' => 'User ID',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|min_length[3]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length[3]' => 'Minimal karakter 3'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $username = htmlspecialchars($this->request->getPost('user'));
                $password = htmlspecialchars($this->request->getPost('password'));

                // Ambil Data dari DB
                $user = $this->AkunModel->where('username', $this->AkunModel->escapeString($username))->first();

                if ($user) {
                    if (password_verify($password, $user['password'])) {

                        $userSession = [
                            'emailakun' => $user['email'],
                            'usernameakun' => $user['username']
                        ];

                        session()->set($userSession);
                        session()->setFlashdata('success', 'Anda Berhasil Login');

                        return redirect()->to(base_url('/product'));
                    } else {
                        session()->setFlashdata('error', 'user atau Password salah');
                        return redirect()->to(base_url('/loginauth'));
                    }
                } else {
                    session()->setFlashdata('error', 'Maaf user dan Password yang kamu masukkan tidak terdaftar');
                    return redirect()->to(current_url());
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('login', $data);
    }

    public function register()
    {
        session();
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation(),
            'cart' => \Config\Services::cart(),
        ];
        return view('register', $data);
    }

    public function save()
    {
        if ($this->request->getMethod() == 'post') {

            // rules validation

            $rules = [
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[akun.username]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'is_unique' => 'Username sudah ada, coba ganti yang lain'
                    ]
                ],
                'gender' => [
                    'label' => 'jenis kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'tgll' => [
                    'label' => 'tanggal lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'notelepon' => [
                    'label' => 'No Telepon',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'numeric' => 'No Telepon Harus Angka'
                    ]
                ],
                'email' => [
                    'label' => 'email',
                    'rules' => 'required|valid_email|is_unique[akun.email]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'valid_email' => 'masukkan input email dengan benar',
                        'is_unique' => 'Email anda sudah terdaftar sebelumnya'
                    ]
                ],
                'alamat' => [
                    'label' => 'alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'city' => [
                    'label' => 'city',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => 'Password Minimal 5 karakter'
                    ]
                ],
                'cpassword' => [
                    'label' => 'Password',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'matches' => 'Password harus sama'
                    ]
                ],
            ];

            if ($this->validate($rules)) {

                $params = [
                    'username' => htmlspecialchars($this->request->getPost('username')),
                    'gender' => htmlspecialchars($this->request->getPost('gender')),
                    'tgll' => htmlspecialchars($this->request->getPost('tgll')),
                    'telepon' => htmlspecialchars($this->request->getPost('notelepon')),
                    'email' => htmlspecialchars($this->request->getPost('email')),
                    'alamat' => htmlspecialchars($this->request->getPost('alamat')),
                    'kota' => htmlspecialchars($this->request->getPost('city')),
                    'password' => htmlspecialchars(password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)),
                ];

                $peserta = $this->AkunModel->insert($params);

                if ($peserta) {
                    session()->setFlashdata('success', 'Akun berhasil dibuat');
                    return redirect()->to(base_url('/loginauth'));
                }
            } else {
                $validation = $this->validator;
                return redirect('register')->withInput()->with('validation', $validation);
            }
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url());
    }
}
