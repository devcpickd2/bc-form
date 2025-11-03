<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Suhu Ruang</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('suhu')?>"><i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Suhu Ruang</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">

            <?php
            $plant_uuid = $this->session->userdata('plant');
            $plant_map = [
                '651ac623-5e48-44cc-b2f6-5d622603f53c' => 'Cikande',
                '1eb341e0-1ec4-4484-ba8f-32d23352b84d' => 'Salatiga'
            ];
            $plant_name = isset($plant_map[$plant_uuid]) ? $plant_map[$plant_uuid] : 'Unknown';

            $lokasi_map = [
                'Cikande' => [
                    'Ruang Produksi' => ['suhu' => '25 - 35', 'rh' => '65 - 80'],
                    'Gudang Premix' => ['suhu' => '15 - 22', 'rh' => '45 - 55'],
                    'Gudang Raw Material' => ['suhu' => '25 - 35', 'rh' => '60 - 75'],
                    'Gudang Finish Good' => ['suhu' => '28 - 36', 'rh' => '60 - 75'],
                    'Proofing Room' => ['suhu' => '34 - 36', 'rh' => '78 - 82'],
                    'Aging Room 1' => ['suhu' => '35 - 45', 'rh' => '50 - 70'],
                    'Aging Room 2' => ['suhu' => '35 - 45', 'rh' => '50 - 70'],
                    'Ruang Produksi (Bubble)' => ['suhu' => '25 - 35', 'rh' => '65 - 80']
                ],
                'Salatiga' => [
                    'Ruang Pengayakan' => ['suhu' => '25 - 35', 'rh' => ''],
                    'Ruang RM' => ['suhu' => '15 - 22', 'rh' => ''],
                    'Chiller 1' => ['suhu' => '0 - 4', 'rh' => ''],
                    'Chiller 2' => ['suhu' => '0 - 4', 'rh' => ''],
                    'Chiller 3' => ['suhu' => '0 - 4', 'rh' => ''],
                    'Chiller 4' => ['suhu' => '0 - 4', 'rh' => ''],
                    'Chiller 5' => ['suhu' => '0 - 4', 'rh' => ''],
                    'Chiller 6' => ['suhu' => '0 - 4', 'rh' => ''],
                    'Ruang Mixing' => ['suhu' => '25 - 35', 'rh' => ''],
                    'Area Baking' => ['suhu' => '25 - 35', 'rh' => ''],
                    'Area Cutting & Grinding' => ['suhu' => '25 - 35', 'rh' => ''],
                    'Ruang Aging' => ['suhu' => '35 - 45', 'rh' => '50 - 70'],
                    'Area Packing' => ['suhu' => '25 - 35', 'rh' => '']
                ]
            ];
            ?>
            
            <?php
            $produksi_data = $this->session->userdata('produksi_data');
            $tanggal_sess = $produksi_data['tanggal'] ?? date('Y-m-d');
            $shift_sess = $produksi_data['shift'] ?? '';
            ?>

            <form class="user" method="post" action="<?= base_url('suhu/tambah'); ?>">
                <input type="hidden" name="plant" value="<?= $plant_name ?>">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>"
                        value="<?= set_value('date', $tanggal_sess) ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Shift</label>
                        <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
                            <option disabled <?= empty($shift_sess) ? 'selected' : '' ?>>Pilih Shift</option>
                            <option value="1" <?= set_select('shift', '1', $shift_sess == '1') ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', '2', $shift_sess == '2') ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', '3', $shift_sess == '3') ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift') ?></div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Pukul</label>
                        <input type="time" name="pukul" class="form-control <?= form_error('pukul') ? 'is-invalid' : '' ?>" 
                        value="<?= set_value('pukul', date('H:00')) ?>" step="3600">
                        <div class="invalid-feedback"><?= form_error('pukul') ?></div>
                    </div>
                </div>

                <hr>
                <h5 class="mb-3 font-weight-bold text-primary">Input Suhu & RH Tiap Lokasi</h5>

                <?php $i = 0; foreach ($lokasi_map[$plant_name] as $nama_lokasi => $data): ?>
                <div class="form-group row align-items-end mb-3">
                    <input type="hidden" name="lokasi[<?= $i ?>][nama_lokasi]" value="<?= $nama_lokasi ?>">

                    <div class="col-md-<?= $data['rh'] ? '4 offset-md-1' : '4 offset-md-1' ?>">
                      <label class="font-weight-bold"><?= $nama_lokasi ?> - Suhu <small>(<?= $data['suhu'] ?> °C)</small></label>
                      <input type="text" name="lokasi[<?= $i ?>][suhu]" class="form-control" value="<?= set_value("lokasi[$i][suhu]") ?>">
                  </div>

                  <?php if ($data['rh']): ?>
                      <div class="col-md-4">
                        <label class="font-weight-bold"><?= $nama_lokasi ?> - RH <small>(<?= $data['rh'] ?> %)</small></label>
                        <input type="text" name="lokasi[<?= $i ?>][rh]" class="form-control" value="<?= set_value("lokasi[$i][rh]") ?>">
                    </div>
                <?php endif; ?>
            </div>
            <?php $i++; endforeach; ?>


            <hr>

            <div class="form-group">
                <label class="font-weight-bold">Catatan</label>
                <textarea name="catatan" class="form-control"><?= set_value('catatan') ?></textarea>
                <div class="invalid-feedback <?= form_error('catatan') ? 'd-block' : '' ?>">
                    <?= form_error('catatan') ?>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?= base_url('suhu') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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
