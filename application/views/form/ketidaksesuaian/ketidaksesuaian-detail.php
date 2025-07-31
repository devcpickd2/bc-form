<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Ketidaksesuaian Produk</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('ketidaksesuaian'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Proses Ketidaksesuaian
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <?php 
                    $datetime = new DateTime($ketidaksesuaian->date);
                    $formattedDate = $datetime->format('d-m-Y');
                    $formattedTime = date('H:i', strtotime($ketidaksesuaian->waktu));
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="text-center font-weight-bold">KETIDAKSESUAIAN PRODUK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $formattedDate; ?></td>
                            <td colspan="2"><b>Shift:</b> <?= $ketidaksesuaian->shift; ?></td>
                            <td colspan="3"><b>Pukul:</b> <?= $formattedTime; ?></td>
                        </tr>
                        <tr class="bg-light text-center">
                            <td colspan="7" class="font-weight-bold">Hasil Pemeriksaan</td>
                        </tr>
                        <tr>
                            <td><b>Nama Produk</b></td>
                            <td colspan="6"><?= $ketidaksesuaian->nama_produk; ?></td>
                        </tr>
                        <tr>
                            <td><b>Uraian Ketidaksesuaian</b></td>
                            <td colspan="6"><?= $ketidaksesuaian->ketidaksesuaian; ?></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah</b></td>
                            <td colspan="6"><?= $ketidaksesuaian->jumlah; ?></td>
                        </tr>
                        <tr>
                            <td><b>Analisis Penyebab / Kategori Bahaya</b></td>
                            <td colspan="6"><?= $ketidaksesuaian->penyebab; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tindakan / Disposisi</b></td>
                            <td colspan="6"><?= $ketidaksesuaian->tindakan; ?></td>
                        </tr>
                        <tr>
                            <td><b>Verifikasi</b></td>
                            <td colspan="6"><?= $ketidaksesuaian->verifikasi; ?></td>
                        </tr>
                        <tr>
                            <td><b>Catatan</b></td>
                            <td colspan="6"><?= !empty($ketidaksesuaian->catatan) ? $ketidaksesuaian->catatan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $ketidaksesuaian->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Produksi</b></td>
                            <td colspan="6"><?= $ketidaksesuaian->nama_produksi; ?></td>
                        </tr>
                        <tr>
                            <td><b>Disetujui Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                switch ($ketidaksesuaian->status_spv) {
                                    case 1:
                                    echo '<span class="badge badge-success font-weight-bold">Verified</span>';
                                    break;
                                    case 2:
                                    echo '<span class="badge badge-danger font-weight-bold">Revision</span>';
                                    break;
                                    default:
                                    echo '<span class="badge badge-secondary font-weight-bold">Created</span>';
                                    break;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($ketidaksesuaian->catatan_spv) ? $ketidaksesuaian->catatan_spv : 'Tidak ada'; ?></td>
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
