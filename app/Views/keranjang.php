<?php $session = \Config\Services::session(); ?>

<?= $this->extend('layouts/master_utama2') ?>

<?= $this->section('isi') ?>

<section class="content">
    <div class="container-fluid">

        <?= form_open('product/update') ?>
        <?= csrf_field() ?>

        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-shopping-basket"></i> Keranjang.
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice p-3 mb-3">
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 79px;">Qty</th>
                                                            <th>Nama Barang</th>
                                                            <th>Harga</th>
                                                            <th>Total</th>
                                                            <th>Hapus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php

                                                        $total = 1;

                                                        foreach ($cart->contents() as $key => $value) { ?>

                                                            <tr>
                                                                <td><input type="number" name="qty<?= $total++ ?>" class="form-control" value="<?= $value['qty'] ?>"></td>
                                                                <td><?= $value['name'] ?></td>
                                                                <td><?= number_to_currency($value['price'], 'IDR') ?></td>
                                                                <td><?= number_to_currency($value['subtotal'], 'IDR') ?></td>
                                                                <td>
                                                                    <a href="<?= base_url('product/delete/' . $value['rowid']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>

                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-6">

                                            </div>
                                            <div class="col-6">

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th style="width:50%">Subtotal:</th>
                                                            <td><?= number_to_currency($cart->total(), 'IDR') ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-edit"></i> Update</button>
                                                <a href="<?= base_url('product/clear') ?>" class="btn btn-default"><i class="fas fa-trash"></i> Bersihkan</a>
                                                <a href="<?= base_url('product/cekout') ?>" class="btn btn-success float-right"><i class="far fa-credit-card"></i> CekOut
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                </div>
                <?= form_close() ?>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection() ?>