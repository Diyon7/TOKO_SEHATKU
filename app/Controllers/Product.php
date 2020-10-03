<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\TransaksiModel;
use App\Models\AkunModel;
use App\Models\EmailModel;
use TCPDF;

class Product extends BaseController
{
    protected $ProductModel;
    protected $transaksimodel;
    protected $AkunModel;
    protected $emailmodel;
    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
        $this->ProductModel = new ProductModel();
        $this->transaksimodel = new TransaksiModel();
        $this->AkunModel = new AkunModel();
        $this->emailmodel = new EmailModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Product',
            'cart' => \Config\Services::cart(),
            'product' => $this->ProductModel->findAll()
        ];

        return view('product/utama', $data);
    }
    public function detail()
    {
        $idproduct = $this->request->uri->getSegment(3);
        $data = [
            'title' => 'Product',
            'cart' => \Config\Services::cart(),
            'product' => $this->ProductModel->where('id_barang', $idproduct)->first()
        ];

        return view('product/detail', $data);
    }



    // CRUD Shopping Card

    public function cek()
    {
        $cart = \Config\Services::cart();

        $response = $cart->contents();
        echo '<pre>';
        print_r($response);
        echo '</pre>';
    }

    // Keranjang



    public function add()
    {
        $cart = \Config\Services::cart();

        $cart->insert(array(
            'id'      => $this->request->getPost('id'),
            'qty'     => 1,
            'price'   => $this->request->getPost('harga'),
            'name'    => $this->request->getPost('nama'),
            'options' => array(
                'gambar' => $this->request->getPost('gambar')
            )
        ));
        session()->setFlashdata('success', 'Produk berhasil ditambahkan');
        return redirect()->to(base_url('product'));
    }

    public function clear()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();

        session()->setFlashdata('success', 'Data Keranjang Berhasil Dibersihkan');

        return redirect()->to(site_url('product/cart'));
    }


    // Keranjang

    public function cart()
    {
        $data = [
            'title' => 'Keranjang',
            'cart' => \Config\Services::cart(),
            'product' => $this->ProductModel->findAll()
        ];

        return view('keranjang', $data);
    }

    public function update()
    {
        $data = [
            'title' => 'Keranjang',
            'cart' => \Config\Services::cart(),
            'product' => $this->ProductModel->findAll()
        ];

        $cart = \Config\Services::cart();
        $i = 1;

        foreach ($cart->contents() as $key => $value) {
            $cart->update(array(
                'rowid'   => $value['rowid'],
                'qty'     => $this->request->getPost('qty' . $i++),
            ));
        }

        session()->setFlashdata('success', 'Keranjang berhasil di update');

        return redirect()->to(site_url('product/cart'));
    }

    public function delete()
    {
        $rowid = $this->request->uri->getSegment(3);
        $cart = \Config\Services::cart();
        $cart->remove($rowid);

        session()->setFlashdata('success', 'Keranjang berhasil di update');

        return redirect()->to(site_url('product/cart'));
    }

    public function cekout()
    {

        $cart = \Config\Services::cart();

        $idproduct = session()->get('emailakun');

        $datacek = $this->AkunModel->where('email', $idproduct)->first();

        $transaksi = $cart->contents();

        foreach ($transaksi as $key => $value) {
            $barang = $this->ProductModel->where('nama', $value['name'])->first();
            $data = [
                'cart' => \Config\Services::cart(),
                'id_barang' => $barang['id_barang'],
                'id_pembeli' => $datacek['id_akun'],
                'jumlah' => $value['qty'],
                'total_harga' => $cart->total(),
            ];

            $html = view('transaksi/invoice', [
                'cart' => \Config\Services::cart(),
                'barang' => $value['name'],
                'harga' => number_to_currency($value['price'], 'IDR'),
                'id_barang' => $barang['id_barang'],
                'pembeli' => $datacek['username'],
                'alamat' => $datacek['alamat'],
                'jumlah' => $value['qty'],
                'total_harga' => $cart->total(),
            ]);
        };

        $inputtransaksi = $this->transaksimodel->insert($data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Toko Sehatku');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');



        $pdf->Output(__DIR__ . '/../../public/upload/invoice.pdf', 'F');

        $params = [
            'email' => $datacek['email'],
            'subject' => 'Invoice',
            'content' => '<h1>Invoice Anda </h1> <p> ' . $datacek['username'] . "",
            'attach' => base_url('upload/invoice.pdf')
        ];

        $send = $this->sendemail($params);

        $cart->destroy();

        return redirect()->to(site_url('product'));
    }

    function sendemail($params)
    {
        $this->email->setFrom('jangan balas email ini', 'Toko Sehatku');
        $this->email->setTo($params['email']);


        $this->email->attach('http://localhost/sertifikasi/public/upload/invoice.pdf');
        $this->email->setSubject($params['subject']);
        $this->email->setMessage($params['content']);

        if (!$this->email->send()) {
            session()->setFlashdata('error', 'Belum berhasil Mengirim Email');
            return true;
        } else {
            session()->setFlashdata('success', 'Berhasil Mengirim Email');
            return true;
        }
    }
}
