<?php

use Config\Validation;

$session = \Config\Services::session(); ?>
<?= $this->extend('layouts/master_utama2'); ?>

<?= $this->section('isi') ?>

<div class="container">
    <?= form_open('register/save', ['class' => 'has-validate']); ?>
    <?= csrf_field(); ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" value="<?= set_value('username', '', true) ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('username'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('password'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Retype-password</label>
        <div class="col-sm-10">
            <input type="password" name="cpassword" class="form-control <?= ($validation->hasError('cpassword')) ? 'is-invalid' : '' ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('cpassword'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" placeholder="example@example.com" value="<?= set_value('email', '', true) ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('email'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row  datepicker" data-provide="datepicker">
        <label class="col-sm-2 col-form-label">Date of birth</label>
        <div class="col-sm-10">
            <input type="text" name="tgll" class="form-control datepicker <?= ($validation->hasError('tgll')) ? 'is-invalid' : '' ?>" value="<?= set_value('tgll', '', true) ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('tgll'); ?>
            </div>
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="l" <?php if (set_value('gender', '', true) == "l") echo "checked" ?>>
                    <label class="form-check-label">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="p" <?php if (set_value('gender', '', true) == "p") echo "checked" ?>>
                    <label class="form-check-label">
                        Female
                    </label>
                </div>
                <div class="text-danger">
                    <?= $validation->getError('gender'); ?>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <label class="col-sm-2">Alamat</label>
        <div class="col-sm-10">
            <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" name="alamat" id="validationTextarea"><?= set_value('alamat', '', true) ?></textarea>
            <div class="invalid-feedback">
                <?= $validation->getError('alamat'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
            <input type="text" name="city" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= set_value('city', '', true) ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('city'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
            <input type="text" name="notelepon" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= set_value('notelepon', '', true) ?>">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <?= $validation->getError('notelepon'); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </div>
    <?= form_close(); ?>
</div>

<?= $this->endSection() ?>