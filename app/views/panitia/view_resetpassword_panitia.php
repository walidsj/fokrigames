<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= (!empty($page['title'])) ? $page['title'] : "Sebuah Halaman"; ?> - <?= (!empty($page['web'])) ? $page['web'] : 'FOKRI GAMES VI 2020'; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<div class="login-logo">
					<a href="<?= site_url(); ?>panitia/login"><img class="img img-circle elevation-3" width="100" src="<?= base_url(); ?>assets/images/logo.png"></a>
				</div>
				<p class="login-box-msg"><strong>MASUKKAN PASSWORD AKUN PANITIA</strong></p>
				<?= $this->session->flashdata('message'); ?>
				<?= form_open('panitia/reset-password?email=' . urlencode($this->input->get('email')) . '&token=' . urlencode($this->input->get('token'))); ?>
				<div class="input-group mb-3">
					<input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password Baru" value="<?= set_value('password'); ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-key"></span>
						</div>
					</div>
					<span class="error invalid-feedback"><?= form_error('password'); ?></span>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control <?= (form_error('repassword')) ? 'is-invalid' : ''; ?>" id="repassword" name="repassword" placeholder="Ulangi Password Baru" value="<?= set_value('repassword'); ?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-key"></span>
						</div>
					</div>
					<span class="error invalid-feedback"><?= form_error('repassword'); ?></span>
				</div>
				<div class="input-group mb-3">
					<button type="submit" class="btn btn-danger btn-block">Simpan Password</button>
				</div>
				<?= form_close(); ?>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>

	<!-- JS -->
	<script src="<?= base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>