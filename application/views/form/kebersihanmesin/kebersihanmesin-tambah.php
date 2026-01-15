<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Kebersihan dan Sanitasi setelah Perbaikan Mesin</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kebersihanmesin')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Kebersihan dan Sanitasi setelah Perbaikan Mesin</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('kebersihanmesin/tambah');?>" enctype="multipart/form-data">
                    <?php
                    $produksi_data = $this->session->userdata('produksi_data');
                    $tanggal_sess = $produksi_data['tanggal'] ?? date('Y-m-d');
                    $shift_sess = $produksi_data['shift'] ?? '';
                    ?>
                    <div class="form-group row">
                        <div class="col-md-6">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>"
                        value="<?= set_value('date', $tanggal_sess) ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Mesin / Peralatan</label>
                        <input type="text" name="mesin" class="form-control <?= form_error('mesin') ? 'invalid' : '' ?> " value="<?= set_value('mesin'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('mesin')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('mesin') ?>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Jenis Perbaikan</label>
                        <input type="text" name="perbaikan" class="form-control <?= form_error('perbaikan') ? 'invalid' : '' ?> " value="<?= set_value('perbaikan'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('perbaikan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('perbaikan') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Area</label>
                        <input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?> " value="<?= set_value('area'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('area')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('area') ?>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Tanggal Perbaikan</label>
                        <input type="date" name="tgl_perbaikan" class="form-control <?= form_error('tgl_perbaikan') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tgl_perbaikan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('tgl_perbaikan') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold d-block">Kondisi</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('kondisi') ? 'is-invalid' : '' ?>" 
                            type="radio" 
                            name="kondisi" 
                            id="kondisiBersih" 
                            value="Bersih" 
                            <?= set_value('kondisi') == 'Bersih' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="kondisiBersih">Bersih</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('kondisi') ? 'is-invalid' : '' ?>" 
                            type="radio" 
                            name="kondisi" 
                            id="kondisiKotor" 
                            value="Kotor" 
                            <?= set_value('kondisi') == 'Kotor' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="kondisiKotor">Kotor</label>
                        </div>
                        <div class="invalid-feedback d-block">
                            <?= form_error('kondisi') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold d-block">Spare Part</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('spare_part') ? 'is-invalid' : '' ?>" 
                            type="radio" 
                            name="spare_part" 
                            id="sparePartAda" 
                            value="Ada" 
                            <?= set_value('spare_part') == 'Ada' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="sparePartAda">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('spare_part') ? 'is-invalid' : '' ?>" 
                            type="radio" 
                            name="spare_part" 
                            id="sparePartTidakAda" 
                            value="Tidak Ada" 
                            <?= set_value('spare_part') == 'Tidak Ada' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="sparePartTidakAda">Tidak Ada</label>
                        </div>
                        <div class="invalid-feedback d-block">
                            <?= form_error('spare_part') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('keterangan') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('kebersihanmesin')?>" class="btn btn-md btn-danger">
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