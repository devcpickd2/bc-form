<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">
        Detail Verifikasi Pembuatan Larutan Cleaning dan Sanitasi
    </h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('larutan'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Pembuatan Larutan Cleaning dan Sanitasi
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-5 rounded">
        <div class="card-body">
            <div class="table-responsive">
                <?php $datetime = (new DateTime($larutan->date))->format('d-m-Y'); ?>
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th colspan="8" class="text-center font-weight-bold">PEMBUATAN LARUTAN CLEANING DAN SANITASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td colspan="3"><?= $datetime; ?></td>
                            <td><strong>Shift</strong></td>
                            <td colspan="3"><?= $larutan->shift; ?></td>
                        </tr>

                        <tr class="bg-light text-center">
                            <th>Nama Bahan</th>
                            <th>Kadar</th>
                            <th>Kimia (ml)</th>
                            <th>Air (ml)</th>
                            <th>Volume</th>
                            <th>Kebutuhan</th>
                            <th>Keterangan</th>
                            <th>Tindakan & Verifikasi</th>
                        </tr>

                        <?php foreach (json_decode($larutan->nama_bahan, true) as $row): ?>
                            <tr class="text-center">
                                <td><?= $row['bahan'] ?></td>
                                <td><?= $row['kadar'] ?></td>
                                <td><?= $row['bahan_kimia'] ?></td>
                                <td><?= $row['air_bersih'] ?></td>
                                <td><?= $row['volume_akhir'] ?></td>
                                <td><?= $row['kebutuhan'] ?></td>
                                <td><?= $row['keterangan'] ?></td>
                                <td class="text-left">
                                    <?= !empty($row['tindakan']) ? '<strong>T:</strong> ' . $row['tindakan'] . '<br>' : '' ?>
                                    <?= !empty($row['verifikasi']) ? '<strong>V:</strong> ' . $row['verifikasi'] : '' ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td><strong>Catatan</strong></td>
                            <td colspan="7"><?= !empty($larutan->catatan) ? $larutan->catatan : 'Tidak ada'; ?></td>
                        </tr>

                        <tr class="table-primary text-center">
                            <th colspan="8">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><strong>QC</strong></td>
                            <td colspan="7"><?= $larutan->username; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Produksi</strong></td>
                            <td colspan="7"><?= $larutan->nama_produksi; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status Supervisor</strong></td>
                            <td colspan="7">
                                <?php
                                switch ($larutan->status_spv) {
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
                            <td colspan="7"><?= !empty($larutan->catatan_spv) ? $larutan->catatan_spv : 'Tidak ada'; ?></td>
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
