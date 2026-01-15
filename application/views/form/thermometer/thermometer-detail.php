<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Peneraan Thermometer</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('thermometer'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Peneraan Thermometer
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <?php 
                    $datetime = new DateTime($thermometer->date);
                    $formattedDate = $datetime->format('d-m-Y');
                    $result = json_decode($thermometer->peneraan_hasil, true);
                    if (!is_array($result)) $result = [];
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">PENERAAN THERMOMETER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal: </b> <?= $formattedDate; ?></td>
                            <td colspan="5"><b>Shift: </b><?= $thermometer->shift; ?></td>
                        </tr>

                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Daftar Hasil Pemeriksaan</td>
                        </tr>

                        <tr class="table-primary text-center">
                            <th>No</th>
                            <th>Kode Thermometer</th>
                            <th>Model</th>
                            <th>Area</th>
                            <th>Waktu</th>
                            <th>Standar Suhu (°C)</th>
                            <th>Hasil</th>
                        </tr>

                        <?php 
                        $no = 1; 
                        foreach ($result as $row): ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['kode_thermo'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['model'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['area'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['pukul'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['standar'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['hasil'] ?? '-') ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td><b>Tindakan Perbaikan</b></td>
                            <td colspan="6"><?= !empty($thermometer->tindakan_perbaikan) ? $thermometer->tindakan_perbaikan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td colspan="6"><?= !empty($thermometer->keterangan) ? $thermometer->keterangan : 'Tidak ada'; ?></td>
                        </tr>

                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $thermometer->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= $thermometer->nama_produksi; ?></td>
                        </tr>
                        <tr>
                            <td><b>Status Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                switch ($thermometer->status_spv) {
                                    case 1:
                                    echo '<span class="text-success font-weight-bold">Verified</span>';
                                    break;
                                    case 2:
                                    echo '<span class="text-danger font-weight-bold">Revision</span>';
                                    break;
                                    default:
                                    echo '<span class="text-secondary font-weight-bold">Created</span>';
                                    break;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($thermometer->catatan_spv) ? $thermometer->catatan_spv : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- STYLE -->
<style>
    .breadcrumb {
        background-color: #2E86C1;
        padding: 8px 16px;
        border-radius: 0.25rem;
    }

    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .breadcrumb .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    .table {
        width: 100%;
        font-size: 15px;
    }

    .table td, .table th {
        padding: 10px 12px;
        vertical-align: middle;
        word-break: break-word;
    }

    @media (max-width: 768px) {
        .table td, .table th {
            font-size: 14px;
            padding: 8px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
