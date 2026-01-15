<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">
        Detail Reagen Bulan <?= date('F', mktime(0,0,0,$bulan,1)) ?> <?= $tahun ?>
    </h1>

    <div class="mb-3">
        <a href="<?= base_url('reagen/verifikasi') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Larutan</th>
                            <th>No Lot</th>
                            <th>Best Before</th>
                            <th>Status SPV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($reagen as $row): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= date('d-m-Y', strtotime($row->date)) ?></td>
                            <td><?= $row->nama_larutan ?></td>
                            <td><?= $row->no_lot ?></td>
                            <td><?= date('d-m-Y', strtotime($row->best_before)) ?></td>
                            <td class="text-center">
                                <?php
                                if ($row->status_spv == 0)
                                    echo '<span class="text-secondary font-weight-bold">Created</span>';
                                elseif ($row->status_spv == 1)
                                    echo '<span class="text-success font-weight-bold">Verified</span>';
                                else
                                    echo '<span class="text-danger font-weight-bold">Revision</span>';
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php if(empty($reagen)): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada data di bulan ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
