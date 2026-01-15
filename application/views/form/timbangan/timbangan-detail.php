<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Timbangan</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('timbangan'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Timbangan
                </a>
            </li>
        </ol>
    </nav>

    <!-- Card Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <?php 
                    $datetime = new DateTime($timbangan->date);
                    $formattedDate = $datetime->format('d-m-Y');
                    $result = json_decode($timbangan->peneraan_hasil, true);
                    if (!is_array($result)) $result = [];
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">PEMERIKSAAN TIMBANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal: </b> <?= $formattedDate; ?></td>
                            <td colspan="5"><b>Shift: </b><?= $timbangan->shift; ?></td>
                        </tr>

                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Daftar Hasil Pemeriksaan</td>
                        </tr>

                        <tr class="table-primary text-center">
                            <!-- <th>No</th> -->
                            <th>Kode Thermometer</th>
                            <th>Kapasitas</th>
                            <th>Model</th>
                            <th>Lokasi</th>
                            <th>Waktu</th>
                            <th>Standar Suhu (°C)</th>
                            <th>Hasil</th>
                        </tr>

                        <?php 
                        // $no = 1; 
                        foreach ($result as $row): ?>
                            <tr class="text-center">
                                <!-- <td><?= $no++ ?></td> -->
                                <td><?= htmlspecialchars($row['kode_timbangan'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['kapasitas'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['model'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['lokasi'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['pukul'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['peneraan_standar'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['hasil'] ?? '-') ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">VERIFIKASI</td>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $timbangan->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Disetujui Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                if ($timbangan->status_spv == 0) {
                                    echo '<span class="text-secondary font-weight-bold">Created</span>';
                                } elseif ($timbangan->status_spv == 1) {
                                    echo '<span class="text-success font-weight-bold">Verified</span>';
                                } elseif ($timbangan->status_spv == 2) {
                                    echo '<span class="text-danger font-weight-bold">Revision</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($timbangan->catatan_spv) ? $timbangan->catatan_spv : 'Tidak ada'; ?></td>
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
