<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Verifikasi Proses Produksi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('proses') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Verifikasi Proses Produksi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('proses/tambah'); ?>">
                <?php
                $produksi_data = $this->session->userdata('produksi_data');
                $tanggal_sess = $produksi_data['tanggal'] ?? date('Y-m-d');
                $shift_sess = $produksi_data['shift'] ?? '';
                ?>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>"
                        value="<?= set_value('date', $tanggal_sess) ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Shift</label>
                        <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
                            <option disabled <?= empty($shift_sess) ? 'selected' : '' ?>>Pilih Shift</option>
                            <option value="1" <?= set_select('shift', '1', $shift_sess == '1') ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', '2', $shift_sess == '2') ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', '3', $shift_sess == '3') ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift') ?></div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Nama Produk</label>
                        <select name="nama_produk" id="select_nama_produk" class="form-control <?= form_error('nama_produk') ? 'is-invalid' : '' ?>">
                            <option value="">-- Pilih Produk --</option>
                            <?php foreach ($produk_list as $produk): ?>
                                <option value="<?= $produk->nama_produk ?>" <?= set_value('nama_produk') == $produk->nama_produk ? 'selected' : '' ?>>
                                    <?= $produk->nama_produk ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback <?= form_error('nama_produk') ? 'd-block' : '' ?>">
                            <?= form_error('nama_produk') ?>
                        </div>
                    </div>
                </div>

                <?php 
                $proses_produksi = [
                    'dough_mixing' => [
                        ['label' => 'Acuan No. Dokumen / Revisi', 'params' => ['dokumen', 'revisi']],
                        'no_formula',
                        'nama_produk',
                        'kode_produksi'
                    ],
                    'kondisi_rm' => [
                        'tepung_terigu', 'tepung_tapioka', 'yeast', 'bread_improver', 'premix', 'shortening', 'chill_water'
                    ],
                    'mixing' => [
                        ['label' => 'Waktu Mixing (menit speed 1 / speed 2)', 'params' => ['waktu_mixing_1', 'waktu_mixing_2']],
                        'sensori',
                        'suhu_adonan',
                        'berat_adonan'
                    ],
                    'proofing' => [
                        ['label' => 'Jam Mulai / Selesai', 'params' => ['jam_mulai', 'jam_selesai']],
                        ['label' => 'Suhu Setting / Aktual (34 - 36°C)', 'params' => ['suhu_setting', 'suhu_aktual']],
                        ['label' => 'RH Setting / Aktual (78 - 82%)', 'params' => ['rh_setting', 'rh_aktual']],
                        'durasi_waktu',
                        'hasil_proofing'
                    ],
                    'electric_baking' => [
                        ['label' => 'Baking Time (High / Low)', 'params' => ['baking_time_high', 'baking_time_low']], 
                    ],
                    'hasil_baking' => [
                        'suhu_produk',
                        'sensori_produk'
                    ]
                ];

                $label_param = [
                    'dokumen' => 'Acuan Dokumen',
                    'revisi' => 'Revisi',
                    'no_formula' => 'No. Formula',
                    'nama_produk' => 'Jenis Produk',
                    'kode_produksi' => 'Kode Produksi',
                    'tepung_terigu' => 'Tepung Terigu',
                    'tepung_tapioka' => 'Tepung Tapioka',
                    'yeast' => 'Yeast',
                    'bread_improver' => 'Bread Improver',
                    'premix' => 'Premix',
                    'shortening' => 'Shortening',
                    'chill_water' => 'Chill Water (14 - 16°C)',
                    'waktu_mixing_1' => 'Waktu Mixing 1',
                    'waktu_mixing_2' => 'Waktu Mixing 2',
                    'sensori' => 'Sensori',
                    'suhu_adonan' => 'Suhu Adonan (29 - 31°C)',
                    'berat_adonan' => 'Berat Adonan (630 - 670 g/pcs)',
                    'jam_mulai' => 'Jam Mulai',
                    'jam_selesai' => 'Jam Selesai',
                    'suhu_setting' => 'Suhu Setting (34 - 36°C)',
                    'suhu_aktual' => 'Suhu Aktual',
                    'rh_setting' => 'RH Setting (78 - 82%)',
                    'rh_aktual' => 'RH Aktual',
                    'durasi_waktu' => 'Durasi Waktu (60 - 70 menit)',
                    'hasil_proofing' => 'Hasil Proofing',
                    'baking_time_high' => 'Baking Time High',
                    'baking_time_low' => 'Baking Time Low',
                    'suhu_produk' => 'Suhu Produk (80 - 97°C)',
                    'sensori_produk' => 'Sensori Produk'
                ];

                $standar_berat = [
                    'tepung_terigu' => '',
                    'tepung_tapioka' => '2.270',
                    'yeast' => '0.372',
                    'bread_improver' => '',
                    'premix' => '',
                    'shortening' => '0.252',
                    'chill_water' => '18'
                ];
                ?>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 30%;">Jenis Produksi</th>
                                <th style="width: 5%;"></th>
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <th style="width: 10%;" class="text-center">Input ke-<?= $i ?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($proses_produksi as $kategori => $params): ?>
                                <tr style="background-color: #f1f1f1; font-weight:bold;">
                                    <td colspan="12">
                                        <?= ucwords(str_replace('_', ' ', $kategori)) ?>
                                        <?php if ($kategori == 'kondisi_rm'): ?>
                                            <span class="text-muted ml-2"> | Std. berat (kg)</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <?php foreach ($params as $param): ?>
                                    <?php
                                    if (is_array($param)) {
                                        $label = $param['label'];
                                        $subParams = $param['params'];
                                    } else {
                                        $label = $label_param[$param] ?? ucwords(str_replace('_', ' ', $param));
                                        $subParams = [$param];
                                    }

                                    $berat_std = ($kategori == 'kondisi_rm' && count($subParams) == 1 && isset($standar_berat[$subParams[0]])) ? $standar_berat[$subParams[0]] : '';
                                    ?>
                                    <tr>
                                        <td><?= $label ?></td>
                                        <td><?= $berat_std ?></td>
                                        <?php for ($col = 0; $col < 10; $col++): ?>
                                            <td>
                                                <?php if (count($subParams) === 1): ?>
                                                    <?php
                                                    $paramName = $subParams[0];
                                                    $value = set_value("proses_produksi[{$kategori}][{$paramName}][{$col}]");
                                                    $additionalClass = '';
                                                    if ($paramName == 'kode_produksi') {
                                                        $additionalClass = 'kode_produksi_field';
                                                    } elseif ($paramName == 'nama_produk') {
                                                        $additionalClass = 'nama_produk_array';
                                                    }
                                                    // Tentukan type input otomatis time/text
                                                    $inputType = in_array($paramName, ['jam_mulai', 'jam_selesai']) ? 'time' : 'text';
                                                    ?>
                                                    <input
                                                    type="<?= $inputType ?>"
                                                    name="proses_produksi[<?= $kategori ?>][<?= $paramName ?>][<?= $col ?>]"
                                                    class="form-control form-control-sm <?= $additionalClass ?>"
                                                    <?= ($paramName == 'kode_produksi' && $col == 0) ? 'id="kode_produksi_0"' : '' ?>
                                                    value="<?= $value ?>">
                                                <?php else: ?>
                                                    <div class="d-flex">
                                                        <?php foreach ($subParams as $i => $sub): ?>
                                                            <?php $inputType = in_array($sub, ['jam_mulai','jam_selesai']) ? 'time' : 'text'; ?>
                                                            <input type="<?= $inputType ?>"
                                                                   name="proses_produksi[<?= $kategori ?>][<?= $sub ?>][<?= $col ?>]"
                                                                   class="form-control form-control-sm <?= ($i == 0) ? 'mr-1' : '' ?>"
                                                                   style="width: 100%;"
                                                                   value="<?= set_value("proses_produksi[{$kategori}][{$sub}][{$col}]") ?>">
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

                <hr>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('catatan') ?>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('proses') ?>" class="btn btn-md btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fitur auto-fill nama_produk
        const selectNamaProduk = document.getElementById('select_nama_produk');
        const namaProdukFields = document.querySelectorAll('.nama_produk_array');

        if (selectNamaProduk) {
            selectNamaProduk.addEventListener('change', function () {
                const selectedValue = this.value;
                namaProdukFields.forEach(field => {
                    field.value = selectedValue;
                });
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const kodeInputAwal = document.getElementById('kode_produksi_0');

        if (!kodeInputAwal) return;

        kodeInputAwal.addEventListener('input', function () {
            const kodeAwal = this.value.trim();
            const inputs = document.querySelectorAll('.kode_produksi_field');

            // Pastikan kode diakhiri dua digit angka
            const match = kodeAwal.match(/^(.+?)(\d{2})$/);
            if (!match) {
                for (let i = 1; i < inputs.length; i++) {
                    inputs[i].value = '';
                }
                return;
            }

            const prefix = match[1];
            const startNum = parseInt(match[2]);

            for (let i = 1; i < inputs.length; i++) {
                const num = (startNum + i).toString().padStart(2, '0');
                inputs[i].value = `${prefix}${num}`;
            }
        });
    });
</script>

<style type="text/css">
    .breadcrumb {
        background-color: #2E86C1;
    }
    .d-flex {
        display: flex;
    }
    .mr-1 {
        margin-right: 0.25rem;
    }
</style>
