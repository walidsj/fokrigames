<?= $this->load->view('peserta/layouts/header', null, true); ?>
<?= $this->load->view('components/alert', null, true); ?>

<div class="container-scroller">
   <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
         <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
               <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <a href="<?= site_url(); ?>">
                     <div class="brand-logo">
                        <img src="<?= base_url(); ?>public/assets/frontend/images/logo.png" alt="<?= getenv('APP_NAME'); ?>">
                     </div>
                  </a>
                  <h4>Assalamu'alaikum</h4>
                  <h6 class="font-weight-light">Silakan login untuk melanjutkan.</h6>
                  <?= form_open(current_url(), ['class' => 'pt-3']); ?>
                  <div class="form-group mb-3">
                     <input name="whatsapp" type="number" class="form-control form-control-lg <?= (form_error('whatsapp')) ? 'border-danger' : ''; ?>" id="whatsapp" placeholder="No. WhatsApp" value="<?= set_value('whatsapp'); ?>">
                     <?= form_error('whatsapp'); ?>
                  </div>
                  <div class="form-group">
                     <input name="password" type="password" class="form-control form-control-lg <?= (form_error('password')) ? 'border-danger' : ''; ?>" id="password" placeholder="PIN">
                     <?= form_error('password'); ?>
                  </div>
                  <div class="mt-3">
                     <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                  </div>
                  <div class="mb-2 mt-4 d-flex align-items-center">
                     <a href="#" class="auth-link text-black">Lupa password?</a>
                  </div>
                  <?= form_close(); ?>
                  <div class="text-center mt-4 font-weight-light">
                     Belum punya akun? <a data-toggle="modal" data-target="#exampleModal" href="#" class="text-primary">Daftar</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">

         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pendaftaran</h5>
         </div>
         <div id="formulir" class="modal-body">
            <div class="form-group">
               Silakan menghubungi panitia untuk melakukan pendaftaran:
               <ul class="mt-2">
                  <li class="mb-2"><span class="d-block">Narahubung Ikhwan (Ibnu)</span>
                     <a class="btn btn-sm btn-success" href="https://api.whatsapp.com/send?phone=6285773002435&text=*%5B%20FORMAT%20PENDAFTARAN%20AKUN%20KONTINGEN%20%5D*%0A%0ANama%20Lengkap%3A%20%0AAsal%20PTK%3A%20%0ANo.%20WhatsApp%3A%20">Hubungi</a></li>
                  <li class="mb-2"><span class="d-block">Narahubung Akhwat (Fakhra)</span>
                     <a class="btn btn-sm btn-success" href="https://api.whatsapp.com/send?phone=6281318559085&text=*%5B%20FORMAT%20PENDAFTARAN%20AKUN%20KONTINGEN%20%5D*%0A%0ANama%20Lengkap%3A%20%0AAsal%20PTK%3A%20%0ANo.%20WhatsApp%3A%20">Hubungi</a></li>
               </ul>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
         </div>
      </div>
   </div>
</div>

<?= $this->load->view('peserta/layouts/footer', null, true); ?>
<?= $this->load->view('peserta/layouts/html_close', null, true); ?>