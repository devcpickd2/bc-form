<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Penerimaan Kemasan dari Supplier</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('penerimaankemasan'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Penerimaan Kemasan dari Supplier
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0">
                    <?php 
                    $datetime = new DateTime($penerimaankemasan->date);
                    $formattedDate = $datetime->format('d-m-Y');
                    ?>
                    <thead class="text-center">
                        <tr>
                            <th colspan="9" class="font-weight-bold">PEMERIKSAAN PENERIMAAN KEMASAN DARI SUPPLIER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3"><b>Tanggal:</b> <?= $formattedDate; ?></td>
                            <td colspan="6"><b>Shift:</b> <?= $penerimaankemasan->shift; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Jenis Kemasan</b></td>
                            <td colspan="6"><?= $penerimaankemasan->jenis_kemasan; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Pemasok</b></td>
                            <td colspan="6"><?= $penerimaankemasan->pemasok; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Kode Produksi</b></td>
                            <td colspan="6"><?= $penerimaankemasan->kode_produksi; ?></td>
                        </tr>
                        <tr class="bg-light text-center">
                            <td colspan="9" class="font-weight-bold">Jumlah & Sampel</td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Jumlah Datang</b></td>
                            <td colspan="3"><b>Sampel (pcs)</b></td>
                            <td colspan="3"><b>Jumlah Reject</b></td>
                        </tr>
                        <tr>
                            <td colspan="3"><?= $penerimaankemasan->jumlah_datang; ?></td>
                            <td colspan="3"><?= $penerimaankemasan->sampel; ?></td>
                            <td colspan="3"><?= $penerimaankemasan->jumlah_reject; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="9">KONDISI FISIK</th>
                        </tr>
                        <tr class="text-center">
                            <td><b>Warna</b></td>
                            <td><b>Panjang</b></td>
                            <td><b>Diameter</b></td>
                            <td><b>Lebar</b></td>
                            <td><b>Tinggi</b></td>
                            <td><b>Berat</b></td>
                            <td><b>Delaminasi</b></td>
                            <td><b>Bau</b></td>
                            <td><b>Desain</b></td>
                        </tr>
                        <tr class="text-center">
                            <td><?= icon_check($penerimaankemasan->warna); ?></td>
                            <td><?= icon_check($penerimaankemasan->panjang); ?></td>
                            <td><?= icon_check($penerimaankemasan->diameter); ?></td>
                            <td><?= icon_check($penerimaankemasan->lebar); ?></td>
                            <td><?= icon_check($penerimaankemasan->tinggi); ?></td>
                            <td><?= icon_check($penerimaankemasan->berat); ?></td>
                            <td><?= icon_check($penerimaankemasan->delaminasi); ?></td>
                            <td><?= icon_check($penerimaankemasan->bau); ?></td>
                            <td><?= icon_check($penerimaankemasan->desain); ?></td>
                        </tr>
                        <tr class="bg-light text-center">
                            <td colspan="9" class="font-weight-bold">Informasi Tambahan</td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Segel</b></td>
                            <td colspan="3"><?= $penerimaankemasan->segel; ?></td>
                            <td colspan="3"><b>COA:</b> <?= icon_check($penerimaankemasan->coa == 'ada' ? 'sesuai' : ($penerimaankemasan->coa == 'tidak ada' ? 'tidak sesuai' : '')); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Penerimaan</b></td>
                            <td colspan="6"><?= icon_check($penerimaankemasan->penerimaan == 'ok' ? 'sesuai' : ($penerimaankemasan->penerimaan == 'tolak' ? 'tidak sesuai' : '')); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Bukti COA</b></td>
                            <td colspan="6">
                                <?php if (!empty($penerimaankemasan->bukti_coa)): ?>
                                    <a href="<?= base_url('uploads/' . $penerimaankemasan->bukti_coa); ?>" target="_blank">Link COA</a>
                                <?php else: ?>
                                    Tidak ada file
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Keterangan</b></td>
                            <td colspan="6"><?= !empty($penerimaankemasan->keterangan) ? $penerimaankemasan->keterangan : 'Tidak ada'; ?></td>
                        </tr>
                        <tr class="table-primary text-center">
                            <th colspan="9">VERIFIKASI</th>
                        </tr>
                        <tr>
                            <td colspan="3"><b>QC</b></td>
                            <td colspan="6"><?= $penerimaankemasan->username; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Status Supervisor</b></td>
                            <td colspan="6">
                                <?php
                                switch ($penerimaankemasan->status_spv) {
                                    case 1: echo '<span class="text-success font-weight-bold">Verified</span>'; break;
                                    case 2: echo '<span class="text-danger font-weight-bold">Revision</span>'; break;
                                    default: echo '<span class="text-secondary font-weight-bold">Created</span>'; break;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Catatan Supervisor</b></td>
                            <td colspan="6"><?= !empty($penerimaankemasan->catatan_spv) ? $penerimaankemasan->catatan_spv : 'Tidak ada'; ?></td>
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

<?php
// Fungsi bantu untuk ikon centang/silang
function icon_check($value) {
    if ($value == 'sesuai') return '✔️';
    if ($value == 'tidak sesuai') return '❌';
    return '−';
}
?>
