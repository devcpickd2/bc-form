<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 font-weight-bold text-center">Detail Verifikasi Penggunaan Reagen Klorin</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('reagen'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Penggunaan Reagen Klorin
                </a>
            </li>
        </ol>
    </nav>

    <!-- Detail Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                    $tanggal = (new DateTime($reagen->date))->format('d-m-Y');
                    $best_before = (new DateTime($reagen->best_before))->format('d-m-Y');
                    $tgl_buka = (new DateTime($reagen->tgl_buka_botol))->format('d-m-Y');
                ?>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">VERIFIKASI PENGGUNAAN REAGEN KLORIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td colspan="6"><?= $tanggal; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Larutan</strong></td>
                            <td colspan="6"><?= $reagen->nama_larutan; ?></td>
                        </tr>
                        <tr>
                            <td><strong>No. Lot</strong></td>
                            <td colspan="6"><?= $reagen->no_lot; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Best Before</strong></td>
                            <td colspan="6"><?= $best_before; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Buka Botol</strong></td>
                            <td colspan="6"><?= $tgl_buka; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Volume Penggunaan</strong></td>
                            <td colspan="6"><?= $reagen->volume_penggunaan; ?> mL</td>
                        </tr>
                        <tr>
                            <td><strong>Volume Akhir</strong></td>
                            <td colspan="6"><?= $reagen->volume_akhir; ?> mL</td>
                        </tr>
                        <tr>
                            <td><strong>Catatan</strong></td>
                            <td colspan="6"><?= !empty($reagen->catatan) ? $reagen->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><strong>QC</strong></td>
                            <td colspan="6"><?= $reagen->username; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status Supervisor</strong></td>
                            <td colspan="6">
                                <?php
                                    if ($reagen->status_spv == 0) {
                                        echo '<span class="text-secondary font-weight-bold">Created</span>';
                                    } elseif ($reagen->status_spv == 1) {
                                        echo '<span class="text-success font-weight-bold">Verified</span>';
                                    } elseif ($reagen->status_spv == 2) {
                                        echo '<span class="text-danger font-weight-bold">Revision</span>';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Catatan Supervisor</strong></td>
                            <td colspan="6"><?= !empty($reagen->catatan_spv) ? $reagen->catatan_spv : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- CSS dalam satu file -->
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
