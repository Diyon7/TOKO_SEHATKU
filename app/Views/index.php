<?= $this->extend('layouts/master_utama'); ?>

<?= $this->section('isi') ?>


<section id="home">
  <div class="container">
    <div class="content mt-5 mb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="steps">
            <div class="row align-item-center">
              <div class="col-12 col-sm-6 order-sm-2">
                <div class="steps_image">
                  <img src="/assets/img/undraw_security_o890.svg" class="img-fluid" width="500">
                </div>
              </div>
              <div class="col-12 col-sm-6 order-sm-1">
                <p class="h1 text-dark text-uppercase">Selamat Datang di Toko sehatku</p>

                <p class="mt-3 text-dark">Toko jual produk alat pernafasan</p>

                <div class="row">
                  <div class="col-md-6">
                    <a href="<?= base_url('voting') ?>" class="btn btn-warning">Mulai Belanja</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row no-gutters ftco-services">
    <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services p-4 py-md-9">
        <div class="icon d-flex justify-content-center align-items-center mb-4">
          <span class="flaticon-bag"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Banyak Koleksi Sepatu</h3>
          <p>Berbagai jenis Koleksi sepatu terkini yang bisa anda jadikan referensi</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-5 services p-4 py-md-9">
      </div>
    </div>
    <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
      <div class="media block-6 services p-4 py-md-9">
        <div class="icon d-flex justify-content-center align-items-center mb-4">
          <span class="flaticon-payment-security"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Selalu Update</h3>
          <p>Sepatu terupdate selalu menjadikan anda terlihat kekinian</p>
        </div>
      </div>
    </div>
  </div>
</div>




<?= $this->endSection() ?>