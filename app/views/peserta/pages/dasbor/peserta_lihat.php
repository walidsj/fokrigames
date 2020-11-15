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
            <div class="row">
               <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title mb-2">Lihat Peserta</h3>
                        <a href="<?= site_url(); ?>peserta" class="btn btn-sm btn-primary">Daftar Peserta</a>
                     </div>
                     <div class="card-body box-profile">
                        <div class="text-center">
                           <img class="profile-user-img img-fluid" src="<?= base_url(); ?>public/uploads/foto_peserta/<?= $peserta->foto; ?>" alt="<?= $peserta->nama_peserta; ?>" style="width: 200px">
                        </div>

                        <h3 class="profile-username text-center mt-3"><strong><?= $peserta->nama_peserta; ?></strong></h3>

                        <p class="text-muted text-center"><?= $peserta->nama_universitas; ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                           <li class="list-group-item">
                              <b>Penanggung Jawab</b> <a class="float-right"><?= $peserta->nama_pendaftar; ?></a>
                           </li>
                           <li class="list-group-item">
                              <b>Cabang Lomba</b> <a class="float-right"><?= $peserta->nama_cabor; ?></a>
                           </li>
                           <li class="list-group-item">
                              <b>Nomor Induk Mahasiswa</b> <a class="float-right"><?= $peserta->npm; ?></a>
                           </li>
                           <li class="list-group-item">
                              <b>Scan KTM</b> <a href="<?= base_url(); ?>public/uploads/scan_ktm/<?= $peserta->scan_ktm; ?>" class="float-right"><svg width="1em" height="1em" viewBox="0 0 16 16" class="mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                 </svg>Lihat Berkas</a>
                           </li>
                           <li class="list-group-item">
                              <b>No. WhatsApp</b> <a class="float-right"><?= $peserta->whatsapp_peserta; ?></a>
                           </li>
                           <li class="list-group-item">
                              <b>Jenis Kelamin</b> <a class="float-right"><?= ($peserta->fg_kelamin == 1) ? 'Ikhwan' : 'Akhwat'; ?></a>
                           </li>
                        </ul>

                        <?php if ($pendaftar->fg_status < 1) { ?>
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                              Hapus Peserta
                           </button>
                        <?php }; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <?= $this->load->view('peserta/components/footer', null, true); ?>

      </div>
   </div>
</div>

<?php if ($pendaftar->fg_status < 1) { ?>
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Hapus Data Peserta?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
               <a href="<?= site_url(); ?>peserta/hapus?id=<?= $this->input->get('id', TRUE); ?>" class="btn btn-danger"><b>Hapus</b></a>
            </div>
         </div>
      </div>
   </div>
<?php }; ?>

<?= $this->load->view('peserta/layouts/footer', null, true); ?>
<?php if (validation_errors() != null) : ?>
   <script>
      $('#exampleModal').modal('show');
   </script>
<?php endif; ?>
<?= $this->load->view('peserta/layouts/html_close', null, true); ?>