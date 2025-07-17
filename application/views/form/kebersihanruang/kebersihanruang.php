<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Kebersihan Ruang Produksi</h1>
    </div>

    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-times"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group text-right">
                <a href="<?= base_url('kebersihanruang/tambah') ?>" class="btn btn-md btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Tanggal / Shift</th>
                            <th>Lokasi</th>
                            <th class="text-center">Hasil Pemeriksaan</th>
                            <th>Produksi</th>
                            <th>Supervisor</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($kebersihanruang as $val) {
                            $tanggalFormatted = (new DateTime($val->date))->format('d-m-Y');
                            $details = json_decode($val->detail, true);
                            $kondisiMap = [
                                '0' => 'Bersih',
                                '1' => 'Berdebu',
                                '2' => 'Basah',
                                '3' => 'Pecah/Retak',
                                '4' => 'Sisa produksi (terigu/produk)',
                                '5' => 'Noda (tinta, karat)',
                                '6' => 'Pertumbuhan mikroorganisme (jamur/bau busuk)',
                            ];
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $tanggalFormatted . " / " . $val->shift; ?></td>
                                <td><?= htmlspecialchars($val->lokasi); ?></td>
                                <td>
                                    <table class="table table-sm table-bordered mb-0">
                                        <thead style="background-color:#2E86C1; color:black; text-align:center;">
                                            <tr>
                                                <th>No</th>
                                                <th>Bagian</th>
                                                <th>Kondisi</th>
                                                <th>Problem</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($details) && is_array($details)): ?>
                                            <?php foreach ($details as $i => $row): ?>
                                                <tr>
                                                    <td style="text-align:center;"><?= $i + 1; ?></td>
                                                    <td><?= htmlspecialchars($row['bagian']); ?></td>
                                                    <td style="text-align:center;">
                                                        <?= $kondisiMap[$row['kondisi']] ?? htmlspecialchars($row['kondisi']); ?>
                                                    </td>
                                                    <td><?= !empty($row['problem']) ? htmlspecialchars($row['problem']) : '-'; ?></td>
                                                    <td><?= !empty($row['tindakan']) ? htmlspecialchars($row['tindakan']) : '-'; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr><td colspan="5" class="text-center">Tidak ada data detail</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </td>
                            <td class="text-center">
                                <?php
                                echo match($val->status_produksi) {
                                    0 => '<span style="color:#99a3a4;font-weight:bold;">Created</span>',
                                    1 => '<span style="color:#28b463;font-weight:bold;">Checked</span>',
                                    2 => '<span style="color:red;font-weight:bold;">Re-Check</span>',
                                    default => '-'
                                };
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                echo match($val->status_spv) {
                                    0 => '<span style="color:#99a3a4;font-weight:bold;">Created</span>',
                                    1 => '<span style="color:#28b463;font-weight:bold;">Verified</span>',
                                    2 => '<span style="color:red;font-weight:bold;">Revision</span>',
                                    default => '-'
                                };
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('kebersihanruang/edit/' . $val->uuid); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('kebersihanruang/detail/' . $val->uuid); ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                <a href="<?= base_url('kebersihanruang/delete/' . $val->uuid); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>
</div>
<style> 
    th {
        background-color: #f8f9fc;
    }
</style>
