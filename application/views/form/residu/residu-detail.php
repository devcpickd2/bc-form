<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Verifikasi Residu Klorin</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('residu'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Residu Klorin
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $datetime = (new DateTime($residu->date))->format('d-m-Y'); ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">VERIFIKASI RESIDU KLORIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td colspan="6"><?= $datetime; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Area</strong></td>
                            <td colspan="6"><?= $residu->area; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Titik Sampling</strong></td>
                            <td colspan="6"><?= $residu->titik_sampling; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Standar</strong></td>
                            <td colspan="6"><?= $residu->standar; ?> PPM</td>
                        </tr>
                        <tr>
                            <td><strong>Hasil Pemeriksaan</strong></td>
                            <td colspan="6"><?= $residu->hasil_pemeriksaan; ?> PPM</td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td colspan="6"><?= $residu->keterangan; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tindakan Koreksi</strong></td>
                            <td colspan="6"><?= $residu->tindakan; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Verifikasi</strong></td>
                            <td colspan="6"><?= $residu->verifikasi; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Catatan</strong></td>
                            <td colspan="6"><?= !empty($residu->catatan) ? $residu->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><strong>QC</strong></td>
                            <td colspan="6"><?= $residu->username; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td colspan="6">
                                <?php
                                if ($residu->status_spv == 0) {
                                    echo '<span class="text-secondary font-weight-bold">Created</span>';
                                } elseif ($residu->status_spv == 1) {
                                    echo '<span class="text-success font-weight-bold">Verified</span>';
                                } elseif ($residu->status_spv == 2) {
                                    echo '<span class="text-danger font-weight-bold">Revision</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Catatan Supervisor</strong></td>
                            <td colspan="6"><?= !empty($residu->catatan_spv) ? $residu->catatan_spv : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- CSS -->
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
