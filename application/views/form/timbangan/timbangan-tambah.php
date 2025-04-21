<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Timbangan</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('timbangan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Timbangan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('timbangan/tambah');?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option disabled selected>Pilih Shift</option>
                                <option value="1" <?= set_select('shift', 1); ?>>Shift 1</option>
                                <option value="2" <?= set_select('shift', 2); ?>>Shift 2</option>
                                <option value="3" <?= set_select('shift', 3); ?>>Shift 3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kode Timbangan</label>
                            <input type="text" name="kode_timbangan" class="form-control <?= form_error('kode_timbangan') ? 'invalid' : '' ?> " value="<?= set_value('kode_timbangan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_timbangan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_timbangan') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kapasitas</label>
                            <input type="text" name="kapasitas" class="form-control <?= form_error('kapasitas') ? 'invalid' : '' ?> " value="<?= set_value('kapasitas'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kapasitas')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kapasitas') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Model</label>
                            <input type="text" name="model" class="form-control <?= form_error('model') ? 'invalid' : '' ?> " value="<?= set_value('model'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('model')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('model') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control <?= form_error('lokasi') ? 'invalid' : '' ?> " value="<?= set_value('lokasi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('lokasi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('lokasi') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Waktu Peneraan</label>
                            <input type="text" name="peneraan_waktu" class="form-control <?= form_error('peneraan_waktu') ? 'invalid' : '' ?> " value="<?= set_value('peneraan_waktu'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('peneraan_waktu')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('peneraan_waktu') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Standar</label>
                            <input type="text" name="peneraan_standar" class="form-control <?= form_error('peneraan_standar') ? 'invalid' : '' ?> " value="<?= set_value('peneraan_standar'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('peneraan_standar')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('peneraan_standar') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Hasil Peneraan</label>
                            <input type="text" name="peneraan_hasil" class="form-control <?= form_error('peneraan_hasil') ? 'invalid' : '' ?> " value="<?= set_value('peneraan_hasil'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('peneraan_hasil')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('peneraan_hasil') ?>
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
                            <a href="<?= base_url('timbangan')?>" class="btn btn-md btn-danger">
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