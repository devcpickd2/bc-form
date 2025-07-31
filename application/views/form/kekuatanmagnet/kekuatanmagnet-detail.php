<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Kekuatan Magnet Trap</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('kekuatanmagnet'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Kekuatan Magnet Trap
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $datetime = new DateTime($kekuatanmagnet->date); ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">PEMERIKSAAN KEKUATAN MAGNET TRAP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $datetime->format('d-m-Y'); ?></td>
                            <td colspan="5"></td>
                        </tr>
                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Hasil Pemeriksaan</td>
                        </tr>
                        <tr>
                            <td><b>Nama Alat</b></td>
                            <td colspan="6"><?= $kekuatanmagnet->nama_alat; ?></td>
                        </tr>
                        <tr>
                            <td><b>Nilai Pengukuran</b></td>
                            <td colspan="6"><?= $kekuatanmagnet->nilai; ?></td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td colspan="6"><?= $kekuatanmagnet->keterangan; ?></td>
                        </tr>
                        <tr class="bg-light">
                            <td><b>Catatan</b></td>
                            <td colspan="6"><?= !empty($kekuatanmagnet->catatan) ? $kekuatanmagnet->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $kekuatanmagnet->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= !empty($kekuatanmagnet->nama_produksi) ? $kekuatanmagnet->nama_produksi : 'Belum dikoreksi'; ?></td>
                        </tr>
                        <tr>
                            <td><b>Status Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                switch ($kekuatanmagnet->status_spv) {
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
                            <td colspan="6"><?= !empty($kekuatanmagnet->catatan_spv) ? $kekuatanmagnet->catatan_spv : 'Tidak ada'; ?></td>
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
