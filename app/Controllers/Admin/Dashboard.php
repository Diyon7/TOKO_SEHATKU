<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use Config\Services;

class Dashboard extends BaseController
{
    protected $ProductModel;

    public function __construct()
    {
        $this->ProductModel = new ProductModel();
    }

    public function index()
    {

        $product = $this->ProductModel->findAll();

        $data = [
            'title' => 'Admin',
            'letak' => 'Dashboard',
            'product' => $product
        ];

        return view('admin/dashboard/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Admin',
            'letak' => 'Dashboard',
        ];

        return view('admin/dashboard/tambah', $data);
    }

    public function save()
    // redirect
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => [
                    'label' => 'nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'harga' => [
                    'label' => 'harga',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'desk' => [
                    'label' => 'desk',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'fototeam'    => [
                    'rules' => 'uploaded[fototeam]|mime_in[fototeam,image/jpg,image/jpeg,image/png]|is_image[fototeam]|max_size[fototeam,2096]',
                    'errors' => [
                        'uploaded' => 'Pilih Gambar terlebih dahulu',
                        'max_size' => 'Gambar ukuran maksimal 2MB',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ],
            ];

            if ($this->validate($rules)) {

                $file = $this->request->getFile('fototeam');

                $uploadFile = $this->upload_image($file);

                $paramsteam = [
                    'nama' => htmlspecialchars($this->request->getPost('nama')),
                    'harga_jual' => htmlspecialchars($this->request->getPost('harga')),
                    'deskripsi' => htmlspecialchars($this->request->getPost('desk')),
                    'foto' => $uploadFile,
                ];

                $peserta = $this->ProductModel->insert($paramsteam);
                if ($peserta) {
                    session()->setFlashdata('success', 'Berhasil menambah data');
                    return redirect()->route('admin');
                } else {
                    session()->setFlashdata('danger', 'Gagal menambah data');
                    return redirect()->route('admin/add')->withInput();
                }
            } else {
                $validation = $this->validator;
                return redirect('admin/tambah')->withInput()->with('validation', $validation);
            }
        }
    }

    private function upload_image($file)
    {
        $newName = $file->getRandomName();
        $upload = $file->move(ROOTPATH . 'public/assets/upload/img/product/', $newName);
        if ($upload) {
            return $newName;
        } else {
            return false;
        }
    }
}
