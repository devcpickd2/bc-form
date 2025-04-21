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
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date_metal" class="form-control <?= form_error('date_metal') ? 'invalid' : '' ?> " value="<?= $metal->date_metal; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date_metal')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date_metal') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $metal->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $metal->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $metal->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Pukul</label>
                            <input type="time" name="time" class="form-control <?= form_error('time') ? 'invalid' : '' ?> "  value="<?= $metal->time; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('time')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('time') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'invalid' : '' ?> " value="<?= $metal->nama_produk; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_produk')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_produk') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Kode Produksi</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= $metal->kode_produksi; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_produksi') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">No. Program</label>
                            <input type="text" name="no_program" class="form-control <?= form_error('no_program') ? 'invalid' : '' ?> " value="<?= $metal->no_program; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('no_program')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('no_program') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">STD Spesimen</label>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Fe : 2.5 (mm)</label>
                            <div>
                                <input type="radio" id="lolos" name="std_fe" value="lolos" class="<?= form_error('std_fe') ? 'invalid' : '' ?>" <?= ($metal->std_fe == 'lolos') ? 'checked' : '' ?>>
                                <label for="lolos">Lolos</label>
                            </div>
                            <div>
                                <input type="radio" id="tidak_lolos" name="std_fe" value="tidak_lolos" class="<?= form_error('std_fe') ? 'invalid' : '' ?>" <?= ($metal->std_fe == 'tidak_lolos') ? 'checked' : '' ?>>
                                <label for="tidak_lolos">Tidak Lolos</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('std_fe')) ? 'd-block' : '' ; ?>">
                                <?= form_error('std_fe') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Non Fe : 3.0 (mm)</label>
                            <div>
                                <input type="radio" id="lolos" name="std_nonfe" value="lolos" class="<?= form_error('std_nonfe') ? 'invalid' : '' ?>" <?= ($metal->std_nonfe == 'lolos') ? 'checked' : '' ?>>
                                <label for="lolos">Lolos</label>
                            </div>
                            <div>
                                <input type="radio" id="tidak_lolos" name="std_nonfe" value="tidak_lolos" class="<?= form_error('std_nonfe') ? 'invalid' : '' ?>"<?= ($metal->std_nonfe == 'tidak_lolos') ? 'checked' : '' ?>>
                                <label for="tidak_lolos">Tidak Lolos</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('std_nonfe')) ? 'd-block' : '' ; ?>">
                                <?= form_error('std_nonfe') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">SUS 304 : 3.0 (mm)</label>
                            <div>
                                <input type="radio" id="lolos" name="std_sus304" value="lolos" class="<?= form_error('std_sus304') ? 'invalid' : '' ?>" <?= ($metal->std_sus304 == 'lolos') ? 'checked' : '' ?>>
                                <label for="lolos">Lolos</label>
                            </div>
                            <div>
                                <input type="radio" id="tidak_lolos" name="std_sus304" value="tidak_lolos" class="<?= form_error('std_sus304') ? 'invalid' : '' ?>" <?= ($metal->std_sus304 == 'tidak_lolos') ? 'checked' : '' ?>>
                                <label for="tidak_lolos">Tidak Lolos</label>
                            </div>
                            <div class="invalid-feedback <?= !empty(form_error('std_sus304')) ? 'd-block' : '' ; ?>">
                                <?= form_error('std_sus304') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control <?= form_error('keterangan') ? 'invalid' : '' ?> " value="<?= $metal->keterangan; ?>">
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