<?php
// Decode langsung di view
$bagian_list = json_decode($larutan->nama_bahan, true);
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('larutan') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Verifikasi Pembuatan Larutan Cleaning dan Sanitasi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('larutan/edit/' . $larutan->uuid); ?>">

                <div class="form-row mb-3">
                    <div class="col-md-4">
                        <label><strong>Tanggal</strong></label>
                        <input type="date" name="date" class="form-control form-control-sm <?= form_error('date') ? 'is-invalid' : '' ?>" value="<?= $larutan->date ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-md-4">
                        <label><strong>Shift</strong></label>
                        <select class="form-control form-control-sm <?= form_error('shift') ? 'is-invalid' : '' ?>" name="shift">
                            <option value="1" <?= $larutan->shift == 1 ? 'selected' : '' ?>>Shift 1</option>
                            <option value="2" <?= $larutan->shift == 2 ? 'selected' : '' ?>>Shift 2</option>
                            <option value="3" <?= $larutan->shift == 3 ? 'selected' : '' ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift') ?></div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm align-middle">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Nama Bahan</th>
                                <th>Kadar</th>
                                <th>Kimia (ml)</th>
                                <th>Air (ml)</th>
                                <th>Volume</th>
                                <th>Kebutuhan</th>
                                <th>Keterangan<br>(Sesuai)</th>
                                <th>Tindakan Koreksi</th>
                                <th>Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bagian_list as $i => $row): ?>
                                <tr>
                                    <td>
                                        <?= $row['bahan'] ?>
                                        <input type="hidden" name="bahan[]" value="<?= $row['bahan'] ?>">
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" name="kadar[]" value="<?= $row['kadar'] ?>" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="bahan_kimia[]" value="<?= $row['bahan_kimia'] ?>"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="air_bersih[]" value="<?= $row['air_bersih'] ?>"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="volume_akhir[]" value="<?= $row['volume_akhir'] ?>"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="kebutuhan[]" value="<?= $row['kebutuhan'] ?>"></td>
                                    <td class="text-center">
                                        <input type="checkbox" name="keterangan[<?= $i ?>]" value="Sesuai" <?= isset($row['keterangan']) && $row['keterangan'] === 'Sesuai' ? 'checked' : '' ?>>
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" name="tindakan[]" value="<?= $row['tindakan'] ?>"></td>
                                    <td><input type="text" class="form-control form-control-sm" name="verifikasi[]" value="<?= $row['verifikasi'] ?>"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="form-group mt-3">
                    <label>Catatan</label>
                    <textarea class="form-control form-control-sm" name="catatan" rows="2"><?= $larutan->catatan ?></textarea>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('larutan') ?>" class="btn btn-danger">
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
</style>
