<?= $this->load->view('peserta/layouts/header', null, true); ?>
<?= $this->load->view('components/alert', null, true); ?>

<div class="container-scroller">

   <?= $this->load->view('peserta/components/navbar', null, true); ?>

   <div class="container-fluid page-body-wrapper">

      <?= $this->load->view('peserta/components/sidebar', null, true); ?>


      <div class="main-panel">
         <div class="content-wrapper">
            <?php if (!empty($pendaftar->fg_status) < 1) : ?>
               <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="alert alert-info mt-2 mb-0"><i class="typcn typcn-info"></i><br><b>Info </b>Data pendaftaran tidak bisa dirubah lagi jika sudah dilakukan finalisasi.</div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title">Finalisasi Pendaftaran</h4>
                           <div class="info-box">
                              <?php if (!empty($pendaftar->pakta) && !empty($peserta)) : ?>
                                 <?= form_open(current_url()); ?>
                                 <div class="info-box-content">
                                    <div class="form-group">
                                       <div class="form-group mb-3">
                                          <div class="custom-control custom-checkbox <?= (form_error('terms')) ? 'is-invalid' : ''; ?>">
                                             <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" aria-describedby="terms-error" aria-invalid="true">
                                             <label class="custom-control-label" for="exampleCheck1">Saya telah mengisi data pendaftaran dengan sebenar-benarnya dan menyetujui seluruh <a href="<?= base_url(); ?>assets/dokumen/Panduan%20Pelaksanaan%20Fokri%20Games%20VI.pdf">ketentuan dan persyaratan</a> yang telah ditetapkan oleh Panitia FOKRI Games VI.</label>
                                          </div>
                                          <span id="terms-error" class="error invalid-feedback" style="display: inline;"><?= form_error('terms'); ?></span>
                                       </div>
                                       <!-- /.col -->
                                       <div class="input-group mb-3">
                                          <button type="submit" class="btn btn-danger btn-block">Finalisasi Pendaftaran</button>
                                       </div>
                                    </div>
                                 </div>
                                 <?= form_close(); ?>
                              <?php else : ?>
                                 <span class="text-muted">Tombol finalisasi akan muncul jika data peserta dan berkas scan pakta integritas dilengkapi.</span>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php else : ?>
               <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="alert alert-success mt-2 mb-0"><i class="typcn typcn-info"></i><br>Pendaftaran telah difinalisasi pada hari <b><?= strftime('%a, %e %B %Y %R WIB', $pendaftar->fg_status); ?></b>. Data yang sudah diisi dikirimkan ke panitia.</div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title">Finalisasi Pendaftaran</h4>
                           <div class="info-box">
                              Pendaftaran sudah difinalisasi. Silakan hubungi panitia.
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
         </div>

         <?= $this->load->view('peserta/components/footer', null, true); ?>

      </div>
   </div>
</div>

<?= $this->load->view('peserta/layouts/footer', null, true); ?>
<?php if (validation_errors() != null) : ?>
   <script>
      $('#exampleModal').modal('show');
   </script>
<?php endif; ?>
<?= $this->load->view('peserta/layouts/html_close', null, true); ?>