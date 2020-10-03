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
                        <div class="form-row">


                            <div class="col-xs-11">
                                <p>
                                    <a href="<?= base_url('admin/tambah') ?>" class="btn btn-primary tambahuser">
                                        <i class="fas fa-plus-circle"></i> Tambah Product
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datauser" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-sm">
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($product as $p) : ?>
                                        <tr class="text-sm">
                                            <th><?= $p['id_barang'] ?></th>
                                            <th><?= $p['nama'] ?></th>
                                            <th><?= $p['id_kategori'] ?></th>
                                            <th><?= $p['deskripsi'] ?></th>
                                            <th><img src="<?= base_url('/assets/upload/img/product/' . $p['foto']) ?>" width="200px" height="150px" alt=""></th>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="vieweditdata" style="display: none;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus data ini.</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="<?= base_url('admin/users/delete') ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" id="delete-input-id" name="id" value="">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
                var table = $('#datauser').DataTable({});
</script>


<?= $this->endSection() ?>