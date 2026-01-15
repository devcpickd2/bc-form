<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Verifikasi Residu Klorin</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('residu')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Verifikasi Residu Klorin</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('residu/tambah');?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>  
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Area</label>
                            <input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?> " value="<?= set_value('area'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('area')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('area') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Titik Sampling</label>
                            <input type="text" name="titik_sampling" class="form-control <?= form_error('titik_sampling') ? 'invalid' : '' ?> " value="<?= set_value('titik_sampling'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('titik_sampling')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('titik_sampling') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label class="form-label font-weight-bold">Standar (PPM)</label>
                            <p class="form-control-plaintext font-weight-bold">0.1 - 5</p>
                            <input type="hidden" name="standar" value="0.1 - 5">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Hasil Pemeriksaan (PPM)</label>
                            <input type="text" name="hasil_pemeriksaan" class="form-control <?= form_error('hasil_pemeriksaan') ? 'invalid' : '' ?> " value="<?= set_value('hasil_pemeriksaan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('hasil_pemeriksaan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('hasil_pemeriksaan') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Keterangan</label>
                            <div class="form-check">
                                <input class="form-check-input <?= form_error('keterangan') ? 'is-invalid' : '' ?>" 
                                type="radio" 
                                name="keterangan" 
                                id="keterangan_ok" 
                                value="Ok" 
                                <?= set_value('keterangan') === 'Ok' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="keterangan_ok">
                                    Ok
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input <?= form_error('keterangan') ? 'is-invalid' : '' ?>" 
                                type="radio" 
                                name="keterangan" 
                                id="keterangan_tidak_ok" 
                                value="Tidak Ok" 
                                <?= set_value('keterangan') === 'Tidak Ok' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="keterangan_tidak_ok">
                                    Tidak Ok
                                </label>
                            </div>
                            <div class="invalid-feedback <?= form_error('keterangan') ? 'd-block' : '' ?>">
                                <?= form_error('keterangan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Tindakan Koreksi</label>
                            <input type="text" name="tindakan" class="form-control <?= form_error('tindakan') ? 'invalid' : '' ?> " value="<?= set_value('tindakan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('tindakan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('tindakan') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Verifikasi</label>
                            <input type="text" name="verifikasi" class="form-control <?= form_error('verifikasi') ? 'invalid' : '' ?> " value="<?= set_value('verifikasi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('verifikasi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('verifikasi') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
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
                            <a href="<?= base_url('residu')?>" class="btn btn-md btn-danger">
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