<?= $this->extend('layouts/master_admin') ?>

<?= $this->section('isi') ?>

<div class="align-item-center">
    <div class="row">
        <div class="col">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Soal</h4>
                    </div>
                    <div class="card-body viewdata">

                        <?= form_open_multipart('admin/dashboard/save'); ?>
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama', '', true) ?>">
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga jual</label>
                            <input type="number" class="form-control" name="harga" value="<?= set_value('harga', '', true) ?>">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" name="desk" id="password" value="<?= set_value('desk', '', true) ?>">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-theme02 btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paperclip"></i> Pilih Gambar</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Ubah</span>
                                            <input type="file" name="fototeam" class="default" />
                                        </span>
                                        <a href="?p=produk" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <?= form_close() ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>