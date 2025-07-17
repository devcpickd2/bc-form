<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('sanitasi') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Sanitasi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('sanitasi/tambah'); ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?>" value="<?= date("Y-m-d") ?>">
                        <div class="invalid-feedback <?= form_error('date') ? 'd-block' : '' ?>"><?= form_error('date') ?></div>
                    </div>
                    <?php

                    $current_time = date("H:i");
                    if ($current_time >= '23:01' || $current_time <= '07:00') {
                        $default_shift = '3'; 
                    } elseif ($current_time > '07:00' && $current_time <= '15:00') {
                        $default_shift = '1'; 
                    } else {
                        $default_shift = '2'; 
                    }
                    ?>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option value="1" <?= set_select('shift', '1', ($default_shift == '1')); ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', '2', ($default_shift == '2')); ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', '3', ($default_shift == '3')); ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('shift') ? 'd-block' : '' ?>"><?= form_error('shift') ?></div>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Pukul</label>
                        <input type="time" name="waktu" class="form-control <?= form_error('waktu') ? 'invalid' : '' ?>" value="<?= date("H:i") ?>">
                        <div class="invalid-feedback <?= form_error('waktu') ? 'd-block' : '' ?>"><?= form_error('waktu') ?></div>
                    </div>
                </div>

                <hr>
                <label class="form-label font-weight-bold">Hasil Pemeriksaan</label>

                <?php
                $plant_uuid = $this->session->userdata('plant');
                $plant_map = [
                    '651ac623-5e48-44cc-b2f6-5d622603f53c' => 'Cikande 2 Bread Crumb',
                    '1eb341e0-1ec4-4484-ba8f-32d23352b84d' => 'Salatiga Bread Crumb'
                ];

                $areas = ['Foot Basin', 'Hand Basin', 'Air Cuci Tangan', 'Air Cleaning'];

                if ($plant_uuid === '651ac623-5e48-44cc-b2f6-5d622603f53c') { 
                    $areas = ['Foot Basin', 'Hand Basin'];
                }

                $standarMap = [
                    'Foot Basin' => '200',
                    'Hand Basin' => '50',
                    'Air Cuci Tangan' => '-',
                    'Air Cleaning' => '-'
                ];

                foreach ($areas as $area): ?>
                    <div class="sanitasi-group border p-3 mb-3 rounded bg-light">
                        <div class="form-group row align-items-end">
                            <div class="col-sm-2">
                                <label>Area</label>
                                <input type="text" class="form-control" name="sub_area[]" value="<?= $area ?>" readonly>
                            </div>
                            <div class="col-sm-2">
                                <label>Standar (ppm)</label>
                                <input type="text" class="form-control" name="standar[]" value="<?= $standarMap[$area] ?>" readonly>
                            </div>
                            <div class="col-sm-2">
                                <label>Aktual</label>
                                <input type="text" class="form-control" name="aktual[]">
                            </div>
                            <div class="col-sm-2">
                                <label>Suhu Air</label>
                                <input type="text" class="form-control" name="suhu_air[]">
                            </div>
                            <div class="col-sm-2">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan[]">
                            </div>
                            <div class="col-sm-2 mt-2">
                                <label>Tindakan</label>
                                <input type="text" class="form-control" name="tindakan[]">
                            </div>
                            <div class="col-sm-2">
                                <label>Upload Gambar</label>
                                <input type="file" class="form-control" name="gambar[]">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"></textarea>
                        <div class="invalid-feedback <?= form_error('catatan') ? 'd-block' : '' ?>"><?= form_error('catatan') ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('sanitasi') ?>" class="btn btn-md btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>
