<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Verifikasi Magnet Trap</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('verifikasimagnet')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Verifikasi Magnet Trap</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('verifikasimagnet/tambah');?>" enctype="multipart/form-data">
                    <?php
                    $produksi_data = $this->session->userdata('produksi_data');
                    $tanggal_sess = $produksi_data['tanggal'] ?? date('Y-m-d');
                    $shift_sess = $produksi_data['shift'] ?? '';
                    ?>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>"
                            value="<?= set_value('date', $tanggal_sess) ?>">
                            <div class="invalid-feedback"><?= form_error('date') ?></div>
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold">Shift</label>
                            <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
                                <option disabled <?= empty($shift_sess) ? 'selected' : '' ?>>Pilih Shift</option>
                                <option value="1" <?= set_select('shift', '1', $shift_sess == '1') ?>>Shift 1</option>
                                <option value="2" <?= set_select('shift', '2', $shift_sess == '2') ?>>Shift 2</option>
                                <option value="3" <?= set_select('shift', '3', $shift_sess == '3') ?>>Shift 3</option>
                            </select>
                            <div class="invalid-feedback"><?= form_error('shift') ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'invalid' : '' ?> " value="<?= set_value('nama_produk'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_produk')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_produk') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kode Produksi</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= set_value('kode_produksi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_produksi') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jumlah Temuan</label>
                            <input type="number" name="jumlah_temuan" class="form-control <?= form_error('jumlah_temuan') ? 'invalid' : '' ?> " value="<?= set_value('jumlah_temuan'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_temuan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_temuan') ?>
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
                            <a href="<?= base_url('verifikasimagnet')?>" class="btn btn-md btn-danger">
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