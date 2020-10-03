<?php $session = \Config\Services::session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">

  <!-- <link rel="stylesheet" href="/assets/css/style.css"> -->

</head>

<body>

  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent ml-4 mr-4">

      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <img src="/assets/img/undraw_security_o890.svg" width="80" alt="logo">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center " id="navbarSupportedContent">
        <ul class="navbar-nav mx-md-auto">

          <li class="nav-item active">
            <a class="nav-link text-dark" href="<?= base_url('/') ?>">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?= site_url('/product') ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Product
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= site_url('/product') ?>">Tensi meter</a>
              <a class="dropdown-item" href="#">Alat bantu pernafasan</a>
              <a class="dropdown-item" href="#">Alat bantu pernafasan</a>
              <a class="dropdown-item" href="#">Alat bantu pernafasan</a>
              <!-- <div class="dropdown-divider"></div> -->
              <a class="dropdown-item" href="#">Alat Bantu Jalan</a>
            </div>
          </li>

        </ul>

        <?php if (session()->get('emailakun') == "") { ?>

          <div class="auth">
            <a href="<?= site_url('loginauth') ?>"><button type="button" class="btn btn-outline-primary">Login</button></a>
            <a href="<?= base_url('register') ?>">
              <div class="btn btn-outline-primary">Register</div>
            </a>
          </div>
        <?php } else { ?>
          <ul class="navbar-nav">
            <?php

            $keranjangp = $cart->contents();
            $jml = 0;
            foreach ($keranjangp as $key => $value) {
              $jml = $jml + $value['qty'];
            }

            ?>

            <li class="nav-item dropdown">
              <a class="nav-link btn" data-toggle="dropdown" href="#">
                <h5><?= session()->get('usernameakun') ?></h5>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?= $session->get('usernameakun'); ?></span>
                <div class="dropdown-divider"></div>
                <a href="<?= site_url('logout') ?>" class="dropdown-item">
                  <i class="fas fa-logout mr-2"></i> Logout
                  <span class="float-right text-muted text-sm"></span>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-shopping-cart"></i>
                <span class="badge badge-danger navbar-badge"><?= $jml ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <?php if (empty($keranjangp)) { ?>
                  <p class="text-center">Keranjang Belanja Kosong</p>
                <?php } else { ?>

                  <a href="#" class="dropdown-item">

                    <?php foreach ($keranjangp as $key => $value) { ?>

                      <div class="media">
                        <img src="<?= base_url('/assets/upload/img/product/' . $value['options']['gambar']) ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                          <h3 class="dropdown-item-title">
                            <?= $value['name'] ?>
                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                          </h3>
                          <p class="text-sm">Total : <?= $value['qty'] ?></p>
                          <p class="text-sm text-muted"><?= number_to_currency($value['price'], 'IDR') ?></p>
                        </div>
                      </div>
                    <?php } ?>
                  </a>
                  <div class="dropdown-divider"></div>

                <?php } ?>

                <div class="dropdown-item dropdown-footer">Harga Total : <?= number_to_currency($cart->total(), 'IDR') ?></div>
                <a href="<?= base_url('product/cart') ?>" class="dropdown-item dropdown-footer">Lihat Keranjang</a>
              </div>
            </li>

          <?php } ?>

          </ul>

      </div>

    </nav>
    <?= $this->renderSection('isi') ?>

    <footer id="sticky-footer" class="py-4 bg-transparent text-dark-50">
      <div class="container text-center"> <small>
          <p>Page Load
            <strong>{elapsed_time}</strong> s</p>
          <p>Toko online. made by<i class="fa
fas fa-heart text-danger heart"></i> Frendi Diyon</p>
        </small> </div>
    </footer>
  </div>


  <!-- Bootstrap -->
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- <script src="/assets/bootstrap/popper.js"></script> -->
  <!-- <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('.formuser').submit(function(e) {
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: $(this).serialize(),
          dataType: "json",
          beforeSend: function() {
            $('.btnsimpan').attr('disable', 'disabled');
            $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
          },
          complete: function() {
            $('.btnsimpan').removeAttr('disable');
            $('.btnsimpan').html('Submit');
          },
          success: function(response) {
            if (response.error) {
              if (response.error.user) {
                $('#user').addClass('is-invalid');
                $('.erroruser').html(response.error.user);
              } else {
                $('#user').removeClass('is-invalid')
                $('.erroruser').html('');
              }
              if (response.error.password) {
                $('#password').addClass('is-invalid');
                $('.errorpassword').html(response.error.password);
              } else {
                $('#password').removeClass('is-invalid')
                $('.errorpassword').html('');
              }

            } else {
              $('#exampleModal').modal('hide');
            }
            if (response.url) {
              if (response.url.status == 'success') {
                window.location.href = response.url.redirect;
              }
            }
            $('input[name=csrf_test_name]').val(response.csrf_test_name);
          },
        })
      })
    })
  </script>

  <script type="text/javascript">
    const flashDatae = $('.flash-data-e').data('flashdata');
    if (flashDatae) {
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'center',
          showConfirmButton: true,
          timerProgressBar: true,
          // timer: 10000
        });
        Toast.fire({
          icon: 'error',
          title: flashDatae,
          type: 'success',
        });

      });
    }
  </script>

  <?= $this->renderSection('script') ?>
</body>

</html>