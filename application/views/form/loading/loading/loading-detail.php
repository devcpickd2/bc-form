<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Loading Produk</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('loading'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Loading Produk
                </a>
            </li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <?php $datetime = (new DateTime($loading->date))->format('d-m-Y'); ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr><th colspan="7" class="font-weight-bold">PEMERIKSAAN LOADING PRODUK</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Tanggal:</b> <?= $datetime; ?></td>
                            <td colspan="5"><b>Shift:</b> <?= htmlspecialchars($loading->shift); ?></td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="4"><b>Start Loading</b></td>
                            <td colspan="3"><b>Finish Loading</b></td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="4"><?= htmlspecialchars($loading->start_loading); ?></td>
                            <td colspan="3"><?= htmlspecialchars($loading->finish_loading); ?></td>
                        </tr>
                        <tr><td colspan="2"><b>No. Polisi</b></td><td colspan="5"><?= htmlspecialchars($loading->no_pol); ?></td></tr>
                        <tr><td colspan="2"><b>Nama Supir</b></td><td colspan="5"><?= htmlspecialchars($loading->nama_supir); ?></td></tr>
                        <tr><td colspan="2"><b>Ekspedisi</b></td><td colspan="5"><?= htmlspecialchars($loading->ekspedisi); ?></td></tr>
                        <tr><td colspan="2"><b>Tujuan</b></td><td colspan="5"><?= htmlspecialchars($loading->tujuan); ?></td></tr>
                        <tr><td colspan="2"><b>No. Segel</b></td><td colspan="5"><?= htmlspecialchars($loading->no_segel); ?></td></tr>

                        <!-- $kondisiMap = [
                        '1' => 'Noda (karat, cat, tinta)',
                        '2' => 'Bekas oli di lantai, di dinding',
                        '3' => 'Pallet rusak/pecah',
                        '4' => 'Tidak ada pallet',
                        '5' => 'Lantai kotor',
                        '6' => 'Bau menyengat',
                        '7' => 'Dinding penyok',
                        '8' => 'Ada serangga',
                        '9' => 'Pintu rusak',
                        '10' => 'Segel tidak layak'
                        ]; -->

                        <!-- Kondisi Mobil -->
                        <?php
                        $loading_produk = json_decode($loading->loading, true) ?: [];

                        $kondisi_mobil = json_decode($loading->kondisi_mobil, true) ?: [];

                        $kondisiLabels = [
                            'bersih' => 'Bersih',
                            'bocor' => 'Bocor',
                            'bebas_dari_hama' => 'Bebas dari Hama',
                            'tidak_berdebu' => 'Tidak Berdebu',
                            'tidak_ada_sampah' => 'Tidak ada Sampah',
                            'kering' => 'Kering',
                            'basah' => 'Basah',
                            'tidak_berbau' => 'Tidak Berbau',
                            'tidak_ada_produk_non_halal' => 'Tidak ada produk Non Halal',
                            'tidak_ada_aktivitas_binatang' => 'Tidak ada Aktivitas Binatang'
                        ];

                        $keys = array_keys($kondisi_mobil);
                        $set1_keys = array_slice($keys, 0, 5);
                        $set2_keys = array_slice($keys, 5, 5);

                        $set1 = []; foreach ($set1_keys as $k) $set1[$k] = $kondisi_mobil[$k];
                        $set2 = []; foreach ($set2_keys as $k) $set2[$k] = $kondisi_mobil[$k];

                        function tampilKondisiMobil($data, $labels) {
                            $html = '<tr class="table-secondary text-center">';
                            $i = 0;
                            foreach ($data as $key => $val) {
                                $label = $labels[$key] ?? $key;
                                $colspan = ($i === 0 || $i === 1) ? 2 : 1;
                                $html .= '<th colspan="' . $colspan . '" style="border:1px solid #dee2e6;">' . htmlspecialchars($label) . '</th>';
                                $i++;
                            }
                            $colUsed = 0;
                            $i = 0;
                            foreach ($data as $key => $val) { $colUsed += ($i===0||$i===1)?2:1; $i++; }
                            if ($colUsed < 7) $html .= '<th colspan="' . (7 - $colUsed) . '"></th>';
                            $html .= '</tr>';

                            $html .= '<tr class="text-center">';
                            $i = 0;
                            foreach ($data as $val) {
                                $colspan = ($i === 0 || $i === 1) ? 2 : 1;
                                $display = $val !== '' ? htmlspecialchars($val) : '-';
                                $html .= '<td colspan="' . $colspan . '" class="bg-light" style="border:1px solid #dee2e6;">' . $display . '</td>';
                                $i++;
                            }
                            if ($colUsed < 7) $html .= '<td colspan="' . (7 - $colUsed) . '"></td>';
                            $html .= '</tr>';

                            return $html;
                        }
                        ?>

                        <tr class="table-primary text-center"><th colspan="7">KONDISI MOBIL</th></tr>

                        <?= tampilKondisiMobil($set1, $kondisiLabels); ?>
                        <?= tampilKondisiMobil($set2, $kondisiLabels); ?>

                        <tr class="table-primary text-center"><th colspan="7">LOADING PRODUK</th></tr>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kondisi Produk</th>
                            <th>Kondisi Kemasan</th>
                            <th>Kode Produksi</th>
                            <th>Expired</th>
                            <th>Keterangan</th>
                        </tr>
                        <?php $no = 1; foreach ($loading_produk as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama_produk']); ?></td>
                            <td><?= htmlspecialchars($row['kondisi_produk']); ?></td>
                            <td><?= htmlspecialchars($row['kondisi_kemasan']); ?></td>
                            <td><?= htmlspecialchars($row['kode_produksi']); ?></td>
                            <td><?= htmlspecialchars($row['expired']); ?></td>
                            <td><?= htmlspecialchars($row['keterangan']); ?></td>
                        </tr>
                    <?php endforeach; ?>

<!-- Verifikasi -->
<tr class="table-primary text-center"><th colspan="7">VERIFIKASI</th></tr>
<tr><td colspan="2"><b>QC</b></td><td colspan="5"><?= htmlspecialchars($loading->username); ?></td></tr>
<tr><td colspan="2"><b>Warehouse</b></td><td colspan="5"><?= htmlspecialchars($loading->nama_wh); ?></td></tr>
<tr><td colspan="2"><b>Disetujui Supervisor</b></td>
    <td colspan="5">
        <?php
        echo match ($loading->status_spv) {
            1 => '<span class="text-success font-weight-bold">Verified</span>',
            2 => '<span class="text-danger font-weight-bold">Revision</span>',
            default => '<span class="text-secondary font-weight-bold">Created</span>',
        };
        ?>
    </td>
</tr>
<tr><td colspan="2"><b>Catatan Supervisor</b></td><td colspan="5"><?= !empty($loading->catatan_spv) ? htmlspecialchars($loading->catatan_spv) : 'Tidak ada'; ?></td></tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
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
        width: 100%;
        font-size: 15px;
    }
    .table th, .table td {
        padding: 10px 12px;
        vertical-align: middle;
        word-break: break-word;
    }
    .text-center th, .text-center td {
        text-align: center;
    }
    .bg-light {
        background-color: #f9f9f9;
    }
    .table td[colspan="2"] {
        min-width: 160px;
        max-width: 200px;
        word-break: break-word;
    }
</style>
