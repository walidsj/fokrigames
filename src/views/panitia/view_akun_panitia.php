<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Akun Panitia</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Panitia</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Bidang</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($akun_panitia as $akun) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $akun->nama_panitia; ?></td>
                                                    <td><?= $akun->nama_bidang; ?></td>
                                                    <td><?= $akun->email_panitia; ?></td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Akun</h3>
                                </div>
                                <?= form_open(current_url()); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_panitia">Nama Panitia</label>
                                        <input id="nama_panitia" type="text" class="form-control" name="nama_panitia" placeholder="Moh. Walid" value="<?= set_value('nama_panitia'); ?>">
                                        <small class="text-danger"><?= form_error('nama_panitia'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_panitia">Email Panitia</label>
                                        <input id="email_panitia" type="email" class="form-control" name="email_panitia" placeholder="mohwalidas@gmail.com" value="<?= set_value('email_panitia'); ?>">
                                        <small class="text-danger"><?= form_error('email_panitia'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_bidang">Bidang</label>
                                        <input id="nama_bidang" type="text" class="form-control" name="nama_bidang" placeholder="Infomed" value="<?= set_value('nama_bidang'); ?>">
                                        <small class="text-danger"><?= form_error('nama_bidang'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="password_panitia">Password</label>
                                        <input id="password_panitia" type="text" class="form-control" name="password_panitia" placeholder="12345">
                                        <small class="text-danger"><?= form_error('password_panitia'); ?></small>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-lg btn-primary">Tambah Panitia</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>