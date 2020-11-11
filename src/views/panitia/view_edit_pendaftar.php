<div class="content-wrapper" style="min-height: 504px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Peserta Kontingen Terdaftar</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- TABLE: LATEST ORDERS -->
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="container">
                                <div class="col-md-6">
                                    <?= $this->session->flashdata('message'); ?>
                                    <?= form_open('panitia/edit-pendaftar/sunting?id=' . $this->input->get('id', TRUE), ['class' => "register-form",  'id' => "login-form"]); ?>
                                    <label>Data Akun</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" disabled placeholder="Alamat Email" value="<?= $pendaftar->email; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        <span class="error invalid-feedback"><?= form_error('email'); ?></span>
                                    </div>
                                    <label>Data Penanggung Jawab</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control <?= (form_error('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= (set_value('nama_lengkap')) ? set_value('nama_lengkap') : $pendaftar->nama_lengkap; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        <span class="error invalid-feedback"><?= form_error('nama_lengkap'); ?></span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control <?= (form_error('nama_panggilan')) ? 'is-invalid' : ''; ?>" id="nama_panggilan" name="nama_panggilan" placeholder="Nama Panggilan" value="<?= (set_value('nama_panggilan')) ? set_value('nama_panggilan') : $pendaftar->nama_panggilan; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user-circle"></span>
                                            </div>
                                        </div>
                                        <span class="error invalid-feedback"><?= form_error('nama_panggilan'); ?></span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <select class="form-control select2 <?= (form_error('universitas')) ? 'is-invalid' : ''; ?>" id="universitas" name="universitas" onchange="changeFunc()">
                                            <option <?= (set_value('universitas')) ? '' : 'selected'; ?> disabled>Asal Perguruan Tinggi</option>
                                            <?php foreach ($ref_universitas as $universitas) {
                                            ?>
                                                <option value="<?= $universitas->id; ?>" <?= ($pendaftar->id_universitas == $universitas->id) ? 'selected' : ''; ?>><?= $universitas->nama_universitas; ?></option>
                                            <?php
                                            }; ?>
                                            <option value="X" <?= (set_value('universitas') == 'X') ? 'selected' : ''; ?>>Lainnya...</option>
                                        </select>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-university"></span>
                                            </div>
                                        </div>
                                        <span class="error invalid-feedback"><?= form_error('universitas'); ?></span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control <?= (form_error('npm')) ? 'is-invalid' : ''; ?>" id="npm" name="npm" placeholder="Nomor Induk Mahasiswa" value="<?= (set_value('npm')) ? set_value('npm') : $pendaftar->npm; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-id-card"></span>
                                            </div>
                                        </div>
                                        <span class="error invalid-feedback"><?= form_error('npm'); ?></span>
                                    </div>
                                    <label>Informasi Kontak</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control <?= (form_error('whatsapp')) ? 'is-invalid' : ''; ?>" id="whatsapp" name="whatsapp" placeholder="No. WhatsApp" value="<?= (set_value('whatsapp')) ? set_value('whatsapp') : $pendaftar->whatsapp; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fab fa-whatsapp"></span>
                                            </div>
                                        </div>
                                        <span class="error invalid-feedback"><?= form_error('whatsapp'); ?></span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control <?= (form_error('line')) ? 'is-invalid' : ''; ?>" id="line" name="line" placeholder="ID Line" value="<?= (set_value('line')) ? set_value('line') : $pendaftar->line; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fab fa-line"></span>
                                            </div>
                                        </div>
                                        <span class="error invalid-feedback"><?= form_error('line'); ?></span>
                                    </div>
                                    <label>Udah Bener nih??</label>
                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox <?= (form_error('terms')) ? 'is-invalid' : ''; ?>">
                                            <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" aria-describedby="terms-error" aria-invalid="true">
                                            <label class="custom-control-label" for="exampleCheck1">Sudah benar xixixi</label>
                                        </div>
                                        <span id="terms-error" class="error invalid-feedback" style="display: inline;"><?= form_error('terms'); ?></span>
                                    </div>
                                    <!-- /.col -->
                                    <div class="input-group mb-3">
                                        <button type="submit" class="btn btn-warning btn-block">Sunting</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>