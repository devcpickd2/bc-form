<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-center font-weight-bold">
        Detail Reagen Bulan <?= date('F', mktime(0,0,0,$bulan,1)) ?> <?= $tahun ?>
    </h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Larutan</th>
                            <th>No Lot</th>
                            <th>Best Before</th>
                            <th>Status SPV</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($reagen)): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Tidak ada data
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php $no=1; foreach ($reagen as $row): ?>
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
                            <td class="text-center">
                                <a href="<?= base_url('reagen/edit/'.$row->uuid) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('reagen/delete/'.$row->uuid) ?>"
                                 class="btn btn-danger btn-sm"
                                 onclick="return confirm('Yakin hapus data?')">
                                 Hapus
                             </a>
                         </td>
                     </tr>
                 <?php endforeach ?>
             </tbody>
         </table>

         <a href="<?= base_url('reagen') ?>" class="btn btn-secondary mt-3">
            ← Kembali
        </a>
    </div>
</div>
</div>
</div>
</div>
