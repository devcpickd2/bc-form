<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Verifikasi Proses Produksi</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('proses') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Proses Produksi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('proses/packing/' . $proses->uuid); ?>">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date_stall" class="form-control"
                        value="<?= set_value('date_stall', (!empty($proses->date_stall) && $proses->date_stall !== '0000-00-00') ? $proses->date_stall : date('Y-m-d')) ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Shift</label>
                        <select name="shift_pack" class="form-control">
                            <option value="1" <?= set_select('shift_pack', '1', $proses->shift_pack == '1') ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift_pack', '2', $proses->shift_pack == '2') ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift_pack', '3', $proses->shift_pack == '3') ?>>Shift 3</option>
                        </select>
                    </div>
                </div>

                <?php
                $label_param = [
                    'jam_mulai' => 'Jam Mulai',
                    'jam_selesai' => 'Jam Selesai',
                    'lama_aging' => 'Lama Aging (9 - 12 Jam)',
                    'kadar_air' => 'Kadar Air (32 - 34%)',
                    'hasil_grinding' => 'Hasil Grinding',
                    'suhu_setting' => 'Suhu Setting (85 - 90°C)',
                    'suhu_aktual' => 'Suhu Aktual',
                    'dryer_speed' => 'Dryer Speed (4 - 6 rpm)',
                    'nama_produk' => 'Nama Produk',
                    'kode_produksi' => 'Kode Produksi',
                    'best_before' => 'Best Before',
                    'suhu_sebelum_packing' => 'Suhu Produk Sebelum Packing (32 - 35°C)',
                    'kadar_air_produk' => 'Kadar Air Produk (4 - 8%)',
                    'bulk_density' => 'Bulk Density (225 - 325 g/l)',
                    'sensori_produk' => 'Sensori Produk',
                    'kondisi_kemasan' => 'Kondisi Kemasan',
                    'ketepatan_labelisasi' => 'Ketepatan Labelisasi',
                    'kode_supplier' => 'Kode Supplier',
                    'net_weight' => 'Nett Weight (9,850 - 10,100 g/plastic bag)',
                ];

                $proses_packing = [
                    'stalling_aging' => ['jam_mulai', 'jam_selesai', 'lama_aging', 'kadar_air'],
                    'grinding' => ['hasil_grinding'],
                    'drying' => ['suhu_setting', 'suhu_aktual', 'dryer_speed'],
                    'pemeriksaan_finished_product' => [
                        'nama_produk', 'kode_produksi', 'best_before', 'suhu_sebelum_packing',
                        'kadar_air_produk', 'bulk_density', 'sensori_produk',
                        'kondisi_kemasan', 'ketepatan_labelisasi',
                        'kode_supplier', 'net_weight'
                    ],
                ];
                ?>

