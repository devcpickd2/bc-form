<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Detail Retain Sample Report</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-primary text-white">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('retain'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Retain Sample Report
                </a>
            </li>
        </ol>
    </nav>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <?php 
                    $tanggal = (new DateTime($retain->date))->format('d-m-Y');
                    $description_data = json_decode($retain->description, true);
                    ?>
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" colspan="6">RETAIN SAMPLE REPORT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 20%;"><strong>Tanggal</strong></td>
                            <td colspan="5"><?= $tanggal; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Plant</strong></td>
                            <td colspan="5"><?= $retain->plant; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Sample Type</strong></td>
                            <td colspan="5"><?= $retain->sample_type; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Sample Storage</strong></td>
                            <td colspan="5"><?= $retain->sample_storage; ?></td>
                        </tr>

                        <!-- Description Table -->
                        <tr class="table-secondary">
                            <th>Nama Produk</th>
                            <th>Kode Produksi</th>
                            <th>Best Before</th>
                            <th>Quantity (g)</th>
                            <th>Remarks</th>
                            <th></th>
                        </tr>

                        <?php if (!empty($description_data)) : ?>
                            <?php foreach ($description_data as $index => $item) : ?>
                                <tr>
                                    <td><?= $item['nama_produk'] ?? '-' ?></td>
                                    <td><?= $item['kode_produksi'] ?? '-' ?></td>
                                    <td><?= isset($item['best_before']) ? (new DateTime($item['best_before']))->format('d-m-Y') : '-' ?></td>
                                    <td><?= $item['quantity'] ?? '-' ?></td>
                                    <td><?= $item['remarks'] ?? '-' ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Tidak ada data deskripsi.</td>
                            </tr>
                        <?php endif; ?>

                        <!-- Catatan -->
                        <tr>
                            <td><strong>Catatan</strong></td>
                            <td colspan="5"><?= !empty($retain->catatan) ? $retain->catatan : '<em>Tidak ada</em>'; ?></td>
                        </tr>

                        <!-- Verifikasi -->
                        <tr class="table-light">
                            <th class="text-center" colspan="6">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><strong>QC</strong></td>
                            <td colspan="5"><?= $retain->username; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status Supervisor</strong></td>
                            <td colspan="5">
                                <?php
                                $status = [
                                    0 => '<span class="badge badge-secondary">Created</span>',
                                    1 => '<span class="badge badge-success">Verified</span>',
                                    2 => '<span class="badge badge-danger">Revision</span>',
                                ];
                                echo $status[$retain->status_spv] ?? '-';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Catatan Supervisor</strong></td>
                            <td colspan="5"><?= !empty($retain->catatan_spv) ? $retain->catatan_spv : '<em>Tidak ada</em>'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .breadcrumb {
        background-color: #2E86C1 !important;
        color: white;
    }

    .breadcrumb a {
        color: white !important;
        text-decoration: none;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .badge {
        font-size: 90%;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
