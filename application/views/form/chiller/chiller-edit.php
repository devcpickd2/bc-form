<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Suhu Chiller</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('chiller')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Suhu Chiller</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('chiller/edit/'.$chiller->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $chiller->date; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Waktu</label>
                            <input type="time" name="waktu" class="form-control <?= form_error('waktu') ? 'invalid' : '' ?> " value="<?= $chiller->waktu; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('waktu')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('waktu') ?>
                            </div>
                        </div>
                    </div>
                    <label class="form-label font-weight-bold">Suhu Chiller (°C)</label>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Chiller No.1</label>
                            <input type="text" name="chiller_1" class="form-control <?= form_error('chiller_1') ? 'invalid' : '' ?> " value="<?= $chiller->chiller_1; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('chiller_1')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('chiller_1') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Chiller No.2</label>
                            <input type="text" name="chiller_2" class="form-control <?= form_error('chiller_2') ? 'invalid' : '' ?> " value="<?= $chiller->chiller_2; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('chiller_2')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('chiller_2') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Chiller No.3</label>
                            <input type="text" name="chiller_3" class="form-control <?= form_error('chiller_3') ? 'invalid' : '' ?> " value="<?= $chiller->chiller_3; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('chiller_3')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('chiller_3') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Chiller No.4</label>
                            <input type="text" name="chiller_4" class="form-control <?= form_error('chiller_4') ? 'invalid' : '' ?> " value="<?= $chiller->chiller_4; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('chiller_4')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('chiller_4') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"><?= $chiller->catatan; ?></textarea>
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
                            <a href="<?= base_url('chiller')?>" class="btn btn-md btn-danger">
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