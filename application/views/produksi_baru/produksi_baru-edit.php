<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Produksi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('produksi_baru')?>">
                    <i class="fas fa-arrow-left"></i> Daftar Data Produksi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('produksi_baru/edit/'.$produksi_baru->uuid); ?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Bulan</label>
                        <input type="month"
                        name="bulan"
                        class="form-control <?= form_error('bulan') ? 'invalid' : '' ?>"
                        value="<?= set_value('bulan', date('Y-m', strtotime($produksi_baru->bulan))) ?>">
                        <div class="invalid-feedback <?= !empty(form_error('bulan')) ? 'd-block' : '' ?>">
                            <?= form_error('bulan') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Jumlah Hari Kerja Karyawan</label>
                        <input type="number"
                        name="jumlah_hari"
                        class="form-control <?= form_error('jumlah_hari') ? 'invalid' : '' ?>"
                        value="<?= set_value('jumlah_hari', $produksi_baru->jumlah_hari) ?>">
                        <small class="form-text text-muted font-italic">
                            *Masukkan angka bulan, tanpa nilai negatif
                        </small>
                        <div class="invalid-feedback <?= !empty(form_error('jumlah_hari')) ? 'd-block' : '' ?>">
                            <?= form_error('jumlah_hari') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Tonase Produksi</label>
                        <div class="input-group">
                            <input type="number"
                            name="tonase_produksi"
                            step="0.01"
                            class="form-control <?= form_error('tonase_produksi') ? 'invalid' : '' ?>"
                            value="<?= set_value('tonase_produksi', $produksi_baru->tonase_produksi) ?>">
                            <div class="input-group-append">
                                <span class="input-group-text">Ton</span>
                            </div>
                        </div>
                        <small class="form-text text-muted font-italic">
                            *Gunakan angka desimal bila diperlukan
                        </small>
                        <div class="invalid-feedback <?= !empty(form_error('tonase_produksi')) ? 'd-block' : '' ?>">
                            <?= form_error('tonase_produksi') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">HK Produksi</label>
                        <input type="number"
                        name="hk_produksi"
                        step="0.01"
                        class="form-control <?= form_error('hk_produksi') ? 'invalid' : '' ?>"
                        value="<?= set_value('hk_produksi', $produksi_baru->hk_produksi) ?>">
                        <small class="form-text text-muted font-italic">
                            *Masukkan nilai HK dalam format desimal
                        </small>
                        <div class="invalid-feedback <?= !empty(form_error('hk_produksi')) ? 'd-block' : '' ?>">
                            <?= form_error('hk_produksi') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea
                        class="form-control"
                        name="keterangan"><?= set_value('keterangan', $produksi_baru->keterangan) ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ?>">
                            <?= form_error('keterangan') ?>
                        </div>
                        <small class="form-text text-muted font-italic">
                            *Tambahkan catatan jika diperlukan
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('produksi_baru')?>" class="btn btn-md btn-danger">
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
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>