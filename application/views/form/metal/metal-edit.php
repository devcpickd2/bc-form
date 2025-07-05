<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Metal Detector</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('metal')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Metal Detector</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('metal/edit/'.$metal->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date_metal" class="form-control <?= form_error('date_metal') ? 'invalid' : '' ?> " value="<?= $metal->date_metal; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date_metal')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date_metal') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $metal->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $metal->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $metal->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Pukul</label>
                            <input type="time" name="time" class="form-control <?= form_error('time') ? 'invalid' : '' ?> "  value="<?= $metal->time; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('time')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('time') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'invalid' : '' ?> " value="<?= $metal->nama_produk; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_produk')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_produk') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Kode Produksi</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= $metal->kode_produksi; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_produksi') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">No. Program</label>
                            <input type="text" name="no_program" class="form-control <?= form_error('no_program') ? 'invalid' : '' ?> " value="<?= $metal->no_program; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('no_program')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('no_program') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Deteksi NG</label>
                            <select name="deteksi_ng" class="form-control <?= form_error('deteksi_ng') ? 'is-invalid' : '' ?>">
                                <option value="1" <?= $metal->deteksi_ng == '1' ? 'selected' : '' ?>>Belt Conveyor Berhenti</option>
                                <option value="2" <?= $metal->deteksi_ng == '2' ? 'selected' : '' ?>>Rejector</option>
                                <option value="-" <?= $metal->deteksi_ng == '-' ? 'selected' : '' ?>>-</option>
                            </select>
                            <div class="invalid-feedback <?= form_error('deteksi_ng') ? 'd-block' : '' ?>">
                                <?= form_error('deteksi_ng') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">STD Spesimen</label>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Standar Fe</label>
                            <select name="std_fe" class="form-control <?= form_error('std_fe') ? 'is-invalid' : '' ?>">
                                <option value="1.5 mm" <?= ($metal->std_fe == '1.5 mm') ? 'selected' : '' ?>>1.5 mm</option>
                                <option value="2.5 mm" <?= ($metal->std_fe == '2.5 mm') ? 'selected' : '' ?>>2.5 mm</option>
                            </select>
                            <div class="invalid-feedback <?= form_error('std_fe') ? 'd-block' : '' ?>">
                                <?= form_error('std_fe') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Standar Non Fe</label>
                            <select name="std_nonfe" class="form-control <?= form_error('std_nonfe') ? 'is-invalid' : '' ?>">
                                <option value="2.0 mm" <?= ($metal->std_nonfe == '2.0 mm') ? 'selected' : '' ?>>2.0 mm</option>
                                <option value="3.0 mm" <?= ($metal->std_nonfe == '3.0 mm') ? 'selected' : '' ?>>3.0 mm</option>
                            </select>
                            <div class="invalid-feedback <?= form_error('std_nonfe') ? 'd-block' : '' ?>">
                                <?= form_error('std_nonfe') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Standar SUS 304</label>
                            <select name="std_sus304" class="form-control <?= form_error('std_sus304') ? 'is-invalid' : '' ?>">
                                <option value="2.5 mm" <?= ($metal->std_sus304 == '2.5 mm') ? 'selected' : '' ?>>2.5 mm</option>
                                <option value="3.0 mm" <?= ($metal->std_sus304 == '3.0 mm') ? 'selected' : '' ?>>3.0 mm</option>
                            </select>
                            <div class="invalid-feedback <?= form_error('std_sus304') ? 'd-block' : '' ?>">
                                <?= form_error('std_sus304') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <div>
                                <input type="radio" id="fe_terdeteksi" name="fe_d" value="terdeteksi" class="<?= form_error('fe_d') ? 'invalid' : '' ?>" <?= ($metal->fe_d == 'terdeteksi') ? 'checked' : '' ?>>
                                <label for="fe_terdeteksi">Terdeteksi</label>
                            </div>
                            <div>
                                <input type="radio" id="fe_tidak_terdeteksi" name="fe_d" value="tidak_terdeteksi" class="<?= form_error('fe_d') ? 'invalid' : '' ?>" <?= ($metal->fe_d == 'tidak_terdeteksi') ? 'checked' : '' ?>>
                                <label for="fe_tidak_terdeteksi">Tidak Terdeteksi</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('fe_d')) ? 'd-block' : '' ; ?>">
                                <?= form_error('fe_d') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <input type="radio" id="nonfe_terdeteksi" name="nonfe_d" value="terdeteksi" class="<?= form_error('nonfe_d') ? 'invalid' : '' ?>" <?= ($metal->nonfe_d == 'terdeteksi') ? 'checked' : '' ?>>
                                <label for="nonfe_terdeteksi">Terdeteksi</label>
                            </div>
                            <div>
                                <input type="radio" id="nonfe_tidak_terdeteksi" name="nonfe_d" value="tidak_terdeteksi" class="<?= form_error('nonfe_d') ? 'invalid' : '' ?>" <?= ($metal->nonfe_d == 'tidak_terdeteksi') ? 'checked' : '' ?>>
                                <label for="nonfe_tidak_terdeteksi">Tidak Terdeteksi</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('nonfe_d')) ? 'd-block' : '' ; ?>">
                                <?= form_error('nonfe_d') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <input type="radio" id="sus_terdeteksi" name="sus_d" value="terdeteksi" class="<?= form_error('sus_d') ? 'invalid' : '' ?>" <?= ($metal->sus_d == 'terdeteksi') ? 'checked' : '' ?>>
                                <label for="sus_terdeteksi">Terdeteksi</label>
                            </div>
                            <div>
                                <input type="radio" id="sus_tidak_terdeteksi" name="sus_d" value="tidak_terdeteksi" class="<?= form_error('sus_d') ? 'invalid' : '' ?>" <?= ($metal->sus_d == 'tidak_terdeteksi') ? 'checked' : '' ?>>
                                <label for="sus_tidak_terdeteksi">Tidak Terdeteksi</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('sus_d')) ? 'd-block' : '' ; ?>">
                                <?= form_error('sus_d') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                     <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan"><?= $metal->keterangan; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('keterangan') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan_metal"><?= $metal->catatan_metal; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan_metal')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('catatan_metal') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('metal')?>" class="btn btn-md btn-danger">
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