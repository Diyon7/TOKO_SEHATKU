<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layouts/master_utama2') ?>

<?= $this->section('isi') ?>

<section class="content">
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-lg-3">
                        <?= form_open('product/add'); ?>
                        <?= form_hidden('id', $product['id_barang']) ?>
                        <?= form_hidden('nama', $product['nama']) ?>
                        <?= form_hidden('harga', $product['harga_jual']) ?>
                        <?= form_hidden('gambar', $product['foto']) ?>
                    </div>
                    <div class="col-12">
                        <img src="<?= base_url('/assets/upload/img/product/' . $product['foto']) ?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3"><?= $product['nama']; ?></h3>
                    <p><?= $product['deskripsi'] ?></p>

                    <hr>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            <?= number_to_currency($product['harga_jual'], 'IDR') ?>
                        </h2>
                    </div>

                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-basket"></i> Add</button>
                        </div>
                        <div class="btn btn-primary btn-lg btn-flat">
                            <a href="<?= base_url('product/cart') ?>">
                                <div class="btn btn-primary"><i class="fa fa-shopping-basket"></i> Keranjang</div>
                            </a>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>