<?php 
$datetime = (new DateTime($analisis->date))->format('d-m-Y');
$bb = (new DateTime($analisis->best_before))->format('d-m-Y');

// Fungsi untuk menampilkan nama analisis
function tampilkan_analisis($kode) {
    $map = [
        '1' => 'Moisture',
        '2' => 'Salinity',
        '3' => 'pH',
        '4' => 'Bulk Density',
        '5' => 'TPC',
        '6' => 'Enterobacter',
        '7' => 'Salmonella',
        '8' => 'Yeast and Mold',
    ];
    return $map[$kode] ?? $kode;
}
?>

<!-- Detail Permohonan Analisis -->
<div class="section">
    <h3>🧾 Detail Permohonan Analisis</h3>
    <div class="row">
        <div class="col"><strong>Tanggal</strong></div>
        <div class="col"><?= $datetime ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Tipe Sampel</strong></div>
        <div class="col"><?= $analisis->tipe_sampel ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Penyimpanan</strong></div>
        <div class="col"><?= $analisis->penyimpanan ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Nama Produk</strong></div>
        <div class="col"><?= $analisis->nama_produk ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Kode Produksi</strong></div>
        <div class="col"><?= $analisis->kode_produksi ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Best Before</strong></div>
        <div class="col"><?= $bb ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Jumlah Sampel (g)</strong></div>
        <div class="col"><?= $analisis->jumlah_sampel ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Permintaan Analisis</strong></div>
        <div class="col">
            <?php
            $nilai = explode(',', $analisis->analisis);
            $hasil = array_map('tampilkan_analisis', array_map('trim', $nilai));
            echo htmlspecialchars(implode(', ', $hasil));
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col"><strong>Catatan</strong></div>
        <div class="col"><?= $analisis->catatan ?: 'Tidak ada' ?></div>
    </div>
</div>

<!-- Verifikasi & Status -->
<div class="section mt-4">
    <h3>🔍 Verifikasi & Status</h3>
    <div class="row">
        <div class="col"><strong>QC</strong></div>
        <div class="col"><?= $analisis->username ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Produksi</strong></div>
        <div class="col"><?= $analisis->nama_produksi ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Status Produksi</strong></div>
        <div class="col">
            <?php
            if ($analisis->status_produksi == 0) {
                echo '<span class="status created">Created</span>';
            } elseif ($analisis->status_produksi == 1) {
                echo '<span class="status checked">Checked</span>';
            } elseif ($analisis->status_produksi == 2) {
                echo '<span class="status recheck">Re-Check</span>';
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col"><strong>Catatan Produksi</strong></div>
        <div class="col"><?= $analisis->catatan_produksi ?: 'Tidak ada' ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Lab</strong></div>
        <div class="col"><?= $analisis->nama_lab ?></div>
    </div>
    <div class="row">
        <div class="col"><strong>Status Lab</strong></div>
        <div class="col">
            <?php
            if ($analisis->status_lab == 0) {
                echo '<span class="status created">Created</span>';
            } elseif ($analisis->status_lab == 1) {
                echo '<span class="status accepted">Accepted</span>';
            } elseif ($analisis->status_lab == 2) {
                echo '<span class="status returned">Returned</span>';
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col"><strong>Status Supervisor</strong></div>
        <div class="col">
            <?php
            if ($analisis->status_spv == 0) {
                echo '<span class="status created">Created</span>';
            } elseif ($analisis->status_spv == 1) {
                echo '<span class="status verified">Verified</span>';
            } elseif ($analisis->status_spv == 2) {
                echo '<span class="status revision">Revision</span>';
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col"><strong>Catatan Supervisor</strong></div>
        <div class="col"><?= $analisis->catatan_spv ?: 'Tidak ada' ?></div>
    </div>
</div>

<!-- CSS Styling -->
<style>
    .section {
        margin-bottom: 12px; 
    }
    .section h3 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 6px; 
    }
    .row {
        display: flex;
        margin-bottom: 6px;
        align-items: center; 
    }
    .row .col {
        flex: 1;
        padding: 4px 8px;
        font-size: 14px;
        white-space: nowrap;  
    }
    .row .col:first-child {
        font-weight: bold;
        margin-right: 10px; 
        width: 20%;  
    }
    .row .col:last-child {
        width: 20%;
    }
    .status {
        font-weight: bold;
    }
    .status.created {
        color: #99a3a4;
    }
    .status.checked {
        color: #28b463;
    }
    .status.recheck {
        color: red;
    }
    .status.accepted {
        color: #28b463;
    }
    .status.returned {
        color: red;
    }
    .status.verified {
        color: #28b463;
    }
    .status.revision {
        color: red;
    }

</style>
