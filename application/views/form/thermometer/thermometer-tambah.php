<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Peneraan Thermometer</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('thermometer')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Peneraan Thermometer</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('thermometer/tambah');?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kode Thermo</label>
                            <input type="text" name="kode_thermo" class="form-control <?= form_error('kode_thermo') ? 'invalid' : '' ?> " value="<?= set_value('kode_thermo'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_thermo')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_thermo') ?>
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
                            <label class="form-label font-weight-bold">Standar</label>
                            <input type="text" name="standar" class="form-control <?= form_error('standar') ? 'invalid' : '' ?> " value="0.0" disabled>
                            <div class="invalid-feedback <?= !empty(form_error('standar')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('standar') ?>
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
                            <label class="form-label font-weight-bold">Hasil Peneraan</label>
                            <input type="text" name="peneraan_hasil" class="form-control <?= form_error('peneraan_hasil') ? 'invalid' : '' ?> " value="<?= set_value('peneraan_hasil'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('peneraan_hasil')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('peneraan_hasil') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tindakan Perbaikan</label>
                            <textarea class="form-control" name="tindakan_perbaikan"></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('tindakan_perbaikan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('tindakan_perbaikan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('thermometer')?>" class="btn btn-md btn-danger">
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