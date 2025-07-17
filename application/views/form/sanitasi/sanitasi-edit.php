<?php
$sanitasi_data = json_decode($sanitasi->area, true);

if (!is_array($sanitasi_data)) {
    echo "<div class='alert alert-danger'>Data area tidak valid.</div>";
    $sanitasi_data = [];
}
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('sanitasi')?>"><i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Sanitasi</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('sanitasi/edit/'.$sanitasi->uuid); ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?>" value="<?= $sanitasi->date ?>">
                        <div class="invalid-feedback <?= form_error('date') ? 'd-block' : '' ?>"><?= form_error('date') ?></div>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                            <option value="1" <?= $sanitasi->shift == '1' ? 'selected' : '' ?>>Shift 1</option>
                            <option value="2" <?= $sanitasi->shift == '2' ? 'selected' : '' ?>>Shift 2</option>
                            <option value="3" <?= $sanitasi->shift == '3' ? 'selected' : '' ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback <?= form_error('shift') ? 'd-block' : '' ?>"><?= form_error('shift') ?></div>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Pukul</label>
                        <input type="time" name="waktu" class="form-control <?= form_error('waktu') ? 'invalid' : '' ?>" value="<?= $sanitasi->waktu ?>">
                        <div class="invalid-feedback <?= form_error('waktu') ? 'd-block' : '' ?>"><?= form_error('waktu') ?></div>
                    </div>
                </div>

                <hr>
                <label class="form-label font-weight-bold">Hasil Pemeriksaan</label>

                <?php foreach ($sanitasi_data as $i => $detail): ?>
                    <div class="sanitasi-group border p-3 mb-3 rounded bg-light">
                        <div class="form-group row align-items-end">
                            <div class="col-sm-2">
                                <label>Area</label>
                                <input type="text" class="form-control" name="sub_area[]" value="<?= $detail['sub_area'] ?>" readonly>
                            </div>
                            <div class="col-sm-2">
                                <label>Standar (ppm)</label>
                                <input type="text" class="form-control" name="standar[]" value="<?= $detail['standar'] ?>" readonly>
                            </div>
                            <div class="col-sm-2">
                                <label>Aktual</label>
                                <input type="text" class="form-control" name="aktual[]" value="<?= $detail['aktual'] ?>">
                            </div>
                            <div class="col-sm-2">
                                <label>Suhu Air</label>
                                <input type="text" class="form-control" name="suhu_air[]" value="<?= $detail['suhu_air'] ?>">
                            </div>
                            <div class="col-sm-2">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="keterangan[]" value="<?= $detail['keterangan'] ?>">
                            </div>
                            <div class="col-sm-2">
                                <label>Tindakan</label>
                                <input type="text" class="form-control" name="tindakan[]" value="<?= $detail['tindakan'] ?>">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <label>Upload Gambar</label>
                                <input type="file" class="form-control" name="gambar[]">
                                <?php if (!empty($detail['gambar'])): ?>
                                    <small><a href="<?= base_url('uploads/sanitasi/' . $detail['gambar']) ?>" target="_blank">Lihat Gambar Sebelumnya</a></small>
                                    <input type="hidden" name="gambar_lama[]" value="<?= $detail['gambar'] ?>">
                                <?php else: ?>
                                    <input type="hidden" name="gambar_lama[]" value="">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"><?= $sanitasi->catatan ?></textarea>
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
