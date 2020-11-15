<!DOCTYPE html>
<html lang="en-US">
<!--<![endif]-->

<head>
	<!-- Required meta tags -->
	<?= $this->load->view('layouts/meta', null, true); ?>

	<link href="<?= base_url('assets/favicon.png'); ?>" rel="shortcut icon" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/linktree/css/style.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,900' rel='stylesheet' type='text/css'>

</head>

<body>
	<noscript>
		Browser tidak support javascript atau fungsi script pada browser telah dimatikan.
	</noscript>
	<a href="<?= site_url(); ?>">
		<img class="logo" src="<?= base_url(); ?>assets/linktree/images/logo.png" alt="logo" style="width: 100px; margin-top: 32px">
	</a>
	<h2>Petunjuk Teknis</h2>
	<div class="links">
		<div class="links__item">
			<a class="links__item links__item--product" href="https://drive.google.com/file/d/176RWPubuXsVdnKyXlaj_I_axBNqzuID4/view?usp=sharing" target="_blank">Mekanisme Lomba Fokri Games VI</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--promo" href="https://drive.google.com/file/d/1nCSZAJmDW6Lt0BJOLtkx1s7wGv3_Wyt7/view?usp=sharing" target="_blank">Lomba Adzan</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--past-event" href="https://drive.google.com/file/d/1TiBLJvErXwedXC-DDAhonBfO5V3fozqh/view?usp=sharing" target="_blank">Lomba Da'i</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--featured" href="https://drive.google.com/file/d/1_3Jtu4i-E9x__Q4grpQAmNSQphQC0rNH/view?usp=sharing" target="_blank">Lomba Esai</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--alumni" href="https://drive.google.com/file/d/1d_R28lV3oJocmGULN1l_3CbGM9v6im1F/view?usp=sharing" target="_blank">Lomba Fotografi</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--upcoming" href="https://drive.google.com/file/d/1FoIhC0XmeMWtlpG8xc_ewUfJXzuA3Aex/view?usp=sharing" target="_blank">Lomba Kaligrafi</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--past-event" href="https://drive.google.com/file/d/1T4UijMlJ9uaJNQXzc2TUPYnjUzwxXXtn/view?usp=sharing" target="_blank">Lomba MTQ</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--product" href="https://drive.google.com/file/d/1LRSbeXOMdLspVTi_4PmbFR8QxCx0hRAq/view?usp=sharing" target="_blank">Lomba Podcast</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--blog" href="https://drive.google.com/file/d/1EIR1VGk7DCBACE_O29AYMH6a3ya1INJA/view?usp=sharing" target="_blank">Lomba Poster</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--promo" href="https://drive.google.com/file/d/18RBGcvNYIilpIYvMrLma7t0DxaKqPJK8/view?usp=sharing" target="_blank">Lomba Puitisasi Al-Quran</a>
		</div>
		<div class="links__item">
			<a class="links__item links__item--past-event" href="https://drive.google.com/file/d/1cIWHggWphkVZglfZ0obcBkbek4nnEH03/view?usp=sharing" target="_blank">Lomba Video PTK</a>
		</div>
	</div>


	<div class="channels" style="margin:32px auto">
		<a class="channels__item" href="https://www.instagram.com/fokrigames6/" target="_blank"><img src="<?= base_url(); ?>assets/linktree/images/instagram.png" alt="instagram" width=40 height=40></a>
	</div>
	</div>

	<span style="font-size: 12px; text-align: center; margin-top:20px; margin-bottom: 80px">
		© 2020 Infomed <?= getenv('APP_NAME') ?><br>
		Politeknik Keuangan Negara STAN
	</span>

</body>

</html>