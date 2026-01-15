<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Sanitasi</h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-white" href="<?= base_url('sanitasi') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Sanitasi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('sanitasi/tambah'); ?>" enctype="multipart/form-data">

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

                <div class="col-md-3">
                    <label class="font-weight-bold">Pukul</label>
                    <input type="time" name="waktu" class="form-control <?= form_error('waktu') ? 'is-invalid' : '' ?>" value="<?= date("H:i") ?>">
                    <div class="invalid-feedback"><?= form_error('waktu') ?></div>
                </div>
            </div>

            <hr>
            <label class="font-weight-bold">Hasil Pemeriksaan</label>

            <?php
            $plant_uuid = $this->session->userdata('plant');
            $plant_map = [
                '651ac623-5e48-44cc-b2f6-5d622603f53c' => 'Cikande 2 Bread Crumb',
                '1eb341e0-1ec4-4484-ba8f-32d23352b84d' => 'Salatiga Bread Crumb'
            ];

            $areas = ($plant_uuid === '651ac623-5e48-44cc-b2f6-5d622603f53c') ?
            ['Foot Basin', 'Hand Basin'] :
            ['Foot Basin', 'Hand Basin', 'Air Cuci Tangan', 'Air Cleaning'];

            $standarMap = [
                'Foot Basin' => '200',
                'Hand Basin' => '50',
                'Air Cuci Tangan' => '-',
                'Air Cleaning' => '-'
            ];
            ?>

            <div class="table-responsive">
                <table class="table table-bordered small">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>Area</th>
                            <th>Standar (ppm)</th>
                            <th>Aktual</th>
                            <th>Suhu Air</th>
                            <th>Keterangan</th>
                            <th>Tindakan</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($areas as $area): ?>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="sub_area[]" value="<?= $area ?>" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="standar[]" value="<?= $standarMap[$area] ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="aktual[]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="suhu_air[]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="keterangan[]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="tindakan[]">
                                </td>
                                <td>
                                    <input type="file" class="form-control-file" name="gambar[]">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Catatan -->
            <div class="form-group">
                <label class="font-weight-bold">Catatan</label>
                <textarea class="form-control <?= form_error('catatan') ? 'is-invalid' : '' ?>" name="catatan"></textarea>
                <div class="invalid-feedback"><?= form_error('catatan') ?></div>
            </div>

            <!-- Buttons -->
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <a href="<?= base_url('sanitasi') ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Batal
                </a>
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
        color: white;
        font-weight: bold;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .table td input[type="text"],
    .table td input[type="file"] {
        height: 30px;
        font-size: 0.85rem;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 13px;
        }
    }
</style>
