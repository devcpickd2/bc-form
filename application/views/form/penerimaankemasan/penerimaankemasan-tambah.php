<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Penerimaan Kemasan dari Supplier</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('penerimaankemasan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Penerimaan Kemasan dari Supplier</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('penerimaankemasan/tambah');?>" enctype="multipart/form-data">
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
                            <label class="form-label font-weight-bold">Jenis Kemasan</label>
                            <input type="text" name="jenis_kemasan" class="form-control <?= form_error('jenis_kemasan') ? 'invalid' : '' ?> " value="<?= set_value('jenis_kemasan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jenis_kemasan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jenis_kemasan') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Pemasok</label>
                            <input type="text" name="pemasok" class="form-control <?= form_error('pemasok') ? 'invalid' : '' ?> " value="<?= set_value('pemasok'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('pemasok')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('pemasok') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kode Produksi</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= set_value('kode_produksi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_produksi') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jumlah Datang</label>
                            <input type="text" name="jumlah_datang" class="form-control <?= form_error('jumlah_datang') ? 'invalid' : '' ?> " value="<?= set_value('jumlah_datang'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_datang')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_datang') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Sampel (Pcs)</label>
                            <input type="text" name="sampel" class="form-control <?= form_error('sampel') ? 'invalid' : '' ?> " value="<?= set_value('sampel'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('sampel')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('sampel') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jumlah Reject</label>
                            <input type="text" name="jumlah_reject" class="form-control <?= form_error('jumlah_reject') ? 'invalid' : '' ?> " value="<?= set_value('jumlah_reject'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_reject')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_reject') ?>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">Kondisi Fisik</label>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Warna</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('warna') ? 'is-invalid' : '' ?>" type="radio" name="warna" value="sesuai" <?= set_value('warna') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('warna') ? 'is-invalid' : '' ?>" type="radio" name="warna" value="tidak sesuai" <?= set_value('warna') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('warna') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Panjang</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('panjang') ? 'is-invalid' : '' ?>" type="radio" name="panjang" value="sesuai" <?= set_value('panjang') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('panjang') ? 'is-invalid' : '' ?>" type="radio" name="panjang" value="tidak sesuai" <?= set_value('panjang') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('panjang') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Diameter</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('diameter') ? 'is-invalid' : '' ?>" type="radio" name="diameter" value="sesuai" <?= set_value('diameter') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('diameter') ? 'is-invalid' : '' ?>" type="radio" name="diameter" value="tidak sesuai" <?= set_value('diameter') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('diameter') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Lebar</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('lebar') ? 'is-invalid' : '' ?>" type="radio" name="lebar" value="sesuai" <?= set_value('lebar') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('lebar') ? 'is-invalid' : '' ?>" type="radio" name="lebar" value="tidak sesuai" <?= set_value('lebar') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('lebar') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Tinggi</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('tinggi') ? 'is-invalid' : '' ?>" type="radio" name="tinggi" value="sesuai" <?= set_value('tinggi') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('tinggi') ? 'is-invalid' : '' ?>" type="radio" name="tinggi" value="tidak sesuai" <?= set_value('tinggi') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('tinggi') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Berat</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('berat') ? 'is-invalid' : '' ?>" type="radio" name="berat" value="sesuai" <?= set_value('berat') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('berat') ? 'is-invalid' : '' ?>" type="radio" name="berat" value="tidak sesuai" <?= set_value('berat') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('berat') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Delaminasi</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('delaminasi') ? 'is-invalid' : '' ?>" type="radio" name="delaminasi" value="sesuai" <?= set_value('delaminasi') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('delaminasi') ? 'is-invalid' : '' ?>" type="radio" name="delaminasi" value="tidak sesuai" <?= set_value('delaminasi') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('delaminasi') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Bau</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('bau') ? 'is-invalid' : '' ?>" type="radio" name="bau" value="sesuai" <?= set_value('bau') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('bau') ? 'is-invalid' : '' ?>" type="radio" name="bau" value="tidak sesuai" <?= set_value('bau') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('bau') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold d-block">Desain</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('desain') ? 'is-invalid' : '' ?>" type="radio" name="desain" value="sesuai" <?= set_value('desain') == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('desain') ? 'is-invalid' : '' ?>" type="radio" name="desain" value="tidak sesuai" <?= set_value('desain') == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('desain') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Segel</label>
                            <input type="text" name="segel" class="form-control <?= form_error('segel') ? 'invalid' : '' ?> " value="<?= set_value('segel'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('segel')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('segel') ?>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Penerimaan</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" type="radio" name="penerimaan" value="ok" <?= set_value('penerimaan') == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" type="radio" name="penerimaan" value="tolak" <?= set_value('penerimaan') == 'tolak' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tolak</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('penerimaan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                     <div class="col-sm-3">
                        <label class="form-label font-weight-bold d-block">COA</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('coa') ? 'is-invalid' : '' ?>" type="radio" name="coa" value="ada" <?= set_value('coa') == 'ada' ? 'checked' : '' ?>>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('coa') ? 'is-invalid' : '' ?>" type="radio" name="coa" value="tidak ada" <?= set_value('coa') == 'tidak ada' ? 'checked' : '' ?>>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                        <div class="invalid-feedback d-block">
                            <?= form_error('coa') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label">Upload Bukti COA</label><br>
                        <input type="file" name="bukti_coa" class="form-control <?= form_error('bukti_coa') ? 'is-invalid' : '' ?>" accept="image/*,application/pdf">
                        <div class="invalid-feedback"><?= form_error('bukti_coa') ?></div>
                        <h6 style="color: red; font-style: italic; font-size: 12px;">*Upload COA jika ada</h6>
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
                        <a href="<?= base_url('penerimaankemasan')?>" class="btn btn-md btn-danger">
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