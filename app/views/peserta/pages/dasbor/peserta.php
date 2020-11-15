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
            <?php else : ?>
               <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="alert alert-info mt-2 mb-0">
                        <i class="typcn typcn-lightbulb"></i>
                        <br>
                        <b>Tips! </b>Klik nama peserta untuk melihat detail peserta atau menghapus data peserta yang bersangkutan.
                     </div>
                  </div>
               </div>
            <?php endif; ?>
            <div class="row">
               <?php foreach ($cabor as $cao) { ?>
                  <div class="col-md-6 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title m-0"><?= $cao->nama_cabor; ?></h5>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <?php
                              $i_psr_p = 0;
                              $i_psr_l = 0;
                              if ($cao->maks_peserta_l > 0) : ?>
                                 <div class="col-md-6">
                                    <div class="m-1" style="border-radius: 10px;border: 1px #f1f1f1 solid;">
                                       <?php foreach ($peserta as $psr) {
                                          if ($psr->id_cabor == $cao->id && $psr->fg_kelamin == 1) { ?>
                                             <a href="<?= site_url(); ?>peserta/lihat?id=<?= $psr->id; ?>">
                                                <div class="d-flex align-items-center p-2 text-dark">
                                                   <img src="<?= base_url(); ?>public/uploads/foto_peserta/<?= $psr->foto; ?>" alt="<?= $psr->nama_peserta; ?>" class="img img-circle" width="40" height="40" style="border-radius: 50%">
                                                   <div class="ml-3">
                                                      <p class="mb-0 font-weight-bold"><?= $psr->nama_peserta; ?></p>
                                                      <p class="mb-0 text-muted text-small"><?= $psr->npm; ?></p>
                                                   </div>
                                                </div>
                                             </a>
                                       <?php $i_psr_l++;
                                          }
                                       }; ?>
                                       <div class="text-center">
                                          <small class="text-muted text-center"><b>Ikhwan</b> <small><?= (($cao->maks_peserta_l + $cao->maks_peserta_p) <= $cao->maks_peserta_total) ? '(' . $i_psr_l . '/' . $cao->maks_peserta_l . ')' : ''; ?></small>
                                          </small>
                                       </div>
                                    </div>
                                 </div>
                              <?php endif; ?>
                              <?php if ($cao->maks_peserta_p > 0) : ?>
                                 <div class="col-md-6">
                                    <div class="m-1" style="border-radius: 10px;border: 1px #f1f1f1 solid;">
                                       <?php foreach ($peserta as $psr) {
                                          if ($psr->id_cabor == $cao->id && $psr->fg_kelamin == 2) { ?>
                                             <a href="<?= site_url(); ?>peserta/lihat?id=<?= $psr->id; ?>">
                                                <div class="d-flex align-items-center p-2 text-dark">
                                                   <img src="<?= base_url(); ?>public/uploads/foto_peserta/<?= $psr->foto; ?>" alt="<?= $psr->nama_peserta; ?>" class="img img-circle" width="40" height="40" style="border-radius: 50%">
                                                   <div class="ml-3">
                                                      <p class="mb-0 font-weight-bold"><?= $psr->nama_peserta; ?></p>
                                                      <p class="mb-0 text-muted text-small"><?= $psr->npm; ?></p>
                                                   </div>
                                                </div>
                                             </a>
                                       <?php $i_psr_p++;
                                          }
                                       }; ?>
                                       <div class="text-center">
                                          <small class="text-muted"><b>Akhwat</b> <small><?= (($cao->maks_peserta_l + $cao->maks_peserta_p) <= $cao->maks_peserta_total) ? '(' . $i_psr_p . '/' . $cao->maks_peserta_p . ')' : ''; ?></small>
                                          </small>
                                       </div>
                                    </div>
                                 </div>
                              <?php endif; ?>
                              <?php if (($cao->maks_peserta_l + $cao->maks_peserta_p) > $cao->maks_peserta_p) {
                              }; ?>
                           </div>

                           <div class="text-center"><small class="text-muted text-center"><?= (($cao->maks_peserta_l + $cao->maks_peserta_p) > $cao->maks_peserta_total) ? '<b>Ikhwan & Akhwat</b> (' . ($i_psr_l + $i_psr_p) . '/' . $cao->maks_peserta_total . ')' : ''; ?></small></div>

                           <?php if (!empty($pendaftar->fg_status) < 1) : ?>
                              <?php if (($i_psr_l + $i_psr_p) > $cao->maks_peserta_total) : ?>
                                 <div class="alert alert-danger mt-2 mb-0">
                                    <i class="typcn typcn-info"></i><small>Peserta yang didaftarkan melebihi kuota pendaftaran.</small>
                                 </div>
                              <?php elseif (($i_psr_l + $i_psr_p) == $cao->maks_peserta_total) : ?>
                                 <div class="alert alert-success mt-2 mb-0">
                                    <i class="typcn typcn-thumbs-up"></i><small>Kuota pendaftaran cabang <?= $cao->nama_cabor; ?> sudah penuh.</small>
                                 </div>
                              <?php endif; ?>
                           <?php endif; ?>

                           <?php if (($i_psr_l + $i_psr_p) >= $cao->maks_peserta_total) : ?>
                              <?php if (!empty($pendaftar->fg_status) < 1) : ?>
                                 <a class="btn btn-primary disabled btn-sm mt-4">Tambah Peserta</a>
                              <?php endif; ?>
                           <?php else : ?>
                              <?php if (!empty($pendaftar->fg_status) < 1) : ?>
                                 <!-- Modal starts -->
                                 <div class="modal fade" id="exampleModal<?= $cao->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?= $cao->id; ?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel<?= $cao->id; ?>"><?= $cao->nama_cabor; ?></h5>
                                          </div>
                                          <?= form_open_multipart(site_url() . 'peserta?cabor=' . $cao->id, ['id' => 'uploadPakta' . $cao->id]); ?>
                                          <div class="modal-body">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                      <label>Nama Peserta</label>
                                                      <input class="form-control form-control-sm <?= (form_error('nama_peserta')) ? 'border-danger' : ''; ?>" name="nama_peserta" value="<?= set_value('nama_peserta'); ?>" placeholder="Fulan bin Fullan">
                                                      <?= form_error('nama_peserta'); ?>
                                                   </div>
                                                   <div class="form-group">
                                                      <label>No. Induk Mahasiswa</label>
                                                      <input class="form-control form-control-sm <?= (form_error('npm')) ? 'border-danger' : ''; ?>" name="npm" value="<?= set_value('npm'); ?>" placeholder="2302180109">
                                                      <?= form_error('npm'); ?>
                                                   </div>
                                                   <div class="form-group">
                                                      <label>Jenis Kelamin</label>
                                                      <select class="form-control form-control-sm <?= (form_error('fg_kelamin')) ? 'border-danger' : ''; ?>" id="fg_kelamin" name="fg_kelamin">
                                                         <option disabled <?= (empty(set_value('fg_kelamin')) || set_value('fg_kelamin') < 1) ? 'selected' : ''; ?>>Pilih Jenis Kelamin</option>
                                                         <option value="1" <?= (set_value('fg_kelamin') == 1) ? 'selected' : ''; ?>>Ikhwan</option>
                                                         <option value="2" <?= (set_value('fg_kelamin') == 2) ? 'selected' : ''; ?>>Akhwat</option>
                                                      </select>
                                                      <?= form_error('fg_kelamin'); ?>
                                                   </div>
                                                   <div class="form-group">
                                                      <label>No. WhatsApp</label>
                                                      <input class="form-control form-control-sm <?= (form_error('whatsapp_peserta')) ? 'border-danger' : ''; ?>" name="whatsapp_peserta" value="<?= set_value('whatsapp_peserta'); ?>" placeholder="083879101232">
                                                      <?= form_error('whatsapp_peserta'); ?>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                      <label>Scan KTM</label>
                                                      <input type="file" id="uploadFile<?= $cao->id; ?>1" name="scan_ktm" class="file-upload-default" accept="application/pdf">
                                                      <div class="input-group col-xs-12">
                                                         <input type="text" class="form-control file-upload-info form-control-sm <?= (form_error('scan_ktm')) ? 'border-danger' : ''; ?>" disabled placeholder="Berkas Scan KTM">
                                                         <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary btn-sm" type="button">Pilih</button>
                                                         </span>
                                                      </div>
                                                      <small class="text-primary">Ukuran berkas maks 3MB (pdf)</small><br>
                                                      <?= form_error('scan_ktm'); ?>
                                                   </div>
                                                   <div class="form-group">
                                                      <label>Pasfoto 3x4</label>
                                                      <input type="file" id="uploadFile<?= $cao->id; ?>" accept="image/*" name="foto" class="file-upload-default">
                                                      <div class="input-group col-xs-12">
                                                         <input type="text" class="form-control file-upload-info form-control-sm <?= (form_error('foto')) ? 'border-danger' : ''; ?>" disabled placeholder="Pasfoto 3x4">
                                                         <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-sm btn-primary" type="button">Pilih</button>
                                                         </span>
                                                      </div>
                                                      <small class="text-primary">Ukuran Pasfoto maks 3MB (png/jpg)</small><br>
                                                      <?= form_error('foto'); ?>
                                                   </div>
                                                   <div class="form-group">
                                                      <div class="form-check">
                                                         <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="check">
                                                            Data yang saya input sudah benar.
                                                            <i class="input-helper"></i></label>
                                                      </div>
                                                      <?= form_error('check'); ?>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                             <input type="submit" class="btn btn-success btn-icon-text" value="Tambah">
                                          </div>
                                          <?= form_close(); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Modal Ends -->
                                 <button type="button" data-toggle="modal" data-target="#exampleModal<?= $cao->id; ?>" class="btn btn-sm btn-primary mt-4">
                                    Tambah Peserta
                                 </button>
                              <?php endif; ?>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               <?php }; ?>
               <!-- /.widget-user -->
            </div>
         </div>

         <?= $this->load->view('peserta/components/footer', null, true); ?>

      </div>
   </div>
</div>

<?= $this->load->view('peserta/layouts/footer', null, true); ?>
<?php if (validation_errors() != null) : ?>
   <script>
      $('#exampleModal<?= $this->input->get('cabor', true); ?>').modal('show');
   </script>
<?php endif; ?>
<?= $this->load->view('peserta/layouts/html_close', null, true); ?>