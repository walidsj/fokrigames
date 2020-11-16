<div class="content-wrapper" style="min-height: 504px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Penanggung Jawab</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Daftar Penanggung Jawab Kontingen</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="container">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped datatables">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Lengkap</th>
                                                <th>Asal Perguruan Tinggi</th>
                                                <th>Email</th>
                                                <th>No. Induk Mahasiswa</th>
                                                <th>WhatsApp</th>
                                                <th>Pakta</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pendaftar['data'] as $pdaftar) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $pdaftar->nama_lengkap; ?>
                                                        <br>
                                                        <a href="<?= site_url(); ?>panitia/lihat-peserta?idpendaftar=<?= $pdaftar->id; ?>" class="btn btn-xs btn-warning"><i class="fas fa-users"></i> Lihat</a>
                                                    </td>
                                                    <td><?= $pdaftar->nama_universitas; ?></td>
                                                    <td><?= $pdaftar->email; ?>
                                                        <br>
                                                        <a href="mailto:<?= $pdaftar->email; ?>" class="btn btn-xs btn-primary"><i class="fas fa-envelope"></i> Kirim Email</a>
                                                    </td>
                                                    <td><?= $pdaftar->npm; ?></td>
                                                    <td><?= $pdaftar->whatsapp; ?>
                                                        <br>
                                                        <a href="https://api.whatsapp.com/send?phone=<?= preg_replace('/^0?/', '62', $pdaftar->whatsapp); ?>&text=Assalamu%27alaikum%20wa%20rahmatullahi%20wa%20barakatuh%2C%20Kak%20<?= $pdaftar->nama_lengkap; ?>." class="btn btn-xs btn-success"><i class="fab fa-whatsapp"></i> Hubungi</a>
                                                    </td>
                                                    <td>
                                                        <?= $pdaftar->pakta; ?>
                                                        <br>
                                                        <?php if ($pdaftar->pakta) { ?>
                                                            <a href="<?= base_url(); ?>public/uploads/pakta/<?= $pdaftar->pakta; ?>" class="btn btn-xs btn-success"><i class="fas fa-download"></i> Unduh</a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-xs btn-danger text-white">Belum diunggah</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($pdaftar->fg_status > 0) { ?>
                                                            <span class="badge badge-pill badge-success"><i class="fas fa-check-circle mr-2"></i> Telah Difinalisasi</span>
                                                        <?php } elseif ($pdaftar->fg_status < 1) { ?>
                                                            <span class="badge badge-pill badge-warning"><i class="fas fas fa-exclamation-circle mr-2"></i> Belum Difinalisasi</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url(); ?>panitia/lihat-peserta?idpendaftar=<?= $pdaftar->id; ?>&deletewesewes=yes" onclick="return confirm('Yakin mau hapus data pendaftar? Data peserta lomba di kontingen ini juga bakal dihapus lhoo. GA BISA DIBATALIN!! (<?= $pdaftar->nama_lengkap; ?>)')" class="badge badge-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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