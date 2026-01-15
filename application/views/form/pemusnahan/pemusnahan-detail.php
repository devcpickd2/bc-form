<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Data Pemusnahan Barang / Produk</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pemusnahan'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Data Pemusnahan Barang / Produk
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <?php 
                    $datetime = new DateTime($pemusnahan->date);
                    $formattedDate = $datetime->format('d-m-Y');

                    $bb = new DateTime($pemusnahan->best_before);
                    $bestBefore = $bb->format('d-m-Y');
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">DATA PEMUSNAHAN BARANG / PRODUK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7"><b>Tanggal:</b> <?= $formattedDate; ?></td>
                        </tr>
                        <tr>
                            <td><b>Nama Produk</b></td>
                            <td colspan="6"><?= $pemusnahan->nama_produk; ?></td>
                        </tr>
                        <tr>
                            <td><b>Kode Produksi</b></td>
                            <td colspan="6"><?= $pemusnahan->kode_produksi; ?></td>
                        </tr>
                        <tr>
                            <td><b>Best Before</b></td>
                            <td colspan="6"><?= $bestBefore; ?></td>
                        </tr>
                        <tr>
                            <td><b>Analisa Masalah</b></td>
                            <td colspan="6"><?= $pemusnahan->analisa; ?></td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td colspan="6"><?= $pemusnahan->keterangan; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $pemusnahan->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Disetujui Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                if ($pemusnahan->status_spv == 0) {
                                    echo '<span class="text-secondary font-weight-bold">Created</span>';
                                } elseif ($pemusnahan->status_spv == 1) {
                                    echo '<span class="text-success font-weight-bold">Verified</span>';
                                } elseif ($pemusnahan->status_spv == 2) {
                                    echo '<span class="text-danger font-weight-bold">Revision</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($pemusnahan->catatan_spv) ? $pemusnahan->catatan_spv : 'Tidak ada'; ?></td>
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
