<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Kebersihan Peralatan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kebersihanperalatan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Kebersihan Peralatan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('kebersihanperalatan/edit/'.$kebersihanperalatan->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $kebersihanperalatan->date; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $kebersihanperalatan->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $kebersihanperalatan->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $kebersihanperalatan->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Peralatan</label>
                            <input type="text" name="peralatan" class="form-control <?= form_error('peralatan') ? 'invalid' : '' ?> " value="<?= $kebersihanperalatan->peralatan; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('peralatan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('peralatan') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kondisi</label>
                            <select name="kondisi" class="form-control <?= form_error('kondisi') ? 'is-invalid' : '' ?>">
                                <option value="">-- Pilih Kondisi --</option>
                                <option value="Bersih" <?= set_select('kondisi', 'Bersih', ($kebersihanperalatan->kondisi == 'Bersih')); ?>>Bersih</option>
                                <option value="Kotor" <?= set_select('kondisi', 'Kotor', ($kebersihanperalatan->kondisi == 'Kotor')); ?>>Kotor</option>
                            </select>
                            <div class="invalid-feedback <?= form_error('kondisi') ? 'd-block' : '' ?>">
                                <?= form_error('kondisi') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Problem</label>
                            <textarea class="form-control" name="problem"><?= $kebersihanperalatan->problem; ?></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('problem')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('problem') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tindakan Koreksi</label>
                            <textarea class="form-control" name="tindakan"><?= $kebersihanperalatan->tindakan; ?></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('tindakan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('tindakan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"><?= $kebersihanperalatan->catatan; ?></textarea>
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
                            <a href="<?= base_url('kebersihanperalatan')?>" class="btn btn-md btn-danger">
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