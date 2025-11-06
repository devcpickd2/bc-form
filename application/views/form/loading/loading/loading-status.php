<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold text-center">Detail Pemeriksaan Loading Produk</h1>

    <!-- Breadcrumb -->
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
                            <td colspan="3"><b>Start Loading</b></td>
                            <td colspan="4"><b>Finish Loading</b></td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="3"><?= htmlspecialchars($loading->start_loading); ?></td>
                            <td colspan="4"><?= htmlspecialchars($loading->finish_loading); ?></td>
                        </tr>
                        <tr><td colspan="2"><b>No. Polisi</b></td><td colspan="5"><?= htmlspecialchars($loading->no_pol); ?></td></tr>
                        <tr><td colspan="2"><b>Nama Supir</b></td><td colspan="5"><?= htmlspecialchars($loading->nama_supir); ?></td></tr>
                        <tr><td colspan="2"><b>Ekspedisi</b></td><td colspan="5"><?= htmlspecialchars($loading->ekspedisi); ?></td></tr>
                        <tr><td colspan="2"><b>Tujuan</b></td><td colspan="5"><?= htmlspecialchars($loading->tujuan); ?></td></tr>
                        <tr><td colspan="2"><b>No. Segel</b></td><td colspan="5"><?= htmlspecialchars($loading->no_segel); ?></td></tr>
                        <tr><td colspan="2"><b>QC</b></td><td colspan="5"><?= htmlspecialchars($loading->username); ?></td></tr>
                        <tr><td colspan="2"><b>Warehouse</b></td><td colspan="5"><?= htmlspecialchars($loading->nama_wh); ?></td></tr>

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


                        <!-- Loading Produk -->
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
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Form Verifikasi -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user" method="post" action="<?= base_url('loading/status/'.$loading->uuid); ?>">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="form-label font-weight-bold">Status</label>
                    <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                        <option value="1" <?= set_select('status_spv', '1'); ?> <?= $loading->status_spv == 1 ? 'selected' : ''; ?>>Verified</option>
                        <option value="2" <?= set_select('status_spv', '2'); ?> <?= $loading->status_spv == 2 ? 'selected' : ''; ?>>Revision</option>
                    </select>
                    <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : ''; ?>">
                        <?= form_error('status_spv') ?>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6">
                    <label class="form-label font-weight-bold">Catatan Revisi</label>
                    <textarea class="form-control" name="catatan_spv"><?= $loading->catatan_spv; ?></textarea>
                    <div class="invalid-feedback <?= !empty(form_error('catatan_spv')) ? 'd-block' : ''; ?>">
                        <?= form_error('catatan_spv') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-md btn-success mr-2">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('loading/verifikasi'); ?>" class="btn btn-md btn-danger">
                        <i class="fa fa-times"></i> Batal
                    </a>
                </div>
            </div>
        </form>
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

    .invalid-feedback {
        color: red;
    }
</style>
