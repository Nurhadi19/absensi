<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Absen Qrcode</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 15% !important;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="alert alert-primary text-center" role="alert">
                        Absen masuk dimulai pukul  <?= date("H:i",strtotime($jam_absensi->jam_masuk_awal)) ?> - <?= date("H:i",strtotime($jam_absensi->jam_masuk_akhir)) ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    </div>
                    <form class="user" action="<?= base_url('login/actionLogin') ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="id-karyawan" placeholder="Enter kode id karyawan" name="kode_karyawan">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                    </form>
                    <hr>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/sbadmin/js/sb-admin-2.min.js"></script>
    <?php if($this->session->flashdata('alert') == TRUE):?>
    <script>
        Swal.fire({title: 'ERROR',text: '<?= $this->session->flashdata('alert') ?>',icon: 'error',confirmButtonText: 'OK'})
    </script>
    <?php endif ?>
</body>

</html>

