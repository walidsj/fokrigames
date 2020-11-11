<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
   <div class="navbar-brand-wrapper d-flex justify-content-center">
      <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
         <a class="navbar-brand brand-logo" href="<?= site_url(); ?>dasbor"><img src="<?= base_url(); ?>public/assets/frontend/images/header.png" alt="logo" /></a>
         <a class="navbar-brand brand-logo-mini" href="<?= site_url(); ?>"><img src="<?= base_url(); ?>public/assets/frontend/images/logo.png" alt="logo" /></a>
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
         </button>
      </div>
   </div>
   <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav navbar-nav-right">
         <li class="nav-item nav-date dropdown">
            <a class="nav-link d-flex justify-content-center align-items-center">
               <h6 class="date mb-0"><?= strftime('%a, %e %B %Y', now()); ?></h6>
               <i class="typcn typcn-calendar"></i>
            </a>
         </li>
         <li class="nav-item dropdown mr-0">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
               <i class="typcn typcn-bell mx-0"></i>
               <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
               <p class="mb-0 font-weight-normal float-left dropdown-header">Notifikasi</p>
               <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                     <div class="preview-icon bg-info">
                        <i class="typcn typcn-user mx-0"></i>
                     </div>
                  </div>
                  <div class="preview-item-content">
                     <h6 class="preview-subject font-weight-normal">Selamat Datang!</h6>
                     <p class="font-weight-light small-text mb-0 text-muted">
                        <?= strftime('%e %B %Y', now()); ?>
                     </p>
                  </div>
               </a>
            </div>
         </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
         <span class="typcn typcn-th-menu"></span>
      </button>
   </div>
</nav>