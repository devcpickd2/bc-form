<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaaan Kebersihan dan Sanitasi setelah Perbaikan Mesin</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kebersihanmesin')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Kebersihan dan Sanitasi setelah Perbaikan Mesin</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('kebersihanmesin/edit/'.$kebersihanmesin->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $kebersihanmesin->date; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $kebersihanmesin->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $kebersihanmesin->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $kebersihanmesin->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Mesin / Peralatan</label>
                            <input type="text" name="mesin" class="form-control <?= form_error('mesin') ? 'invalid' : '' ?> " value="<?= $kebersihanmesin->mesin; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('mesin')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('mesin') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jenis Perbaikan</label>
                            <input type="text" name="perbaikan" class="form-control <?= form_error('perbaikan') ? 'invalid' : '' ?> " value="<?= $kebersihanmesin->perbaikan; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('perbaikan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('perbaikan') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Area</label>
                            <input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?> " value="<?= $kebersihanmesin->area; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('area')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('area') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal Perbaikan</label>
                            <input type="date" name="tgl_perbaikan" class="form-control <?= form_error('tgl_perbaikan') ? 'invalid' : '' ?> " value="<?= $kebersihanmesin->tgl_perbaikan; ?>">
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
                                value="Bersih" 
                                <?= ($kebersihanmesin->kondisi ?? '') == 'Bersih' ? 'checked' : '' ?>>
                                <label class="form-check-label">Bersih</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('kondisi') ? 'is-invalid' : '' ?>" 
                                type="radio" 
                                name="kondisi" 
                                value="Kotor" 
                                <?= ($kebersihanmesin->kondisi ?? '') == 'Kotor' ? 'checked' : '' ?>>
                                <label class="form-check-label">Kotor</label>
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
                                value="Ada" 
                                <?= ($kebersihanmesin->spare_part ?? '') == 'Ada' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('spare_part') ? 'is-invalid' : '' ?>" 
                                type="radio" 
                                name="spare_part" 
                                value="Tidak Ada" 
                                <?= ($kebersihanmesin->spare_part ?? '') == 'Tidak Ada' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Ada</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('spare_part') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Keterangan</label>
                            <textarea class="form-control" name="keterangan"><?= $kebersihanmesin->keterangan; ?></textarea>
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