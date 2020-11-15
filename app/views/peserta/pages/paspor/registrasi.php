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
                  <h4>Registrasi</h4>
                  <h6 class="font-weight-light">Silakan lengkapi data diri berikut.</h6>
                  <?= form_open(current_url() . '?no=' . $this->input->get('no') . '&token=' . $this->input->get('token'), ['class' => 'pt-3']); ?>
                  <div class="form-group mb-3">
                     <label>No. WhatsApp</label>
                     <input class="form-control" disabled value="<?= $calon->whatsapp; ?>">
                     <?= form_error('whatsapp'); ?>
                  </div>
                  <div class="form-group mb-3">
                     <label>Asal Perguruan Tinggi</label>
                     <input class="form-control" disabled value="<?= $calon->nama_universitas; ?>">
                     <?= form_error('whatsapp'); ?>
                  </div>
                  <div class="form-group mb-3">
                     <label>Alamat Email</label>
                     <input name="email" type="email" class="form-control <?= (form_error('email')) ? 'border-danger' : ''; ?>" id="email" placeholder="fullan@website.com" value="<?= set_value('email'); ?>">
                     <?= form_error('email'); ?>
                  </div>
                  <div class="form-group">
                     <label>PIN Keamanan</label>
                     <input name="password" type="password" class="form-control <?= (form_error('password')) ? 'border-danger' : ''; ?>" id="password" placeholder="Password" value="<?= set_value('password'); ?>">
                     <?= form_error('password'); ?>
                  </div>
                  <div class="form-group mb-3">
                     <label>Nama Lengkap</label>
                     <input name="nama_lengkap" type="text" class="form-control <?= (form_error('nama_lengkap')) ? 'border-danger' : ''; ?>" id="nama_lengkap" placeholder="Fullan bin Fullan" value="<?= set_value('nama_lengkap'); ?>">
                     <?= form_error('nama_lengkap'); ?>
                  </div>
                  <div class="form-group mb-3">
                     <label>No. Induk Mahasiswa</label>
                     <input name="npm" type="text" class="form-control <?= (form_error('npm')) ? 'border-danger' : ''; ?>" id="npm" placeholder="2302180109" value="<?= set_value('npm'); ?>">
                     <?= form_error('npm'); ?>
                  </div>
                  <div class="mt-3">
                     <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Simpan Data</button>
                  </div>
                  <?= form_close(); ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?= $this->load->view('peserta/layouts/html_close', null, true); ?>