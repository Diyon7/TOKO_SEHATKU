<?php

use Config\Validation;

$session = \Config\Services::session(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>

</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent ml-4 mr-4">

      <a class="navbar-brand text-bold" href="<?= base_url('/') ?>">
        Toko Sehatku
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center " id="navbarSupportedContent">
        <ul class="navbar-nav mx-md-auto">

          <li class="nav-item active">
            <a class="nav-link text-dark" href="<?= base_url('/') ?>">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-dark" href="<?= site_url('/product') ?>">
              Product
            </a>

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

    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('success') ?>"></div>
    <div class="flash-data-e" data-flashdata="<?= session()->getFlashdata('error') ?>"></div>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="flash-data" data-flashdata="<?= session()->getFlashdata('success') ?>"></div>
      <div class="flash-data-e" data-flashdata="<?= session()->getFlashdata('error') ?>"></div>
      <?php if (session()->has('success')) : ?>

      <?php endif; ?>


      <?= $this->renderSection('isi'); ?>


    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">

      <strong> Package <a href="http://adminlte.io">Admin LTE</a>.</strong>
      <a href="">Website Dibuat Oleh Diyon </a>
      Page rendered in {elapsed_time} seconds


    </footer>
  </div>




  <!-- <script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script> -->
  <script src="<?= base_url() ?>/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js" integrity="sha256-I//nGqEYcRlQfWdLiDc5tcWUU3GzGfJpZWs2qsfj3Dk=" crossorigin="anonymous"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="<?= base_url() ?>/assets/dist/js/adminlte.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script type="text/javascript">
    $(function() {
      $('input[name="tgll"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });

    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-start',
          showConfirmButton: false,
          timerProgressBar: true,
          timer: 5000
        });
        Toast.fire({
          icon: 'success',
          title: flashData,
          type: 'success',
        });

      });
    }
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

  <script>
    $(function() {
      // Summernote
      $('.textarea').summernote()
    })
  </script>
</body>

</html>