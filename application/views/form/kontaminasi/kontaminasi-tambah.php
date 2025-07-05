<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Kontaminasi Benda Asing</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kontaminasi')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Laporan Kontaminasi Benda Asing</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('kontaminasi/tambah');?>" enctype="multipart/form-data">
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
                            <label class="form-label font-weight-bold">Pukul</label>
                            <input type="time" name="time" class="form-control <?= form_error('time') ? 'invalid' : '' ?> " value="<?php echo date("H:i") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('time')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('time') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jenis Kontaminasi</label>
                            <input type="text" name="jenis_kontaminasi" class="form-control <?= form_error('jenis_kontaminasi') ? 'invalid' : '' ?> " value="<?= set_value('jenis_kontaminasi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jenis_kontaminasi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jenis_kontaminasi') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'invalid' : '' ?> " placeholder="Masukkan Nama Produk" value="<?= set_value('nama_produk'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_produk')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_produk') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kode Produksi</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " placeholder="Masukkan Kode Produksi" value="<?= set_value('kode_produksi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_produksi') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label">Upload Bukti Temuan</label><br>
                            <input type="file" name="bukti" class="form-control <?= form_error('bukti') ? 'is-invalid' : '' ?>" accept="image/*,application/pdf">
                            <div class="invalid-feedback"><?= form_error('bukti') ?></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jumlah Temuan</label>
                            <input type="number" name="jumlah_temuan" class="form-control <?= form_error('jumlah_temuan') ? 'invalid' : '' ?> " value="<?= set_value('jumlah_temuan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_temuan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_temuan') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tahapan</label>
                            <input type="text" name="tahapan" class="form-control <?= form_error('tahapan') ? 'invalid' : '' ?> " placeholder="Masukkan Tahapan" value="<?= set_value('tahapan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('tahapan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('tahapan') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
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
                            <a href="<?= base_url('kontaminasi')?>" class="btn btn-md btn-danger">
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