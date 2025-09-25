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
            <form class="user" method="post" action="<?= base_url('proses/packing/'.$proses->uuid); ?>">
                <?php
                // ambil data JSON packing
                $data_packing = json_decode($proses->proses_packing, true);

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
                    'stalling_aging' => [
                        ['label' => 'Jam Mulai / Selesai', 'params' => ['jam_mulai','jam_selesai']],
                        'lama_aging', 'kadar_air'
                    ],
                    'grinding' => ['hasil_grinding'],
                    'drying' => [
                        ['label' => 'Suhu Setting / Aktual (85 - 90°C)', 'params' => ['suhu_setting','suhu_aktual']],
                        'dryer_speed'
                    ],
                    'pemeriksaan_finished_product' => [
                        'nama_produk', 'kode_produksi', 'best_before', 'suhu_sebelum_packing',
                        'kadar_air_produk', 'bulk_density', 'sensori_produk',
                        ['label' => 'Kemasan / Labelisasi', 'params' => ['kondisi_kemasan','ketepatan_labelisasi']],
                        'kode_supplier', 'net_weight'
                    ],
                ];
                ?>

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

                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th style="width: 30%;">Jenis Produksi</th>
                            <?php for ($i=1;$i<=10;$i++): ?>
                                <th style="width:7%;" class="text-center">Input ke-<?= $i ?></th>
                            <?php endfor; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($proses_packing as $kategori => $params): ?>
                            <tr style="background-color:#f1f1f1;font-weight:bold;">
                                <td colspan="11"><?= strtoupper(str_replace('_',' ',$kategori)) ?></td>
                            </tr>

                            <?php foreach ($params as $param): ?>
                                <?php
                                if (is_array($param)) {
                                    $label = $param['label'];
                                    $subParams = $param['params'];
                                } else {
                                    $label = $label_param[$param];
                                    $subParams = [$param];
                                }
                                ?>
                                <tr>
                                    <td><?= $label ?></td>
                                    <?php for ($col=0;$col<10;$col++): ?>
                                        <td>
                                            <?php if (count($subParams) === 1): ?>
                                                <?php
                                                $paramName = $subParams[0];
                                                $val = $data_packing[$col][$kategori][$paramName][0] ?? '';
                                                $inputType = in_array($paramName, ['jam_mulai','jam_selesai']) ? 'time' : 'text';
                                                ?>
                                                <input type="<?= $inputType ?>"
                                                    name="packing[<?= $col ?>][<?= $kategori ?>][<?= $paramName ?>][0]"
                                                    class="form-control form-control-sm"
                                                    value="<?= htmlspecialchars($val) ?>">
                                            <?php else: ?>
                                                <div class="d-flex">
                                                    <?php foreach ($subParams as $i=>$sub): ?>
                                                        <?php
                                                        $v = $data_packing[$col][$kategori][$sub][0] ?? '';
                                                        $inputType = in_array($sub,['jam_mulai','jam_selesai']) ? 'time':'text';
                                                        ?>
                                                        <input type="<?= $inputType ?>"
                                                            name="packing[<?= $col ?>][<?= $kategori ?>][<?= $sub ?>][0]"
                                                            class="form-control form-control-sm <?= ($i==0)?'mr-1':'' ?>"
                                                            style="width:100%;"
                                                            value="<?= htmlspecialchars($v) ?>">
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    <?php endfor; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="form-group row mt-3">
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
        background-color:#2E86C1;
    }
    .d-flex {
        display:flex;
    }
    .mr-1 {
        margin-right:0.25rem;
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
