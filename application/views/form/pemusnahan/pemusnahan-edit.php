<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Data Pemusnahan Barang / Produk</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('pemusnahan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Data Pemusnahan Barang / Produk</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('pemusnahan/edit/'.$pemusnahan->uuid);?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $pemusnahan->date; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('date') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'invalid' : '' ?> " value="<?= $pemusnahan->nama_produk; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('nama_produk')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('nama_produk') ?>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Kode Produksi</label>
                        <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= $pemusnahan->kode_produksi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kode_produksi') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Best Before</label>
                        <input type="date" name="best_before" class="form-control <?= form_error('best_before') ? 'invalid' : '' ?> " value="<?= $pemusnahan->best_before; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('best_before')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('best_before') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Analisa Masalah</label>
                        <textarea class="form-control" name="analisa"><?= $pemusnahan->analisa; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('analisa')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('analisa') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan"><?= $pemusnahan->keterangan; ?></textarea>
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
                        <a href="<?= base_url('pemusnahan')?>" class="btn btn-md btn-danger">
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