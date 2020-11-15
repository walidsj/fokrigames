<?= $this->load->view('peserta/layouts/header', null, true); ?>
<?= $this->load->view('components/alert', null, true); ?>

<div class="container-scroller">

   <?= $this->load->view('peserta/components/navbar', null, true); ?>

   <div class="container-fluid page-body-wrapper">

      <?= $this->load->view('peserta/components/sidebar', null, true); ?>


      <div class="main-panel">
         <div class="content-wrapper">
            <?php if (!empty($pendaftar->fg_status) > 0) : ?>
               <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="alert alert-success mt-2 mb-0"><i class="typcn typcn-info"></i><br>Pendaftaran telah difinalisasi pada hari <b><?= strftime('%a, %e %B %Y %R WIB', $pendaftar->fg_status); ?></b>. Data yang sudah diisi dikirimkan ke panitia.</div>
                  </div>
               </div>
            <?php endif; ?>
            <div class="row">
               <div class="col-md-6 grid-margin stretch-card">
                  <div class="card profile-card bg-gradient-primary">
                     <div class="card-body">
                        <div class="row align-items-center h-100">
                           <div class="col-md-4">
                              <figure class="avatar mx-auto mb-4 mb-md-0 border-0">
                                 <img src="<?= base_url(); ?>public/assets/frontend/images/user.png" alt="avatar">
                              </figure>
                           </div>
                           <div class="col-md-8">
                              <h5 class="text-white text-center text-md-left"><?= $pendaftar->nama_lengkap; ?></h5>
                              <p class="text-white text-center text-md-left">
                                 <?= $pendaftar->nama_universitas; ?>
                              </p>
                              <p class="text-white text-center text-md-left">
                                 <?= $pendaftar->npm; ?>
                              </p>
                              <div class="d-flex align-items-center justify-content-between info pt-2">
                                 <p class="text-white font-weight-bold">
                                    <?= $pendaftar->whatsapp; ?>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                     <?php if (!empty($pendaftar->pakta)) : ?>
                        <div class="card-body">
                           <h4 class="card-title mb-1">Scan Pakta Integritas</h4>
                           <p class="card-description">Sudah diunggah</p>
                           <!-- Modal starts -->
                           <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Lihat Pakta</h5>
                                    </div>
                                    <div class="modal-body">
                                       <div id="PDFPakta"></div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Modal Ends -->
                           <button class="btn btn-success btn-icon-text" data-toggle="modal" data-target="#exampleModal1">
                              <i class="typcn typcn-download btn-icon-prepend"></i>
                              Lihat Berkas
                           </button>

                           <?php if (!empty($pendaftar->fg_status) < 1) : ?>
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">

                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Scan Pakta Integritas</h5>
                                       </div>
                                       <?= form_open_multipart(current_url(), ['id' => 'uploadPakta']); ?>
                                       <div id="formulir" class="modal-body">
                                          <div class="form-group">
                                             <small class="text-primary">Ukuran berkas maks 5MB (.pdf)</small>
                                             <input type="file" id="uploadFile" name="pakta" class="file-upload-default" accept="application/pdf">
                                             <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Pakta Integritas">
                                                <span class="input-group-append">
                                                   <button class="file-upload-browse btn btn-primary" type="button">Pilih Berkas</button>
                                                </span>
                                             </div>
                                             <?= form_error('pakta'); ?>
                                          </div>
                                          <div class="form-group">
                                             <div class="form-check">
                                                <label class="form-check-label">
                                                   <input type="checkbox" class="form-check-input" name="check">
                                                   Pakta Integritas yang saya lampirkan sudah benar.
                                                   <i class="input-helper"></i></label>
                                             </div>
                                             <?= form_error('check'); ?>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                          <input type="submit" class="btn btn-success btn-icon-text" value="Unggah">
                                       </div>
                                       <?= form_close(); ?>
                                    </div>
                                 </div>
                              </div>
                              <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-white btn-icon-text">
                                 <i class="typcn typcn-upload btn-icon-prepend"></i>
                                 Perbarui Berkas
                              </button>
                           <?php endif; ?>
                        </div>
                     <?php else : ?>
                        <div class="card-body">
                           <h4 class="card-title mb-1">Scan Pakta Integritas</h4>
                           <p class="card-description">Belum Diunggah</p>
                           <span class="iconify" data-icon="typcn:media-stop-outline" data-inline="false"></span>
                           <!-- Modal starts -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                              <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                 <div class="modal-content">

                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Scan Pakta Integritas</h5>
                                    </div>
                                    <?= form_open_multipart(current_url(), ['id' => 'uploadPakta']); ?>
                                    <div id="formulir" class="modal-body">
                                       <div class="form-group">
                                          <small class="text-primary">Ukuran berkas maks 5MB (.pdf)</small>
                                          <input type="file" id="uploadFile" name="pakta" class="file-upload-default" accept="application/pdf">
                                          <div class="input-group col-xs-12">
                                             <input type="text" class="form-control file-upload-info" disabled placeholder="Pakta Integritas">
                                             <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Pilih Berkas</button>
                                             </span>
                                          </div>
                                          <?= form_error('pakta'); ?>
                                       </div>
                                       <div class="form-group">
                                          <div class="form-check">
                                             <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="check">
                                                Pakta Integritas yang saya lampirkan sudah benar.
                                                <i class="input-helper"></i></label>
                                          </div>
                                          <?= form_error('check'); ?>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                       <input type="submit" class="btn btn-success btn-icon-text" value="Unggah">
                                    </div>
                                    <?= form_close(); ?>
                                 </div>
                              </div>
                           </div>
                           <!-- Modal Ends -->
                           <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-icon-text">
                              <i class="typcn typcn-upload btn-icon-prepend"></i>
                              Unggah Berkas
                           </button>
                           <a href="<?= site_url(); ?>" class="btn btn-light btn-icon-text">
                              <i class="typcn typcn-download btn-icon-prepend"></i>
                              Unduh Template
                           </a>
                        </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
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
<script src="<?= base_url(); ?>public/assets/frontend/vendors/pdfobject/pdfobject.min.js"></script>
<script>
   PDFObject.embed("<?= base_url(); ?>public/uploads/pakta/<?= $pendaftar->pakta ?>", "#PDFPakta");
</script>
<?= $this->load->view('peserta/layouts/html_close', null, true); ?>