<!-- Table Start -->
<div class="table-responsive mt-4">
    <table class="table table-bordered">
        <thead class="thead-light">
         <tr>
            <th style="width: 14%;">JENIS PRODUK</th>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <th style="width: 8.6%;">Input ke-<?= $i ?></th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($proses_packing as $kategori => $params): ?>
            <tr style="background-color: #f1f1f1; font-weight:bold;">
                <td colspan="11"><?= strtoupper(str_replace('_', ' ', $kategori)) ?></td>
            </tr>

            <?php
                // KHUSUS stalling_aging: gabung jam_mulai dan jam_selesai
            if ($kategori === 'stalling_aging') {
                echo '<tr><td>Jam Mulai / Selesai</td>';
                for ($col = 0; $col < 10; $col++) {
                    $mulai = $data_packing[$col]['stalling_aging']['jam_mulai'][0] ?? '';
                    $selesai = $data_packing[$col]['stalling_aging']['jam_selesai'][0] ?? '';
                    echo '<td>
                    <div class="d-flex gap-1">
                    <input type="text" name="packing['.$col.'][stalling_aging][jam_mulai][0]" class="form-control form-control-sm" value="'.htmlspecialchars($mulai).'">
                    <input type="text" name="packing['.$col.'][stalling_aging][jam_selesai][0]" class="form-control form-control-sm" value="'.htmlspecialchars($selesai).'">
                    </div>
                    </td>';
                }
                echo '</tr>';

                    // Sisa parameter stalling_aging
                foreach (['lama_aging', 'kadar_air'] as $param) {
                    echo '<tr><td>' . $label_param[$param] . '</td>';
                    for ($col = 0; $col < 10; $col++) {
                        $val = $data_packing[$col][$kategori][$param][0] ?? '';
                        echo '<td><input type="text" name="packing['.$col.'][stalling_aging]['.$param.'][0]" class="form-control form-control-sm" value="'.htmlspecialchars($val).'"></td>';
                    }
                    echo '</tr>';
                }
            }

                // KHUSUS drying: suhu setting/aktual & dryer speed
            elseif ($kategori === 'drying') {
                echo '<tr><td>Suhu Setting / Aktual (85 - 90°C)</td>';
                for ($col = 0; $col < 10; $col++) {
                    $setting = $data_packing[$col]['drying']['suhu_setting'][0] ?? '';
                    $aktual = $data_packing[$col]['drying']['suhu_aktual'][0] ?? '';
                    echo '<td>
                    <div class="d-flex gap-1">
                    <input type="text" name="packing['.$col.'][drying][suhu_setting][0]" class="form-control form-control-sm" value="'.htmlspecialchars($setting).'">
                    <input type="text" name="packing['.$col.'][drying][suhu_aktual][0]" class="form-control form-control-sm" value="'.htmlspecialchars($aktual).'">
                    </div>
                    </td>';
                }
                echo '</tr>';

                echo '<tr><td>Dryer Speed (4 - 6 rpm)</td>';
                for ($col = 0; $col < 10; $col++) {
                    $val = $data_packing[$col]['drying']['dryer_speed'][0] ?? '';
                    echo '<td><input type="text" name="packing['.$col.'][drying][dryer_speed][0]" class="form-control form-control-sm" value="'.htmlspecialchars($val).'"></td>';
                }
                echo '</tr>';
            }

                // KHUSUS pemeriksaan_finished_product
            elseif ($kategori === 'pemeriksaan_finished_product') {
                foreach ($params as $param) {
                    if ($param === 'kondisi_kemasan') continue; 
                    if ($param === 'ketepatan_labelisasi') continue;

                    echo '<tr><td>' . $label_param[$param] . '</td>';
                    for ($col = 0; $col < 10; $col++) {
                        $val = $data_packing[$col][$kategori][$param][0] ?? '';
                        $extra_class = ($param == 'nama_produk') ? 'nama-produk' : (($param == 'kode_produksi') ? 'kode-produksi' : '');
                        echo '<td><input type="text" name="packing['.$col.']['.$kategori.']['.$param.'][0]" class="form-control form-control-sm '.$extra_class.'" value="'.htmlspecialchars($val).'"></td>';
                    }
                    echo '</tr>';

                    if ($param === 'sensori_produk') {
                        echo '<tr><td>Kemasan / Labelisasi</td>';
                        for ($col = 0; $col < 10; $col++) {
                            $kemasan = $data_packing[$col]['pemeriksaan_finished_product']['kondisi_kemasan'][0] ?? '';
                            $label = $data_packing[$col]['pemeriksaan_finished_product']['ketepatan_labelisasi'][0] ?? '';
                            echo '<td>
                            <div class="d-flex gap-1">
                            <input type="text" name="packing['.$col.'][pemeriksaan_finished_product][kondisi_kemasan][0]" class="form-control form-control-sm" value="'.htmlspecialchars($kemasan).'">
                            <input type="text" name="packing['.$col.'][pemeriksaan_finished_product][ketepatan_labelisasi][0]" class="form-control form-control-sm" value="'.htmlspecialchars($label).'">
                            </div>
                            </td>';
                        }
                        echo '</tr>';
                    }
                }
            }

                // Default kategori
            else {
                foreach ($params as $param) {
                    echo '<tr><td>' . $label_param[$param] . '</td>';
                    for ($col = 0; $col < 10; $col++) {
                        $val = $data_packing[$col][$kategori][$param][0] ?? '';
                        echo '<td><input type="text" name="packing['.$col.']['.$kategori.']['.$param.'][0]" class="form-control form-control-sm" value="'.htmlspecialchars($val).'"></td>';
                    }
                    echo '</tr>';
                }
            }
            ?>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<!-- Table End -->

<div class="form-group row">
    <div class="col-sm-6">
        <label class="form-label font-weight-bold">Catatan</label>
        <textarea class="form-control" name="catatan_packing"><?= $proses->catatan_packing; ?></textarea>
        <div class="invalid-feedback <?= !empty(form_error('catatan_packing')) ? 'd-block' : '' ; ?> ">
            <?= form_error('catatan_packing') ?>
        </div>
    </div>
</div> 

<div class="row mt-3">
    <div class="col">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <a href="<?= base_url('proses') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
    </div>
</div>
</form>
</div>
</div>
</div>

<style>
    .breadcrumb {
        background-color: #3498db;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const namaInputs = document.querySelectorAll('.nama-produk');
        if (namaInputs.length > 0) {
            namaInputs[0].addEventListener('input', function () {
                const val = this.value;
                namaInputs.forEach((el, i) => {
                    if (i > 0) el.value = val;
                });
            });
        }

        const kodeInputs = document.querySelectorAll('.kode-produksi');
        if (kodeInputs.length > 0) {
            kodeInputs[0].addEventListener('input', function () {
                const inputVal = this.value.trim();
                const match = inputVal.match(/^(.+?)(\d{2,})$/);
                if (match) {
                    const prefix = match[1];
                    const startNumber = parseInt(match[2], 10);
                    const digitLength = match[2].length;
                    kodeInputs.forEach((el, i) => {
                        const nextNum = (startNumber + i).toString().padStart(digitLength, '0');
                        el.value = `${prefix}${nextNum}`;
                    });
                }
            });
        }
    });
</script>
