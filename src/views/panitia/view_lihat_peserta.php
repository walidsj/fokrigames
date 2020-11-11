<div class="content-wrapper" style="min-height: 504px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Lihat Kontingen</h1>
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
                            <table class="table">
                                <tr>
                                    <td class="font-weight-bold">Nama Penanggung Jawab</td>
                                    <td><?= $pendaftar->nama_lengkap; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Asal Universitas</td>
                                    <td><?= $pendaftar->nama_universitas; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">No. WhatsApp</td>
                                    <td><?= $pendaftar->whatsapp; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jumlah Kontingen</td>
                                    <td><?= $pendaftar->jumlah_peserta; ?> orang</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Status</td>
                                    <td><?= ($pendaftar->fg_status > 0) ? '<span class="badge badge-success">Sudah Difinalisasi</span>' : '<span class="badge badge-warning">Belum Difinalisasi</span>'; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped datatables">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Lengkap</th>
                                                <th>Mata Lomba</th>
                                                <th>NIM</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Foto</th>
                                                <th>KTM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($peserta['data'] as $serta) { ?>
                                                <td></td>
                                                <td><?= $serta->nama_peserta; ?></td>
                                                <td><?= $serta->nama_cabor; ?></td>
                                                <td><?= $serta->npm; ?></td>
                                                <td><?= ($serta->fg_kelamin == 1) ? 'Ikhwan' : 'Akhwat'; ?></td>
                                                <td><img height="200" width="150" src="<?= base_url(); ?>public/uploads/foto_peserta/<?= $serta->foto; ?>"></td>
                                                <td><a href="<?= base_url(); ?>public/uploads/scan_ktm/<?= $serta->scan_ktm; ?>">Download</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>