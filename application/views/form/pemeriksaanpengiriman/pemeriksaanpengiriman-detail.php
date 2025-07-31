<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pemeriksaanpengiriman'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                $datetime = new DateTime($pemeriksaanpengiriman->date);
                $datetime = $datetime->format('d-m-Y');
                $timing = new DateTime($pemeriksaanpengiriman->jam_datang);
                $timing = $timing->format('H:i');
                ?>
                <table class="table table-bordered" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="font-weight-bold">PEMERIKSAAN PENGIRIMAN RM, SEASONING, KEMASAN DAN CHEMICAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3"><b>Tanggal</b></td>
                            <td colspan="6"><?= $datetime; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Nama Supplier</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->nama_supplier; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Nama Barang</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->nama_barang; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Jenis Mobil Pengangkut</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->jenis_mobil; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>No. Polisi</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->no_polisi; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Identitas Pengirim</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->identitas_pengantar; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="9">KONDISI MOBIL</th>
                        </tr>
                        <tr class="text-center">
                            <td><b>Segel</b></td>
                            <td><b>Kebersihan</b></td>
                            <td><b>Bocor</b></td>
                            <td><b>Hama</b></td>
                            <td colspan="5"><b>Jam Datang</b></td>
                        </tr>
                        <tr class="text-center">
                            <td><?= icon_check($pemeriksaanpengiriman->segel); ?></td>
                            <td><?= icon_check($pemeriksaanpengiriman->kebersihan); ?></td>
                            <td><?= icon_check($pemeriksaanpengiriman->bocor); ?></td>
                            <td><?= icon_check($pemeriksaanpengiriman->hama); ?></td>
                            <td colspan="5"><?= $timing; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Keterangan</b></td>
                            <td colspan="6"><?= !empty($pemeriksaanpengiriman->keterangan) ? $pemeriksaanpengiriman->keterangan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="9">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td colspan="3"><b>QC</b></td>
                            <td colspan="6"><?= $pemeriksaanpengiriman->username; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Disetujui Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                if ($pemeriksaanpengiriman->status_spv == 0) {
                                    echo '<span class="text-secondary font-weight-bold">Created</span>';
                                } elseif ($pemeriksaanpengiriman->status_spv == 1) {
                                    echo '<span class="text-success font-weight-bold">Verified</span>';
                                } elseif ($pemeriksaanpengiriman->status_spv == 2) {
                                    echo '<span class="text-danger font-weight-bold">Revision</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($pemeriksaanpengiriman->catatan_spv) ? $pemeriksaanpengiriman->catatan_spv : 'Tidak ada'; ?></td>
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
        border-radius: 0.25rem;
    }
    .breadcrumb .breadcrumb-item a {
        color: #fff;
        font-weight: 500;
    }

    .table {
        font-size: 15px;
        width: 100%;
    }

    .table td, .table th {
        padding: 10px 12px;
        vertical-align: middle;
        word-break: break-word;
    }

    @media (max-width: 768px) {
        .table td, .table th {
            font-size: 14px;
        }

        h1.h3 {
            font-size: 20px;
        }
    }
</style>

<?php
function icon_check($value) {
    if ($value == 'ok') return '✔️';
    if ($value == 'tidak ok') return '❌';
    return '−';
}
?>
