<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <?= $this->load->view('layouts/meta', null, true); ?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/assets/css/fullpage.css" />
   <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/assets/css/examples.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
   <style type="text/css">
      body {
         font-family: 'Nerko One', cursive;
         color: #ae534e;
      }

      .btn-warning:hover {
         color: #fff;
         background-color: #81514d;
         border-color: #81514d;
      }

      .btn-warning {
         color: #fff;
         background-color: #ae534e;
         border-color: #ae534e;
      }

      #fp-nav ul li a span,
      .fp-slidesNav ul li a span {
         background: #ae534e !important;
      }
   </style>
</head>

<body style="background: url('<?= base_url(); ?>public/assets/splash/images/background.jpg'); background-size: cover; background-position: center;">
   <div id="fullpage">
      <div class="section" id="section0">
         <div class="container">
            <img src="<?= base_url(); ?>public/assets/splash/images/logo.png" alt="<?= getenv('APP_NAME'); ?>" width="144" style="margin-bottom: 20px">
            <br>
            <img class="img img-fluid" src="<?= base_url(); ?>public/assets/splash/images/title.png" alt="<?= getenv('APP_TITLE'); ?>">
            <h2 class="mb-5 pb-3">Berkarya Bersama Ciptakan Kejayaan Indonesia</h2>
            <div class="mt-5">
               <div class="animate__animated animate__bounce animate__infinite">
                  <span class="mt-5 d-block">Daftar Acara!</span>
                  <i class="fas fa-arrow-circle-down fa-2x"></i>
               </div>
            </div>
         </div>
      </div>
      <div class="section" id="section1">
         <div class="container">
            <div class="row">
               <div class="col-md-6 align-self-center">
                  <img src="<?= base_url(); ?>public/assets/splash/images/rumah.png" alt="<?= getenv('APP_NAME'); ?>" width="104">
                  <h2 class="mb-0">Tablig Akbar #1</h2>
                  <h5>Ukhuwah dan Fastabiqul Khairat: Tak Boleh Mati di Tengah Pandemi</h5>
                  <span class="d-block"><i class="fas fa-calendar"></i> Sabtu, 19 Desember 2020</span>
                  <span class="d-block"><i class="fas fa-clock"></i> 19.30 WIB - Selesai</span>
                  <a href="http://gg.gg/tablighakbar1fokri" class="btn btn-warning mt-3 font-weight-bold">Daftar Tablig #1</a>
                  <a href="https://wa.me/6282333472574" class="text-dark d-block mt-3"><i class="fab fa-whatsapp"></i> Yayan Muarif</a>
               </div>
               <div class="col-md-6 align-self-center">
                  <img class="img img-fluid" src="<?= base_url(); ?>public/assets/images/tablighthum1.png" alt="<?= getenv('APP_TITLE'); ?>">
               </div>
            </div>
         </div>
      </div>
      <div class="section" id="section2">
         <div class="container">
            <div class="row">
               <div class="col-md-6 align-self-center">
                  <img class="img img-fluid" src="<?= base_url(); ?>public/assets/images/webinarthum.png" alt="<?= getenv('APP_TITLE'); ?>">
               </div>
               <div class="col-md-6 align-self-center">
                  <img src="<?= base_url(); ?>public/assets/splash/images/rumah.png" alt="<?= getenv('APP_NAME'); ?>" width="104">
                  <h2 class="mb-0">Webinar Fokri</h2>
                  <h5>Berdaya Karya untuk Indonesia</h5>
                  <span class="d-block mb-0"><i class="fas fa-calendar"></i> Ahad, 20 Desember 2020</span>
                  <span class="d-block"><i class="fas fa-clock"></i> 12.30 WIB - Selesai</span>
                  <a href="http://gg.gg/webinarfokri" class="btn btn-warning mt-3 font-weight-bold">Daftar Webinar</a>
                  <a href="https://wa.me/6281578938738" class="text-dark d-block mt-3"><i class="fab fa-whatsapp"></i> Faturrachman</a>
               </div>
            </div>
         </div>
      </div>
      <div class="section" id="section1">
         <div class="container">
            <div class="row">
               <div class="col-md-6 align-self-center">
                  <img src="<?= base_url(); ?>public/assets/splash/images/rumah.png" alt="<?= getenv('APP_NAME'); ?>" width="104">
                  <h2 class="mb-0">Tablig Akbar #2</h2>
                  <h5 class="mt-0">Satu Cita Demi Negeri Tercinta</h5>
                  <span class="d-block"><i class="fas fa-calendar"></i> Ahad, 20 Desember 2020</span>
                  <span class="d-block"><i class="fas fa-clock"></i> 15.30 WIB - Selesai</span>
                  <a href="http://gg.gg/tablighakbar2fokri" class="btn btn-warning mt-3 font-weight-bold">Daftar Tablig #2</a>
                  <a href="https://wa.me/6281377982938" class="text-dark d-block mt-3"><i class="fab fa-whatsapp"></i> Ilham Tsaqif</a>
               </div>
               <div class="col-md-6 align-self-center">
                  <img class="img img-fluid" src="<?= base_url(); ?>public/assets/images/tablighthum2.png" alt="<?= getenv('APP_TITLE'); ?>">
               </div>
            </div>
         </div>
      </div>
      <div class="section" id="section1">
         <div class="container">
            <div class="row">
               <div class="col">
                  <img src="<?= base_url(); ?>public/assets/splash/images/logo.png" alt="<?= getenv('APP_NAME'); ?>" width="96">
                  <span class="d-block mb-4"> &#169;2020 Fokri Games VI</span>
                  <h3 class="mt-5">Media Partner</h3>
                  <img class="p-2" src="<?= base_url(); ?>public/assets/images/medpart1.png" alt="<?= getenv('APP_NAME'); ?>" width="64">
                  <img class="p-2" src="<?= base_url(); ?>public/assets/images/medpart2.png" alt="<?= getenv('APP_NAME'); ?>" width="64">
                  <img class="p-2" src="<?= base_url(); ?>public/assets/images/medpart3.png" alt="<?= getenv('APP_NAME'); ?>" width="64">
                  <img class="p-2" src="<?= base_url(); ?>public/assets/images/medpart4.png" alt="<?= getenv('APP_NAME'); ?>" width="64">
               </div>
            </div>
         </div>
      </div>
   </div>

   <script type="text/javascript" src="https://alvarotrigo.com/fullPage/fullpage.js"></script>
   <script type="text/javascript" src="<?= base_url(); ?>public/assets/js/examples.js"></script>
   <script type="text/javascript">
      var myFullpage = new fullpage('#fullpage', {
         navigation: true,
         navigationPosition: 'right'
      });
   </script>

</body>

</html>