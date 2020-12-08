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
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Daftar Peserta Kontingen</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="container">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped datatables">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Cabang Lomba</th>
                                                <th>Nama Lengkap</th>
                                                <th>Asal Perguruan Tinggi</th>
                                                <th>Penanggung Jawab</th>
                                                <th>No. Induk Mahasiswa</th>
                                                <th>KTM</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($peserta as $serta) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $serta->nama_peserta; ?></td>
                                                    <td><?= $serta->nama_cabor; ?></td>
                                                    <td><?= $serta->nama_universitas; ?></td>
                                                    <td>
                                                        <?= $serta->nama_pendaftar; ?>
                                                        <br>
                                                        <a href="https://api.whatsapp.com/send?phone=<?= preg_replace('/^0?/', '62', $serta->whatsapp); ?>&text=Assalamu%27alaikum%20wa%20rahmatullahi%20wa%20barakatuh%2C%20Kak%20<?= $serta->nama_pendaftar; ?>." class="btn btn-xs btn-success"><i class="fab fa-whatsapp"></i> Hubungi</a>
                                                    </td>
                                                    <td><?= $serta->npm; ?></td>
                                                    <td>
                                                        <a href="<?= base_url(); ?>public/uploads/scan_ktm/<?= $serta->scan_ktm; ?>" class="btn btn-xs btn-success m-1"><i class="fas fa-download"></i> Unduh KTM</a>
                                                        <a href="<?= base_url(); ?>public/uploads/foto_peserta/<?= $serta->foto; ?>" class="btn btn-xs btn-primary m-1"><i class="fas fa-download"></i> Unduh Foto</a>
                                                    </td>
                                                    <td>
                                                        <?php if ($serta->fg_status > 0) { ?>
                                                            <span class="badge badge-pill badge-success"><i class="fas fa-check-circle"></i> Telah Difinalisasi</span>
                                                        <?php } elseif ($serta->fg_status < 1) { ?>
                                                            <span class="badge badge-pill badge-warning"><i class="fas fas fa-exclamation-circle"></i> Belum Difinalisasi</span>
                                                        <?php } ?>
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