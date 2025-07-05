<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('pemeriksaanpengiriman')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('pemeriksaanpengiriman/tambah');?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control <?= form_error('nama_supplier') ? 'invalid' : '' ?> " value="<?= set_value('nama_supplier'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_supplier')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_supplier') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control <?= form_error('nama_barang') ? 'invalid' : '' ?> " value="<?= set_value('nama_barang'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_barang')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_barang') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jenis Mobil Pengangkut</label>
                            <input type="text" name="jenis_mobil" class="form-control <?= form_error('jenis_mobil') ? 'invalid' : '' ?> " value="<?= set_value('jenis_mobil'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jenis_mobil')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jenis_mobil') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">No. Polisi</label>
                            <input type="text" name="no_polisi" class="form-control <?= form_error('no_polisi') ? 'invalid' : '' ?> " value="<?= set_value('no_polisi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('no_polisi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('no_polisi') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Identitas Pengantar</label>
                            <input type="text" name="identitas_pengantar" class="form-control <?= form_error('identitas_pengantar') ? 'invalid' : '' ?> " value="<?= set_value('identitas_pengantar'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('identitas_pengantar')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('identitas_pengantar') ?>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">Kondisi Mobil</label>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Segel</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('segel') ? 'is-invalid' : '' ?>" type="radio" name="segel" value="ok" <?= set_value('segel') == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Oke</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('segel') ? 'is-invalid' : '' ?>" type="radio" name="segel" value="tidak ok" <?= set_value('segel') == 'tidak ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Ok</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('segel') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Kebersihan</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('kebersihan') ? 'is-invalid' : '' ?>" type="radio" name="kebersihan" value="ok" <?= set_value('kebersihan') == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Oke</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('kebersihan') ? 'is-invalid' : '' ?>" type="radio" name="kebersihan" value="tidak ok" <?= set_value('kebersihan') == 'tidak ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Ok</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('kebersihan') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Bocor</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('bocor') ? 'is-invalid' : '' ?>" type="radio" name="bocor" value="ok" <?= set_value('bocor') == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Oke</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('bocor') ? 'is-invalid' : '' ?>" type="radio" name="bocor" value="tidak ok" <?= set_value('bocor') == 'tidak ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Oke</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('bocor') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Hama</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('hama') ? 'is-invalid' : '' ?>" type="radio" name="hama" value="ok" <?= set_value('hama') == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Oke</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('hama') ? 'is-invalid' : '' ?>" type="radio" name="hama" value="tidak ok" <?= set_value('hama') == 'tidak ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Oke</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('hama') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jam Datang</label>
                            <input type="time" name="jam_datang" class="form-control <?= form_error('jam_datang') ? 'invalid' : '' ?> " value="<?php echo date("H:i") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jam_datang')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jam_datang') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
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
                            <a href="<?= base_url('pemeriksaanpengiriman')?>" class="btn btn-md btn-danger">
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