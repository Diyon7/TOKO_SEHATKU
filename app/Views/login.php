<?php

use Config\Validation;

$session = \Config\Services::session(); ?>
<?= $this->extend('layouts/master_utama2'); ?>

<?= $this->section('isi') ?>

<div class="container">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="form-group row">
                    <h5 class="col-sm-3 modal-title" id="exampleModalLabel">Toko Sehatku</h5>
                    <div class="col-sm-9 text-center">
                        <label for="staticEmail" class="col-form-label">Selamat Datang di Toko Alat Kesehatan</label>
                    </div>
                </div>
            </div>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <div class="flash-data-e" data-flashdata="<?= session()->getFlashdata('error') ?>"></div>

            <div class="modal-body">
                <?= form_open('/loginauth', ['class' => 'formuser']); ?>
                <div class="form-group row">
                    <label for="staticuser" class="col-sm-2 col-form-label">User ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="user">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php if (isset($validation)) : ?>
                                <?= $validation->getError('user'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php if (isset($validation)) : ?>
                                <?= $validation->getError('password'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Login</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>