<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Chemical dari Supplier</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pemeriksaanchemical'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Chemical dari Supplier
                </a>
            </li>
        </ol>
    </nav>

    <!-- Card Content -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php 
                    $datetime = (new DateTime($pemeriksaanchemical->date))->format('d-m-Y');
                    $exp = (new DateTime($pemeriksaanchemical->expired))->format('d-m-Y');
                ?>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th colspan="7" class="font-weight-bold">PEMERIKSAAN CHEMICAL DARI SUPPLIER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $datetime; ?></td>
                            <td colspan="5"><b>Shift:</b> <?= $pemeriksaanchemical->shift; ?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Chemical</b></td>
                            <td colspan="6"><?= $pemeriksaanchemical->jenis_chemical; ?></td>
                        </tr>
                        <tr>
                            <td><b>Pemasok</b></td>
                            <td colspan="6"><?= $pemeriksaanchemical->pemasok; ?></td>
                        </tr>
                        <tr>
                            <td><b>Kode Produksi</b></td>
                            <td colspan="6"><?= $pemeriksaanchemical->kode_produksi; ?></td>
                        </tr>
                        <tr>
                            <td><b>Expired Date</b></td>
                            <td colspan="6"><?= $exp; ?></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Barang</b></td>
                            <td><b>Sampel (pcs)</b></td>
                            <td colspan="5"><b>Jumlah Reject</b></td>
                        </tr>
                        <tr>
                            <td><?= $pemeriksaanchemical->jumlah_barang; ?></td>
                            <td><?= $pemeriksaanchemical->sampel; ?></td>
                            <td colspan="5"><?= $pemeriksaanchemical->jumlah_reject; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="3">KONDISI FISIK</th>
                            <th colspan="4">HALAL BERLAKU</th>
                        </tr>
                        <tr class="text-center">
                            <td><b>Kemasan</b></td>
                            <td><b>Warna</b></td>
                            <td><b>pH</b></td>
                            <td colspan="4"><b>Berlaku</b></td>
                        </tr>
                        <tr class="text-center">
                            <td><?= icon_check($pemeriksaanchemical->kemasan, 'sesuai'); ?></td>
                            <td><?= icon_check($pemeriksaanchemical->warna, 'sesuai'); ?></td>
                            <td><?= $pemeriksaanchemical->ph; ?></td>
                            <td colspan="4"><?= icon_check($pemeriksaanchemical->halal_berlaku, 'berlaku'); ?></td>
                        </tr>
                        <tr>
                            <td><b>Segel</b></td>
                            <td><b>COA</b></td>
                            <td colspan="5"><b>Penerimaan</b></td>
                        </tr>
                        <tr>
                            <td><?= $pemeriksaanchemical->segel; ?></td>
                            <td><?= icon_check($pemeriksaanchemical->coa, 'ada'); ?></td>
                            <td colspan="5"><?= icon_check($pemeriksaanchemical->penerimaan, 'ok'); ?></td>
                        </tr>
                        <tr>
                            <td><b>Bukti COA</b></td>
                            <td colspan="6">
                                <?php if (!empty($pemeriksaanchemical->bukti_coa)): ?>
                                    <a href="<?= base_url('uploads/' . $pemeriksaanchemical->bukti_coa); ?>" target="_blank">Link COA</a>
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada file</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td colspan="6"><?= !empty($pemeriksaanchemical->keterangan) ? $pemeriksaanchemical->keterangan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-secondary text-center">
                            <th colspan="7">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td><b>QC</b></td>
                            <td colspan="6"><?= $pemeriksaanchemical->username; ?></td>
                        </tr>
                        <tr>
                            <td><b>Disetujui Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                    if ($pemeriksaanchemical->status_spv == 0) {
                                        echo '<span class="text-secondary font-weight-bold">Created</span>';
                                    } elseif ($pemeriksaanchemical->status_spv == 1) {
                                        echo '<span class="text-success font-weight-bold">Verified</span>';
                                    } elseif ($pemeriksaanchemical->status_spv == 2) {
                                        echo '<span class="text-danger font-weight-bold">Revision</span>';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($pemeriksaanchemical->catatan_spv) ? $pemeriksaanchemical->catatan_spv : 'Tidak ada'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Styling -->
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

    .form-label {
        font-weight: 600;
    }
</style>

<!-- Helper -->
<?php
function icon_check($value, $expected) {
    return $value == $expected ? '✔️' : (($value && $value != $expected) ? '❌' : '−');
}
?>
