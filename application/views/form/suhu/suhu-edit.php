<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Pemeriksaan Suhu Ruang</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('suhu')?>"><i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Suhu Ruang</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    'Ruang Aging' => ['suhu' => '35 - 45', 'rh' => ''],
                    'Area Packing' => ['suhu' => '25 - 35', 'rh' => '']
                ]
            ];

            $lokasi_isi = json_decode($suhu->lokasi ?? '[]', true);
            $lokasi_data = [];
            foreach ($lokasi_isi as $row) {
                $lokasi_data[$row['nama_lokasi']] = $row;
            }
            ?>

            <form method="post" action="<?= base_url('suhu/edit/'.$suhu->uuid); ?>">

                <div class="form-group row">
                    <div class="col-md-4">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control" value="<?= set_value('date', $suhu->date) ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Shift</label>
                        <select name="shift" class="form-control">
                            <option disabled>Pilih Shift</option>
                            <option value="1" <?= set_select('shift', '1', $suhu->shift == '1') ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', '2', $suhu->shift == '2') ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', '3', $suhu->shift == '3') ?>>Shift 3</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Pukul</label>
                        <input type="time" name="pukul" class="form-control" value="<?= set_value('pukul', $suhu->pukul) ?>">
                    </div>
                </div>

                <hr>
                <h5 class="mb-3 font-weight-bold text-primary">Update Suhu & RH Tiap Lokasi</h5>

                <?php $i = 0; foreach ($lokasi_map[$plant_name] as $nama_lokasi => $standar): ?>
                <?php
                $nilai = $lokasi_data[$nama_lokasi] ?? ['suhu' => '', 'rh' => ''];
                ?>
                <div class="form-group row align-items-end mb-3">
                    <input type="hidden" name="lokasi[<?= $i ?>][nama_lokasi]" value="<?= $nama_lokasi ?>">

                    <div class="col-md-<?= $standar['rh'] ? '4 offset-md-1' : '10 offset-md-1' ?>">
                        <label class="font-weight-bold"><?= $nama_lokasi ?> - Suhu <small>(<?= $standar['suhu'] ?> °C)</small></label>
                        <input type="text" name="lokasi[<?= $i ?>][suhu]" class="form-control" value="<?= set_value("lokasi[$i][suhu]", $nilai['suhu']) ?>">
                    </div>

                    <?php if ($standar['rh']): ?>
                        <div class="col-md-4">
                            <label class="font-weight-bold"><?= $nama_lokasi ?> - RH <small>(<?= $standar['rh'] ?> %)</small></label>
                            <input type="text" name="lokasi[<?= $i ?>][rh]" class="form-control" value="<?= set_value("lokasi[$i][rh]", $nilai['rh']) ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <?php $i++; endforeach; ?>

                <hr>

                <div class="form-group">
                    <label class="font-weight-bold">Catatan</label>
                    <textarea name="catatan" class="form-control"><?= set_value('catatan', $suhu->catatan) ?></textarea>
                </div>

                <button type="submit" class="btn btn-success mr-2"><i class="fa fa-save"></i> Update</button>
                <a href="<?= base_url('suhu') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>

            </form>
        </div>
    </div>
</div>
<style>
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>
