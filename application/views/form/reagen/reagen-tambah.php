<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Verifikasi Penggunaan Reagen Klorin</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('reagen')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Verifikasi Penggunaan Reagen Klorin</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('reagen/tambah');?>">
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
                            <label class="form-label font-weight-bold">Nama Larutan</label>
                            <input type="text" name="nama_larutan" class="form-control <?= form_error('nama_larutan') ? 'invalid' : '' ?> " value="Reagen C1₂–1" readonly>
                            <div class="invalid-feedback <?= !empty(form_error('nama_larutan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_larutan') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">No. Lot</label>
                            <input type="text" name="no_lot" class="form-control <?= form_error('no_lot') ? 'invalid' : '' ?> " value="<?= set_value('no_lot'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('no_lot')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('no_lot') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Best Before</label>
                        <input type="date" name="best_before" class="form-control <?= form_error('best_before') ? 'invalid' : '' ?>" value="<?= date('Y-m-d', strtotime('+1 year')) ?>">
                        <div class="invalid-feedback <?= !empty(form_error('best_before')) ? 'd-block' : '' ; ?>">
                            <?= form_error('best_before') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Tanggal Buka Botol</label>
                        <input type="date" name="tgl_buka_botol" class="form-control <?= form_error('tgl_buka_botol') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tgl_buka_botol')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('tgl_buka_botol') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Volume Penggunaan Larutan (mL)</label>
                        <input type="text" name="volume_penggunaan" class="form-control <?= form_error('volume_penggunaan') ? 'invalid' : '' ?> " value="<?= set_value('volume_penggunaan'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('volume_penggunaan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('volume_penggunaan') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Volume Akhir Larutan (mL)</label>
                        <input type="text" name="volume_akhir" class="form-control <?= form_error('volume_akhir') ? 'invalid' : '' ?> " value="<?= set_value('volume_akhir'); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('volume_akhir')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('volume_akhir') ?>
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
                        <a href="<?= base_url('reagen')?>" class="btn btn-md btn-danger">
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