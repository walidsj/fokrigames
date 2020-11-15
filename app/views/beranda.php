<!DOCTYPE html>
<html lang="en-US">
<!--<![endif]-->

<head>
	<?= $this->load->view('layouts/meta', null, true); ?>

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,900' rel='stylesheet' type='text/css'><!-- Styles -->
	<link href="<?= base_url(); ?>public/assets/splash/css/loader.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>public/assets/splash/css/normalize.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url(); ?>public/assets/splash/css/font-awesome.min.css">
	<link href="<?= base_url(); ?>public/assets/splash/css/style.css" rel="stylesheet" type="text/css">

	<script src="<?= base_url(); ?>public/assets/splash/js/jquery.js"></script>
</head>

<body>
	<noscript>
		Browser tidak support javascript atau fungsi script pada browser telah dimatikan.
	</noscript>
	<div class="wrapper">
		<ul class="scene unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15" id="scene">
			<li class="layer" data-depth="0.00">
			</li>
			<!-- BG -->

			<li class="layer" data-depth="0.10">
				<div class="background">
				</div>
			</li>

			<!-- Hero -->

			<li class="layer" data-depth="0.20">
				<div class="title">
					<img src="<?= base_url(); ?>public/assets/splash/images/logo.png" alt="<?= getenv('APP_NAME'); ?>" width="75">
				</div>
			</li>

			<li class="layer" data-depth="0.25">
				<div class="sphere">
					<img alt="sphere" src="<?= base_url(); ?>public/assets/splash/images/rumah.png">
				</div>
			</li>

			<li class="layer" data-depth="0.30">
				<div class="hero">
					<!-- <h1 id="countdown">
						The most spectacular coming soon template!
					</h1> -->
					<img src="<?= base_url(); ?>public/assets/splash/images/title.png" alt="<?= getenv('APP_TITLE'); ?>" style="width: 60vw">
					<h2 id="demo" class="sub-title"></h2>
					<!--<p class="sub-title">
						<h2>Berkarya Bersama Ciptakan Kejayaan Indonesia</h2>
					</p>-->
				</div>
			</li>
			<!-- Flakes -->

			<li class="layer" data-depth="0.40">
				<div class="depth-1 flake3">
					<img alt="flake" src="<?= base_url(); ?>public/assets/splash/images/1.png">
				</div>
			</li>

			<li class="layer" data-depth="0.60">
				<div class="depth-3 flake4">
					<img alt="flake" src="<?= base_url(); ?>public/assets/splash/images/2.png">
				</div>
			</li>

			<li class="layer" data-depth="0.80">
				<div class="depth-4">
					<img alt="flake" src="<?= base_url(); ?>public/assets/splash/images/1.png">
				</div>
			</li>

			<li class="layer" data-depth="1.00">
				<div class="depth-5">
					<img alt="flake" src="<?= base_url(); ?>public/assets/splash/images/3.png">
				</div>
			</li>
			<!-- Contact -->

			<!-- <li class="layer" data-depth="0.20">
				<div class="contact">
					<h4>
						<a href="<?= site_url(); ?>daftar">
							DAFTAR
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?= site_url(); ?>masuk">
							MASUK
						</a>
					</h4>
				</div>
			</li> -->
		</ul>
	</div>

	<!-- Javascript -->
	<script src="<?= base_url(); ?>public/assets/splash/js/plugins.js"></script>
	<script src="<?= base_url(); ?>public/assets/splash/js/jquery.countdown.min.js"></script>
	<script src="<?= base_url(); ?>public/assets/splash/js/main.js"></script>
	<!-- Display the countdown timer in an element -->

	<script>
		// Set the date we're counting down to
		var countDownDate = new Date("Nov 7, 2020 18:00:00").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

			// Get today's date and time
			var now = new Date().getTime();

			// Find the distance between now and the count down date
			var distance = countDownDate - now;

			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Display the result in the element with id="demo"
			document.getElementById("demo").innerHTML = days + "H " + hours + "J " +
				minutes + "M " + seconds + "S ";

			// If the count down is finished, write some text
			if (distance < 0) {
				clearInterval(x);
				document.getElementById("demo").innerHTML = "Dibuka";
			}
		}, 1000);
	</script>

	<?= $this->load->view('peserta/layouts/html_close', null, true); ?>