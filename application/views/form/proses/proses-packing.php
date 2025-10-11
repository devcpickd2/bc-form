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
            <form class="user" method="post" action="<?= base_url('proses/packing/'.$proses->uuid); ?>" enctype="multipart/form-data">
                <?php
                $data_packing = json_decode($proses->proses_packing, true);
                $data_produksi = json_decode($proses->proses_produksi, true);

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
                        ['label' => 'Jam Mulai / Selesai', 'params' => ['jam_mulai', 'jam_selesai']],
                        'lama_aging', 'kadar_air'
                    ],
                    'grinding' => ['hasil_grinding'],
                    'drying' => [
                        ['label' => 'Suhu Setting / Aktual (85 - 90°C)', 'params' => ['suhu_setting', 'suhu_aktual']],
                        'dryer_speed'
                    ],
                    'pemeriksaan_finished_product' => [
                        'nama_produk', 'kode_produksi', 'best_before', 'suhu_sebelum_packing',
                        'kadar_air_produk', 'bulk_density', 'sensori_produk',
                        ['label' => 'Kemasan / Labelisasi', 'params' => ['kondisi_kemasan', 'ketepatan_labelisasi']],
                        'kode_supplier', 'net_weight',
                        'bukti_labelisasi'
                    ],
                ];

                // === Ambil data nama_produk & kode_produksi index ke-1 dari dough_mixing ===
                $nama_produk_index1 = $data_produksi['dough_mixing']['nama_produk'][1] ?? '';
                $kode_produksi_index1 = $data_produksi['dough_mixing']['kode_produksi'][1] ?? '';
                ?>

                <!-- Hidden Input -->
                <input type="hidden" name="date_stall"
                value="<?= set_value('date_stall', (!empty($proses->date_stall) && $proses->date_stall !== '0000-00-00') ? $proses->date_stall : date('Y-m-d')) ?>">

                <input type="hidden" name="shift_pack"
                value="<?= set_value('shift_pack', $proses->shift_pack ?? '1') ?>">

                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 30%;">Jenis Produksi</th>
                                <th style="width: 70%;" class="text-center">Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($proses_packing as $kategori => $params): ?>
                                <tr style="background-color:#f1f1f1;font-weight:bold;">
                                    <td colspan="2"><?= strtoupper(str_replace('_', ' ', $kategori)) ?></td>
                                </tr>

                                <?php foreach ($params as $param): ?>
                                    <?php
                                    if (is_array($param)) {
                                        $label = $param['label'];
                                        $subParams = $param['params'];
                                    } else {
                                        $label = $label_param[$param] ?? ucfirst(str_replace('_', ' ', $param));
                                        $subParams = [$param];
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $label ?></td>
                                        <td>
                                            <?php if (count($subParams) > 1): ?>
                                                <div class="d-flex justify-content-center">
                                                    <?php foreach ($subParams as $i => $sub): ?>
                                                        <?php
                                                        $v = $data_packing[0][$kategori][$sub][0] ?? '';
                                                        $isCheckbox = in_array($sub, ['kondisi_kemasan', 'ketepatan_labelisasi']);
                                                        ?>
                                                        <?php if ($isCheckbox): ?>
                                                            <?php $checked = ($v === 'Oke') ? 'checked' : ''; ?>
                                                            <input type="checkbox"
                                                            name="packing[0][<?= $kategori ?>][<?= $sub ?>][0]"
                                                            value="Oke" <?= $checked ?>>
                                                            <?php if ($i == 0): ?><span class="slash">/</span><?php endif; ?>
                                                        <?php else: ?>
                                                            <?php
                                                            $inputType = in_array($sub, ['jam_mulai', 'jam_selesai']) ? 'time' : 'text';
                                                            ?>
                                                            <input type="<?= $inputType ?>"
                                                            name="packing[0][<?= $kategori ?>][<?= $sub ?>][0]"
                                                            class="form-control form-control-sm <?= ($i == 0) ? 'mr-1' : '' ?>"
                                                            value="<?= htmlspecialchars($v) ?>">
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php else: ?>
                                                <?php
                                                $paramName = $subParams[0];

                                                // === PERBAIKAN UTAMA: Ambil index ke-1 untuk nama_produk & kode_produksi ===
                                                if ($paramName === 'nama_produk') {
                                                    $val = $nama_produk_index1;
                                                } elseif ($paramName === 'kode_produksi') {
                                                    $val = $kode_produksi_index1;
                                                } elseif ($paramName === 'best_before') {
                                                    // Generate best before berdasarkan kode produksi index ke-1
                                                    $kode = $kode_produksi_index1;
                                                    $val = '';
                                                    if (!empty($kode)) {
                                                        $yearCode = strtoupper(substr($kode, 0, 1));
                                                        $monthCode = strtoupper(substr($kode, 1, 1));
                                                        $day = intval(substr($kode, 2, 2));
                                                        $monthMap = ['A'=>1,'B'=>2,'C'=>3,'D'=>4,'E'=>5,'F'=>6,'G'=>7,'H'=>8,'I'=>9,'J'=>10,'K'=>11,'L'=>12];
                                                        if (isset($monthMap[$monthCode])) {
                                                            $month = $monthMap[$monthCode];
                                                            $year = 2010 + (ord($yearCode) - 65);
                                                            $date = DateTime::createFromFormat('Y-n-j', "$year-$month-$day");
                                                            if ($date) {
                                                                $date->modify('+6 months');
                                                                $val = $date->format('d.m.Y');
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $val = $data_packing[0][$kategori][$paramName][0] ?? '';
                                                }

                                                $isCheckbox = in_array($paramName, ['hasil_grinding', 'sensori_produk']);
                                                ?>
                                                <?php if ($isCheckbox): ?>
                                                    <?php $checked = ($val === 'Oke') ? 'checked' : ''; ?>
                                                    <input type="checkbox"
                                                    name="packing[0][<?= $kategori ?>][<?= $paramName ?>][0]"
                                                    value="Oke" <?= $checked ?>>
                                                <?php elseif ($paramName === 'bukti_labelisasi'): ?>
                                                    <?php $imgSrc = !empty($val) ? base_url('uploads/bukti_labelisasi/' . $val) : ''; ?>
                                                    <input type="file"
                                                    name="packing[0][<?= $kategori ?>][bukti_labelisasi][0]"
                                                    accept="image/*" class="form-control form-control-sm">
                                                    <?php if ($imgSrc): ?>
                                                        <div style="margin-top:6px;">
                                                            <a href="<?= $imgSrc ?>" target="_blank" style="text-decoration:none;color:#007bff;">
                                                                <i class="fas fa-image"></i> Lihat Label
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <input type="text"
                                                    name="packing[0][<?= $kategori ?>][<?= $paramName ?>][0]"
                                                    class="form-control form-control-sm"
                                                    value="<?= htmlspecialchars($val) ?>"
                                                    <?= in_array($paramName, ['nama_produk','kode_produksi','best_before']) ? : '' ?>>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
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
                        <div class="invalid-feedback <?= !empty(form_error('catatan_packing')) ? 'd-block' : '' ; ?>">
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
    .breadcrumb { background-color:#2E86C1; }
    .d-flex { display:flex; }
    .mr-1 { margin-right:0.25rem; }
    input[type="checkbox"] {
        transform: scale(1.6);
        margin: 4px auto;
        display: block;
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        function calculateBestBefore(kode) {
            if (!kode || kode.length < 4) return '';
            const yearCode = kode.charAt(0).toUpperCase();
            const monthCode = kode.charAt(1).toUpperCase();
            const day = parseInt(kode.substring(2, 4), 10);
            const monthMap = {A:1,B:2,C:3,D:4,E:5,F:6,G:7,H:8,I:9,J:10,K:11,L:12};
            const month = monthMap[monthCode] || 1;
            const yearBase = 2010;
            const year = yearBase + (yearCode.charCodeAt(0) - 65);
            if (isNaN(day) || !monthMap[monthCode]) return '';
            const date = new Date(year, month - 1, day);
            date.setMonth(date.getMonth() + 6);
            const d = String(date.getDate()).padStart(2, '0');
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const y = date.getFullYear();
            return `${d}.${m}.${y}`;
        }

        document.querySelectorAll('input[name*="[kode_produksi]"]').forEach((input) => {
            input.addEventListener('input', function () {
                const kode = this.value.trim();
                const name = this.name;
                const match = name.match(/packing\[(\d+)\]\[(.*?)\]\[kode_produksi\]\[0\]/);
                if (!match) return;
                const col = match[1];
                const kategori = match[2];
                const bestBeforeInput = document.querySelector(
                    `input[name="packing[${col}][${kategori}][best_before][0]"]`
                );
                if (bestBeforeInput) {
                    bestBeforeInput.value = calculateBestBefore(kode);
                }
            });

            const kode = input.value.trim();
            if (kode) {
                const name = input.name;
                const match = name.match(/packing\[(\d+)\]\[(.*?)\]\[kode_produksi\]\[0\]/);
                if (match) {
                    const col = match[1];
                    const kategori = match[2];
                    const bestBeforeInput = document.querySelector(
                        `input[name="packing[${col}][${kategori}][best_before][0]"]`
                    );
                    if (bestBeforeInput) {
                        bestBeforeInput.value = calculateBestBefore(kode);
                    }
                }
            }
        });

        // === AUTO HITUNG LAMA AGING ===
        function hitungLamaAging(jamMulai, jamSelesai) {
            if (!jamMulai || !jamSelesai) return '';
            const [mulaiJam, mulaiMenit] = jamMulai.split(':').map(Number);
            const [selesaiJam, selesaiMenit] = jamSelesai.split(':').map(Number);
            let mulai = new Date(0, 0, 0, mulaiJam, mulaiMenit);
            let selesai = new Date(0, 0, 0, selesaiJam, selesaiMenit);
            if (selesai < mulai) selesai.setDate(selesai.getDate() + 1);
            const diff = selesai - mulai;
            const jam = Math.floor(diff / (1000 * 60 * 60));
            const menit = Math.floor((diff / (1000 * 60)) % 60);
            return `${jam} jam${menit > 0 ? ' ' + menit + ' menit' : ''}`;
        }

        document.querySelectorAll('input[name*="[jam_mulai]"]').forEach((mulaiInput) => {
            mulaiInput.addEventListener('change', function () {
                const name = this.name;
                const match = name.match(/packing\[(\d+)\]\[(.*?)\]\[jam_mulai\]\[0\]/);
                if (!match) return;
                const col = match[1];
                const kategori = match[2];
                const selesaiInput = document.querySelector(
                    `input[name="packing[${col}][${kategori}][jam_selesai][0]"]`
                );
                const agingInput = document.querySelector(
                    `input[name="packing[${col}][${kategori}][lama_aging][0]"]`
                );
                if (selesaiInput && agingInput) {
                    const hasil = hitungLamaAging(this.value, selesaiInput.value);
                    agingInput.value = hasil;
                }
            });
        });

        document.querySelectorAll('input[name*="[jam_selesai]"]').forEach((selesaiInput) => {
            selesaiInput.addEventListener('change', function () {
                const name = this.name;
                const match = name.match(/packing\[(\d+)\]\[(.*?)\]\[jam_selesai\]\[0\]/);
                if (!match) return;
                const col = match[1];
                const kategori = match[2];
                const mulaiInput = document.querySelector(
                    `input[name="packing[${col}][${kategori}][jam_mulai][0]"]`
                );
                const agingInput = document.querySelector(
                    `input[name="packing[${col}][${kategori}][lama_aging][0]"]`
                );
                if (mulaiInput && agingInput) {
                    const hasil = hitungLamaAging(mulaiInput.value, this.value);
                    agingInput.value = hasil;
                }
            });
        });
    });
</script>
