<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Kondisi Kerja Selama Produksi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kondisikerja') ?>"><i class="fas fa-arrow-left"></i> Daftar Kondisi Kerja Selama Produksi</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('kondisikerja/tambah'); ?>" enctype="multipart/form-data">
                <!-- Baris 1: Tanggal, Shift, Jam -->

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
                    <label><strong>Pukul</strong></label>
                    <input type="time" name="waktu" class="form-control <?= form_error('waktu') ? 'is-invalid' : '' ?>" value="<?= date('H:i') ?>">
                    <div class="invalid-feedback"><?= form_error('waktu') ?></div>
                </div>
                <div class="col-sm-3">
                    <label><strong>Area</strong></label>
                    <input type="text" name="area" class="form-control <?= form_error('area') ? 'is-invalid' : '' ?>" value="<?= set_value('area') ?>">
                    <div class="invalid-feedback"><?= form_error('area') ?></div>
                </div>
            </div>

            <?php
            $options = [
                '1' => '1. Berdebu',
                '2' => '2. Basah, ada genangan air',
                '3' => '3. Sisa produksi (remah-remah roti, tepung, sisa adonan)',
                '4' => '4. Noda (karat, cat, tinta)',
                '5' => '5. Pertumbuhan Mikroorganisme (jamur, bau busuk, biofilm)',
                '6' => '6. Kontak / kontaminasi material non halal',
                '7' => '7. Higiene karyawan tidak sesuai GMP',
                '✓' => '✓ Ok, Sesuai SSOP, bersih, bebas najis / material non halal',
                'X' => 'X Tidak Ok, tidak sesuai SSOP',
                '-' => '- Tidak ada / Tidak digunakan'
            ];
            ?>

            <!-- Pemeriksaan Higiene Karyawan -->
            <hr>
            <label><strong>HIGIENE KARYAWAN</strong></label>
            <div class="form-group row">
                <div class="col-md-3">
                    <label>Kondisi</label>
                    <select name="kondisi_higiene" class="form-control <?= form_error('kondisi_higiene') ? 'is-invalid' : '' ?>">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($options as $val => $label): ?>
                            <option value="<?= $val ?>" <?= set_select('kondisi_higiene', $val) ?>><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"><?= form_error('kondisi_higiene') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Problem</label>
                    <input type="text" name="problem_higiene" class="form-control <?= form_error('problem_higiene') ? 'is-invalid' : '' ?>" value="<?= set_value('problem_higiene') ?>">
                    <div class="invalid-feedback"><?= form_error('problem_higiene') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Tindakan Koreksi</label>
                    <input type="text" name="tindakan_higiene" class="form-control <?= form_error('tindakan_higiene') ? 'is-invalid' : '' ?>" value="<?= set_value('tindakan_higiene') ?>">
                    <div class="invalid-feedback"><?= form_error('tindakan_higiene') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Verifikasi</label>
                    <input type="text" name="verifikasi_higiene" class="form-control <?= form_error('verifikasi_higiene') ? 'is-invalid' : '' ?>" value="<?= set_value('verifikasi_higiene') ?>">
                    <div class="invalid-feedback"><?= form_error('verifikasi_higiene') ?></div>
                </div>
            </div>

            <!-- Pemeriksaan Kebersihan Area -->
            <hr>
            <label><strong>KEBERSIHAN AREA/RUANGAN</strong></label>
            <div class="form-group row">
                <div class="col-md-3">
                    <label>Kondisi</label>
                    <select name="kondisi_kebersihan" class="form-control <?= form_error('kondisi_kebersihan') ? 'is-invalid' : '' ?>">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($options as $val => $label): ?>
                            <option value="<?= $val ?>" <?= set_select('kondisi_kebersihan', $val) ?>><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"><?= form_error('kondisi_kebersihan') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Problem</label>
                    <input type="text" name="problem_kebersihan" class="form-control <?= form_error('problem_kebersihan') ? 'is-invalid' : '' ?>" value="<?= set_value('problem_kebersihan') ?>">
                    <div class="invalid-feedback"><?= form_error('problem_kebersihan') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Tindakan Koreksi</label>
                    <input type="text" name="tindakan_kebersihan" class="form-control <?= form_error('tindakan_kebersihan') ? 'is-invalid' : '' ?>" value="<?= set_value('tindakan_kebersihan') ?>">
                    <div class="invalid-feedback"><?= form_error('tindakan_kebersihan') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Verifikasi</label>
                    <input type="text" name="verifikasi_kebersihan" class="form-control <?= form_error('verifikasi_kebersihan') ? 'is-invalid' : '' ?>" value="<?= set_value('verifikasi_kebersihan') ?>">
                    <div class="invalid-feedback"><?= form_error('verifikasi_kebersihan') ?></div>
                </div>
            </div>

            <!-- Pemeriksaan Kebersihan Peralatan -->
            <hr>
            <label><strong>KEBERSIHAN PERALATAN</strong></label>
            <div class="form-group row">
                <div class="col-md-3">
                    <label>Kondisi</label>
                    <select name="kondisi_peralatan" class="form-control <?= form_error('kondisi_peralatan') ? 'is-invalid' : '' ?>">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($options as $val => $label): ?>
                            <option value="<?= $val ?>" <?= set_select('kondisi_peralatan', $val) ?>><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"><?= form_error('kondisi_peralatan') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Problem</label>
                    <input type="text" name="problem_peralatan" class="form-control <?= form_error('problem_peralatan') ? 'is-invalid' : '' ?>" value="<?= set_value('problem_peralatan') ?>">
                    <div class="invalid-feedback"><?= form_error('problem_peralatan') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Tindakan Koreksi</label>
                    <input type="text" name="tindakan_peralatan" class="form-control <?= form_error('tindakan_peralatan') ? 'is-invalid' : '' ?>" value="<?= set_value('tindakan_peralatan') ?>">
                    <div class="invalid-feedback"><?= form_error('tindakan_peralatan') ?></div>
                </div>
                <div class="col-md-3">
                    <label>Verifikasi</label>
                    <input type="text" name="verifikasi_peralatan" class="form-control <?= form_error('verifikasi_peralatan') ? 'is-invalid' : '' ?>" value="<?= set_value('verifikasi_peralatan') ?>">
                    <div class="invalid-feedback"><?= form_error('verifikasi_peralatan') ?></div>
                </div>
            </div>

            <!-- Catatan -->
            <hr>
            <div class="form-group row">
                <div class="col-md-6">
                    <label><strong>Catatan Tambahan</strong></label>
                    <input type="text" name="catatan" class="form-control <?= form_error('catatan') ? 'is-invalid' : '' ?>" value="<?= set_value('catatan') ?>">
                    <div class="invalid-feedback"><?= form_error('catatan') ?></div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('kondisikerja') ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<style>
    .breadcrumb {
        background-color: #2E86C1;
    }

    .breadcrumb a {
        color: #fff;
        font-weight: bold;
    }

    .form-group label {
        font-weight: bold;
    }
</style>
