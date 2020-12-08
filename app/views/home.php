<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title><?= (!empty($title)) ? $title . ' — ' . getenv('APP_NAME') : getenv('APP_NAME') . ' — ' . getenv('APP_TITLE'); ?></title>
   <meta name="author" content="<?= (!empty($title)) ? $title . ' — ' . getenv('APP_NAME') : getenv('APP_NAME') . ' — ' . getenv('APP_TITLE'); ?>" />
   <meta name="description" content="<?= (!empty($title)) ? $title . ' — ' . getenv('APP_NAME') : getenv('APP_NAME') . ' — ' . getenv('APP_TITLE'); ?>" />
   <meta name="keywords" content="<?= (!empty($title)) ? $title . ' — ' . getenv('APP_NAME') : getenv('APP_NAME') . ' — ' . getenv('APP_TITLE'); ?>" />
   <meta name="Resource-type" content="Document" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
   <link rel="stylesheet" type="text/css" href="https://alvarotrigo.com/fullPage/fullpage.css" />
   <link rel="stylesheet" type="text/css" href="https://alvarotrigo.com/fullPage/examples/examples.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
   <style type="text/css">
      body {
         font-family: 'Nerko One', cursive;
         color: #81514d;
      }
   </style>
</head>

<body style="background: url('<?= base_url(); ?>public/assets/splash/images/background.jpg'); background-size: cover; background-position: center;">
   <div id="fullpage">
      <div class="section" id="section0">
         <div class="container">
            <img src="<?= base_url(); ?>public/assets/splash/images/logo.png" alt="<?= getenv('APP_NAME'); ?>" width="75" style="margin-bottom: 20px">
            <br>
            <img class="img img-fluid" src="<?= base_url(); ?>public/assets/splash/images/title.png" alt="<?= getenv('APP_TITLE'); ?>">
            <h2 class="mb-5">Berkarya Bersama Ciptakan Kejayaan Indonesia</h2>
            <div class="animate__animated animate__bounce animate__infinite"><i class="fas fa-arrow-circle-down fa-2x"></i></div>
         </div>
      </div>
      <div class="section" id="section1">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <img src="<?= base_url(); ?>public/assets/splash/images/logo.png" alt="<?= getenv('APP_NAME'); ?>" width="75">
                  <h1>Tablig Akbar #1</h1>
                  <h4>Ukhuwah dan Fastabiqul Khairat: Tak Boleh Mati di Tengah Pandemi</h4>
                  <a href="http://gg.gg/tablighakbar1fokri" class="btn btn-warning mt-5 font-weight-bold">Daftar Tablig #1</a>
               </div>
               <div class="col-md-6">

               </div>
            </div>
         </div>
      </div>
      <div class="section" id="section2">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <img class="img img-fluid" src="<?= base_url(); ?>public/assets/images/webinarthum.png" alt="<?= getenv('APP_TITLE'); ?>">
               </div>
               <div class="col-md-6">
                  <img src="<?= base_url(); ?>public/assets/splash/images/logo.png" alt="<?= getenv('APP_NAME'); ?>" width="75">
                  <h1>Webinar Fokri</h1>
                  <h3>Berdaya Karya untuk Indonesia</h3>
                  <a href="http://gg.gg/webinarfokri" class="btn btn-warning mt-5 font-weight-bold">Daftar Webinar</a>
               </div>
            </div>
         </div>
      </div>
      <div class="section" id="section1">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <img src="<?= base_url(); ?>public/assets/splash/images/logo.png" alt="<?= getenv('APP_NAME'); ?>" width="75">
                  <h1>Tablig Akbar #2</h1>
                  <h3>Satu Cita Demi Negeri Tercinta</h3>
                  <a href="http://gg.gg/tablighakbar2fokri" class="btn btn-warning mt-5 font-weight-bold">Daftar Tablig #2</a>
               </div>
               <div class="col-md-6">

               </div>
            </div>
         </div>
      </div>
      <div class="section" id="section1">
         <div class="container">
            <div class="row">
               <div class="col">
                  <img src="<?= base_url(); ?>public/assets/splash/images/logo.png" alt="<?= getenv('APP_NAME'); ?>" width="75">
                  <h3>Media Partner</h3>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script type="text/javascript" src="https://alvarotrigo.com/fullPage/fullpage.js"></script>
   <script type="text/javascript" src="https://alvarotrigo.com/fullPage/examples/examples.js"></script>
   <script type="text/javascript">
      var myFullpage = new fullpage('#fullpage', {
         navigation: true,
         navigationPosition: 'right'
      });
   </script>

</body>

</html>