<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">
        Detail Pemeriksaan Penerimaan Kemasan dari Supplier
    </h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('penerimaankemasan'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body table-responsive">
            <?php $formattedDate = (new DateTime($penerimaankemasan->date))->format('d-m-Y'); ?>
            <table class="table table-bordered" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th colspan="9" class="font-weight-bold">PEMERIKSAAN PENERIMAAN KEMASAN DARI SUPPLIER</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Informasi Umum -->
                    <?php
                    $infoUmum = [
                        'Tanggal' => $formattedDate,
                        'Shift' => $penerimaankemasan->shift,
                        'Jenis Kemasan' => $penerimaankemasan->jenis_kemasan,
                        'Pemasok' => $penerimaankemasan->pemasok,
                        'Jenis Mobil' => $penerimaankemasan->jenis_mobil,
                        'No. Polisi' => $penerimaankemasan->no_polisi,
                        'Identitas Pengantar' => $penerimaankemasan->identitas_pengantar,
                        'No. PO / DO' => $penerimaankemasan->no_po,
                        'Kode Produksi' => $penerimaankemasan->kode_produksi
                    ];
                    foreach ($infoUmum as $label => $value): ?>
                        <tr>
                            <td colspan="3"><b><?= $label; ?></b></td>
                            <td colspan="6"><?= $value ?: '−'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Kondisi Mobil -->
                    <tr class="table-primary text-center font-weight-bold">
                        <th colspan="9">KONDISI MOBIL</th>
                    </tr>
                    <tr>
                        <td colspan="9">
                            <?php
                            $keteranganMobil = [1=>'Bersih',2=>'Kotor',3=>'Bau',4=>'Bocor',5=>'Basah',6=>'Kering',7=>'Bebas Hama'];
                            if (!empty($penerimaankemasan->kondisi_mobil)) {
                                $mobilList = is_array($penerimaankemasan->kondisi_mobil) ? $penerimaankemasan->kondisi_mobil : explode(',', $penerimaankemasan->kondisi_mobil);
                                echo '<ul class="mb-0">';
                                foreach ($mobilList as $m) echo '<li>' . ($keteranganMobil[trim($m)] ?? 'Tidak diketahui') . '</li>';
                                echo '</ul>';
                            } else {
                                echo 'Tidak ada data';
                            }
                            ?>
                        </td>
                    </tr>

                    <!-- Jumlah & Sampel -->
                    <tr class="bg-light text-center font-weight-bold">
                        <td colspan="3">Jumlah Datang</td>
                        <td colspan="3">Sampel (pcs)</td>
                        <td colspan="3">Jumlah Reject</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="3"><?= $penerimaankemasan->jumlah_datang; ?></td>
                        <td colspan="3"><?= $penerimaankemasan->sampel; ?></td>
                        <td colspan="3"><?= $penerimaankemasan->jumlah_reject; ?></td>
                    </tr>

                    <!-- Kondisi Fisik -->
                    <tr class="table-primary text-center font-weight-bold">
                        <th colspan="9">KONDISI FISIK</th>
                    </tr>
                    <tr class="text-center">
                        <?php $fisik = ['Warna','Panjang','Diameter','Lebar','Tinggi','Berat','Delaminasi','Bau','Desain']; ?>
                        <?php foreach ($fisik as $f): ?>
                            <th class="vertical"><?= $f; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="text-center">
                        <?php $cek = ['warna','panjang','diameter','lebar','tinggi','berat','delaminasi','bau','desain']; ?>
                        <?php foreach ($cek as $c): ?>
                            <td><?= icon_check($penerimaankemasan->$c); ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Segel</b></td>
                        <td colspan="6"><?= $penerimaankemasan->segel ?: '−'; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Penerimaan</b></td>
                        <td colspan="6"><?= icon_check($penerimaankemasan->penerimaan=='ok'?'sesuai':($penerimaankemasan->penerimaan=='tolak'?'tidak sesuai':'')); ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>COA</b></td>
                        <td colspan="3"><?= icon_check($penerimaankemasan->coa=='ada'?'sesuai':($penerimaankemasan->coa=='tidak ada'?'tidak sesuai':'')); ?></td>
                        <td colspan="3"><?= !empty($penerimaankemasan->bukti_coa) ? '<a href="'.base_url('uploads/'.$penerimaankemasan->bukti_coa).'" target="_blank">Link COA</a>' : '−'; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Keterangan</b></td>
                        <td colspan="6"><?= $penerimaankemasan->keterangan ?: '−'; ?></td>
                    </tr>

                    <!-- Verifikasi -->
                    <tr class="table-primary text-center font-weight-bold">
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
                            echo match($penerimaankemasan->status_spv){
                                1 => '<span class="text-success font-weight-bold">Verified</span>',
                                2 => '<span class="text-danger font-weight-bold">Revision</span>',
                                default => '<span class="text-secondary font-weight-bold">Created</span>'
                            };
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Catatan Supervisor</b></td>
                        <td colspan="6"><?= $penerimaankemasan->catatan_spv ?: '−'; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .breadcrumb { background-color: #2E86C1; padding: 8px 16px; border-radius: .25rem; }
    .breadcrumb a { color: #fff; font-weight: 500; }
    .breadcrumb a:hover { text-decoration: underline; }
    .table { width: 100%; font-size: 15px; }
    .table td, .table th { padding: 10px 12px; vertical-align: middle; word-break: break-word; }
/* Header normal */
.table th.vertical {
    white-space: nowrap;
    text-align: center;
    vertical-align: middle;
    padding: 8px 4px;
}

/* Vertikal hanya di layar <= 768px */
@media (max-width: 768px) {
    .table th.vertical {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        padding: 4px 2px;
        font-size: 12px;
    }
}

</style>

<?php
function icon_check($value) {
    return $value=='sesuai'?'✔️':($value=='tidak sesuai'?'❌':'−');
}
?>
