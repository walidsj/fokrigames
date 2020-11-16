<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dasbor Panitia</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="small-box bg-info p-2">
                                <div class="inner">
                                    <h3><?= count($pendaftar['data']); ?></h3>
                                    <h6 class="mb-0"><b><?= count($pendaftar['finalisasi']); ?></b> Sudah Finalisasi</h6>
                                    <hr class="border-white m-0">
                                    <h6><b><?= (count($pendaftar['data']) - count($pendaftar['finalisasi'])); ?></b> Belum Finalisasi</h6>
                                    <b>Kontingen Lomba</b>
                                </div>
                                <div class=" icon">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="small-box bg-warning p-2">
                                <div class="inner text-white">
                                    <h3><?= count($peserta['data']); ?></h3>
                                    <h6 class="mb-0"><b><?= count($peserta['finalisasi']); ?></b> Sudah Finalisasi</h6>
                                    <hr class="border-white m-0">
                                    <h6><b><?= (count($peserta['data']) - count($peserta['finalisasi'])); ?></b> Belum Finalisasi</h6>
                                    <b>Peserta Lomba</b>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Token Aktif</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>No. WhatsApp</th>
                                                <th>Universitas</th>
                                                <th>Waktu</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($token as $t) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $t->whatsapp; ?><br>
                                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= preg_replace('/^0?/', '62', $t->whatsapp); ?>&text=*TAUTAN%20PENDAFTARAN*%0A%0ALink%3A%20%0A%60%60%60<?= urlencode(site_url('paspor/reg?no=' . $t->whatsapp . '&token=' . urlencode($t->token))); ?>%60%60%60%0A%0A%60%60%60*Tautan%20ini%20berisi%20token%20pendaftaran%20dan%20bersifat%20rahasia.*%60%60%60" class="badge badge-success">Kirim ke Peserta</a>
                                                    </td>
                                                    <td><?= $t->nama_universitas; ?></td>
                                                    <td><?= unix_to_human($t->waktu); ?></td>
                                                    <td><a href="<?= site_url(); ?>panitia?no=<?= $t->whatsapp; ?>&hapus=yes" onclick="return confirm('Yakin mau hapus token <?= $t->whatsapp; ?>?')" class="badge badge-danger">Hapus</a></td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Generate Token</h3>
                                </div>
                                <?= form_open(current_url()); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="whatsapp">No. WhatsApp</label>
                                        <input id="whatsapp" type="number" class="form-control" name="whatsapp" placeholder="083879101232">
                                        <small class="text-danger"><?= form_error('whatsapp'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="ptk">Asal Universitas</label>
                                        <select id="ptk" name="id_universitas" class="form-control select2bs4" style="width: 100%;">
                                            <option selected>Pilih Universitas</option>
                                            <?php foreach ($universitas as $univ) : ?>
                                                <option value="<?= $univ->id; ?>"><?= $univ->nama_universitas; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_universitas'); ?></small>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-lg btn-primary">Buat Token</button>
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