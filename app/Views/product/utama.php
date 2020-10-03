<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layouts/master_utama2') ?>

<?= $this->section('isi') ?>

<div class="content">
    <div class="container">
        <div class="row">

            <?php foreach ($product as $p) : ?>

                <div class="col-lg-3">
                    <?= form_open('product/add'); ?>
                    <?= form_hidden('id', $p['id_barang']) ?>
                    <?= form_hidden('nama', $p['nama']) ?>
                    <?= form_hidden('harga', $p['harga_jual']) ?>
                    <?= form_hidden('gambar', $p['foto']) ?>

                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $p['nama']; ?></h5><br>
                            <p class="card-text">
                                <img src="<?= base_url('/assets/upload/img/product/' . $p['foto']) ?>" width="200px" height="150px" alt="">
                            </p>
                            <label><?= number_to_currency($p['harga_jual'], 'IDR') ?></label> <br>
                            <div class="card-link">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-basket"></i> Add</button>
                                <a href="<?= base_url('product/detail/' . $p['id_barang']) ?>">
                                    <div class="btn btn-primary"><i class="fa fa-eye"></i> Detail</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>

            <?php endforeach; ?>

        </div>
    </div>
</div>

<?= $this->endSection() ?>