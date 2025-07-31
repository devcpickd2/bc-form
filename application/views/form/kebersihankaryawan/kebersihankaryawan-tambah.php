<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Kebersihan Karyawan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kebersihankaryawan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Kebersihan Karyawan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('kebersihankaryawan/tambah');?>" enctype="multipart/form-data">
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
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Nama</label>
                            <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'invalid' : '' ?> " value="<?= set_value('nama'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama') ?>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Bagian</label>
                            <input type="text" name="bagian" class="form-control <?= form_error('bagian') ? 'invalid' : '' ?> " value="<?= set_value('bagian'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('bagian')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('bagian') ?>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">Kebersihan</label>
                    <div class="form-group row">
                        <!-- Seragam -->
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Seragam</label><br>
                            <?php $seragam = set_value('seragam'); ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="seragam" value="ok" <?= $seragam == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="seragam" value="tidak oke" <?= $seragam == 'tidak oke' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Oke</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="seragam" value="tidak dipakai" <?= $seragam == 'tidak dipakai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Dipakai</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('seragam')) ? 'd-block' : '' ; ?>">
                                <?= form_error('seragam') ?>
                            </div>
                        </div>

                        <!-- Apron -->
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Apron</label><br>
                            <?php $apron = set_value('apron'); ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="apron" value="ok" <?= $apron == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="apron" value="tidak oke" <?= $apron == 'tidak oke' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Oke</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="apron" value="tidak dipakai" <?= $apron == 'tidak dipakai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Dipakai</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('apron')) ? 'd-block' : '' ; ?>">
                                <?= form_error('apron') ?>
                            </div>
                        </div>

                        <!-- Tangan dan Kuku -->
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Tangan dan Kuku</label><br>
                            <?php $tangan_kuku = set_value('tangan_kuku'); ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tangan_kuku" value="ok" <?= $tangan_kuku == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tangan_kuku" value="tidak oke" <?= $tangan_kuku == 'tidak oke' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Oke</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tangan_kuku" value="tidak dipakai" <?= $tangan_kuku == 'tidak dipakai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Dipakai</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('tangan_kuku')) ? 'd-block' : '' ; ?>">
                                <?= form_error('tangan_kuku') ?>
                            </div>
                        </div>

                        <!-- Kosmetik -->
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Kosmetik</label><br>
                            <?php $kosmetik = set_value('kosmetik'); ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kosmetik" value="ok" <?= $kosmetik == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kosmetik" value="tidak oke" <?= $kosmetik == 'tidak oke' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Oke</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kosmetik" value="tidak dipakai" <?= $kosmetik == 'tidak dipakai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Dipakai</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('kosmetik')) ? 'd-block' : '' ; ?>">
                                <?= form_error('kosmetik') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Perhiasan</label><br>
                            <?php foreach (['ok' => 'Ok', 'tidak oke' => 'Tidak Oke', 'tidak dipakai' => 'Tidak Dipakai'] as $val => $label): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="perhiasan" value="<?= $val ?>" <?= set_value('perhiasan') == $val ? 'checked' : '' ?>>
                                    <label class="form-check-label"><?= $label ?></label>
                                </div>
                            <?php endforeach; ?>
                            <div class="invalid-feedback <?= !empty(form_error('perhiasan')) ? 'd-block' : '' ; ?>">
                                <?= form_error('perhiasan') ?>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Masker</label><br>
                            <?php foreach (['ok' => 'Ok', 'tidak oke' => 'Tidak Oke', 'tidak dipakai' => 'Tidak Dipakai'] as $val => $label): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="masker" value="<?= $val ?>" <?= set_value('masker') == $val ? 'checked' : '' ?>>
                                    <label class="form-check-label"><?= $label ?></label>
                                </div>
                            <?php endforeach; ?>
                            <div class="invalid-feedback <?= !empty(form_error('masker')) ? 'd-block' : '' ; ?>">
                                <?= form_error('masker') ?>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Topi / Hairnet</label><br>
                            <?php foreach (['ok' => 'Ok', 'tidak oke' => 'Tidak Oke', 'tidak dipakai' => 'Tidak Dipakai'] as $val => $label): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="topi_hairnet" value="<?= $val ?>" <?= set_value('topi_hairnet') == $val ? 'checked' : '' ?>>
                                    <label class="form-check-label"><?= $label ?></label>
                                </div>
                            <?php endforeach; ?>
                            <div class="invalid-feedback <?= !empty(form_error('topi_hairnet')) ? 'd-block' : '' ; ?>">
                                <?= form_error('topi_hairnet') ?>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Sepatu Kerja</label><br>
                            <?php foreach (['ok' => 'Ok', 'tidak oke' => 'Tidak Oke', 'tidak dipakai' => 'Tidak Dipakai'] as $val => $label): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sepatu" value="<?= $val ?>" <?= set_value('sepatu') == $val ? 'checked' : '' ?>>
                                    <label class="form-check-label"><?= $label ?></label>
                                </div>
                            <?php endforeach; ?>
                            <div class="invalid-feedback <?= !empty(form_error('sepatu')) ? 'd-block' : '' ; ?>">
                                <?= form_error('sepatu') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tindakan Koreksi</label>
                            <textarea class="form-control" name="tindakan"></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('tindakan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('tindakan') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('catatan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('kebersihankaryawan')?>" class="btn btn-md btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>