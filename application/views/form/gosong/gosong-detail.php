<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 text-center font-weight-bold">Detail Laporan Roti Gosong</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('gosong'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan gosong
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow rounded mb-5">
        <div class="card-body">
            <div class="table-responsive">
                <?php $datetime = (new DateTime($gosong->date))->format('d-m-Y'); ?>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold table-title">LAPORAN ROTI GOSONG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td colspan="3"><?= $datetime; ?></td>
                            <td><strong>Shift</strong></td>
                            <td colspan="2"><?= $gosong->shift; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Total Berat (Kg)</strong></td>
                            <td colspan="6"><?= $gosong->total_berat; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><strong>QC</strong></td>
                            <td colspan="6"><?= $gosong->username; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Produksi</strong></td>
                            <td colspan="6"><?= $gosong->nama_produksi; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status Supervisor</strong></td>
                            <td colspan="6">
                                <?php
                                switch ($gosong->status_spv) {
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
                            <td><strong>Catatan Supervisor</strong></td>
                            <td colspan="6"><?= !empty($gosong->catatan_spv) ? $gosong->catatan_spv : 'Tidak ada'; ?></td>
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
        padding: 10px 16px;
        border-radius: 0.35rem;
    }

    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .breadcrumb .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    .table {
        font-size: 15px;
        background-color: #fff;
    }

    .table th,
    .table td {
        padding: 10px 14px;
        vertical-align: middle;
        word-break: break-word;
        white-space: normal;
    }

    .table-title {
        background-color: #f8f9fa;
        font-size: 17px;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .table td,
        .table th {
            font-size: 14px;
            padding: 8px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>
