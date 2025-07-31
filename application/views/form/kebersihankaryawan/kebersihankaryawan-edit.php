<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Kebersihan Karyawan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kebersihankaryawan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Kebersihan Karyawan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('kebersihankaryawan/edit/'.$kebersihankaryawan->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $kebersihankaryawan->date; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $kebersihankaryawan->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $kebersihankaryawan->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $kebersihankaryawan->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Nama</label>
                            <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'invalid' : '' ?> " value="<?= $kebersihankaryawan->nama; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama') ?>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Bagian</label>
                            <input type="text" name="bagian" class="form-control <?= form_error('bagian') ? 'invalid' : '' ?> " value="<?= $kebersihankaryawan->bagian; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('bagian')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('bagian') ?>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">Kebersihan</label>
                    <div class="form-group row">
                       <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Seragam</label><br>
                        <?php
                        $seragam = set_value('seragam', isset($kebersihankaryawan->seragam) ? $kebersihankaryawan->seragam : '');
                        ?>
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
                        <?php
                        $apron = set_value('apron', isset($kebersihankaryawan->apron) ? $kebersihankaryawan->apron : '');
                        ?>
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
                        <?php
                        $tangan_kuku = set_value('tangan_kuku', isset($kebersihankaryawan->tangan_kuku) ? $kebersihankaryawan->tangan_kuku : '');
                        ?>
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
                        <?php
                        $kosmetik = set_value('kosmetik', isset($kebersihankaryawan->kosmetik) ? $kebersihankaryawan->kosmetik : '');
                        ?>
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
                    <?php
                    $perhiasan = set_value('perhiasan', isset($kebersihankaryawan->perhiasan) ? $kebersihankaryawan->perhiasan : '');
                    foreach (['ok' => 'Ok', 'tidak oke' => 'Tidak Oke', 'tidak dipakai' => 'Tidak Dipakai'] as $val => $label): 
                        ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="perhiasan" value="<?= $val ?>" <?= $perhiasan == $val ? 'checked' : '' ?>>
                            <label class="form-check-label"><?= $label ?></label>
                        </div>
                    <?php endforeach; ?>
                    <div class="invalid-feedback <?= !empty(form_error('perhiasan')) ? 'd-block' : '' ; ?>">
                        <?= form_error('perhiasan') ?>
                    </div>
                </div>

                <div class="col-sm-3">
                    <label class="form-label font-weight-bold">Masker</label><br>
                    <?php
                    $masker = set_value('masker', isset($kebersihankaryawan->masker) ? $kebersihankaryawan->masker : '');
                    foreach (['ok' => 'Ok', 'tidak oke' => 'Tidak Oke', 'tidak dipakai' => 'Tidak Dipakai'] as $val => $label): 
                        ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="masker" value="<?= $val ?>" <?= $masker == $val ? 'checked' : '' ?>>
                            <label class="form-check-label"><?= $label ?></label>
                        </div>
                    <?php endforeach; ?>
                    <div class="invalid-feedback <?= !empty(form_error('masker')) ? 'd-block' : '' ; ?>">
                        <?= form_error('masker') ?>
                    </div>
                </div>

                <div class="col-sm-3">
                    <label class="form-label font-weight-bold">Topi / Hairnet</label><br>
                    <?php
                    $topi_hairnet = set_value('topi_hairnet', isset($kebersihankaryawan->topi_hairnet) ? $kebersihankaryawan->topi_hairnet : '');
                    foreach (['ok' => 'Ok', 'tidak oke' => 'Tidak Oke', 'tidak dipakai' => 'Tidak Dipakai'] as $val => $label): 
                        ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topi_hairnet" value="<?= $val ?>" <?= $topi_hairnet == $val ? 'checked' : '' ?>>
                            <label class="form-check-label"><?= $label ?></label>
                        </div>
                    <?php endforeach; ?>
                    <div class="invalid-feedback <?= !empty(form_error('topi_hairnet')) ? 'd-block' : '' ; ?>">
                        <?= form_error('topi_hairnet') ?>
                    </div>
                </div>

                <div class="col-sm-3">
                    <label class="form-label font-weight-bold">Sepatu Kerja</label><br>
                    <?php
                    $sepatu = set_value('sepatu', isset($kebersihankaryawan->sepatu) ? $kebersihankaryawan->sepatu : '');
                    foreach (['ok' => 'Ok', 'tidak oke' => 'Tidak Oke', 'tidak dipakai' => 'Tidak Dipakai'] as $val => $label): 
                        ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sepatu" value="<?= $val ?>" <?= $sepatu == $val ? 'checked' : '' ?>>
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
                    <textarea class="form-control" name="tindakan"><?= $kebersihankaryawan->tindakan; ?></textarea>
                    <div class="invalid-feedback <?= !empty(form_error('tindakan')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('tindakan') ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="form-label font-weight-bold">Catatan</label>
                    <textarea class="form-control" name="catatan"><?= $kebersihankaryawan->catatan; ?></textarea>
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