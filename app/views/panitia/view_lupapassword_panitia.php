<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= (!empty($page['title'])) ? $page['title'] : "Sebuah Halaman"; ?> - <?= (!empty($page['web'])) ? $page['web'] : 'FOKRI GAMES VI 2020'; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/adminlte/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?= $this->session->flashdata('message'); ?>
                <?= form_open(current_url()); ?>
                <div class="input-group mb-3">
                    <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Masukkan Alamat Email" value="<?= set_value('email'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <span class="error invalid-feedback"><?= form_error('email'); ?></span>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-danger btn-block">Reset Password</button>
                </div>
                <?= form_close(); ?>

                <p class="mb-1">
                    <a href="<?= site_url(); ?>panitia/login">Masuk</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

    <!-- JS -->
    <script src="<?= base_url(); ?>public/assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>public/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>public/assets/adminlte/dist/js/adminlte.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>