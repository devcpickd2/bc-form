<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Laporan Sensori Finish Good</h1>
    </div>

    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div><br>
    <?php endif ?>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-times"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div><br>
    <?php endif ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th style="text-align: center;">Sensori Produk</th>
                            <th>Tindakan Koreksi</th>
                            <th>Last Updated</th>
                            <th>Last Verified</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($sensori as $val):
                            $tanggalFormatted = (new DateTime($val->date))->format('d-m-Y');
                            $products = json_decode($val->produk, true);
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $tanggalFormatted; ?></td>
                            <td><?= htmlspecialchars($val->nama_produk); ?></td>
                            <td>
                                <table class="table table-sm table-bordered mb-0">
                                    <thead style="background-color: #2E86C1; color: black; text-align: center;">
                                        <tr>
                                            <th>Kode Produksi</th>
                                            <th>Best Before</th>
                                            <th>Warna</th>
                                            <th>Tekstur</th>
                                            <th>Rasa</th>
                                            <th>Aroma</th>
                                            <th>Kenampakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($products)): ?>
                                            <?php foreach ($products as $p): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($p['kode_produksi'] ?? '-'); ?></td>
                                                    <td><?= htmlspecialchars($p['best_before'] ?? '-'); ?></td>
                                                    <td><?= htmlspecialchars($p['warna'] ?? '-'); ?></td>
                                                    <td><?= htmlspecialchars($p['tekstur'] ?? '-'); ?></td>
                                                    <td><?= htmlspecialchars($p['rasa'] ?? '-'); ?></td>
                                                    <td><?= htmlspecialchars($p['aroma'] ?? '-'); ?></td>
                                                    <td><?= htmlspecialchars($p['kenampakan'] ?? '-'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr><td colspan="7" class="text-center">Tidak ada data sensori</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </td>
                            <td><?= htmlspecialchars($val->tindakan); ?></td>
                            <td><?= !empty($val->modified_at) ? date('H:i - d/m/Y', strtotime($val->modified_at)) : '-'; ?></td>
                            <td><?= !empty($val->tgl_update_produksi) ? date('H:i - d/m/Y', strtotime($val->tgl_update_produksi)) : '-'; ?></td>
                            <td class="text-center">
                                <?php
                                if ($val->status_produksi == 0) {
                                    echo '<span class="text-secondary font-weight-bold">Created</span>';
                                } elseif ($val->status_produksi == 1) {
                                    echo '<span class="text-success font-weight-bold">Checked</span>';
                                } elseif ($val->status_produksi == 2) {
                                    echo '<span class="text-danger font-weight-bold">Re-Check</span>';
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('sensori/statusprod/' . $val->uuid); ?>" class="btn btn-warning btn-sm mb-1">
                                    <i class="fas fa-check"></i> Verifikasi
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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
    td div {
        padding: 4px 0;
    }
    .table-sm th, .table-sm td {
        font-size: 0.85rem;
    }
</style>
