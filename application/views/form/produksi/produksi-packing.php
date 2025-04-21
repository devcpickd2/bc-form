<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Packing</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('produksi')?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Verifikasi Proses Produksi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('produksi/packing/'.$produksi->uuid);?>">
                <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                <label class="form-label font-weight-bold">Tanggal : <?= $produksi->date;?></label>
                <hr>

                <label class="form-label font-weight-bold">PACKING</label>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Nama Produk</label>
                        <input type="text" name="packing_nama_produk" class="form-control <?= form_error('packing_nama_produk') ? 'invalid' : '' ?>" value="<?= $produksi->nama_produk; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_nama_produk')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_nama_produk') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kode Kemasan</label>
                        <input type="text" name="packing_kode_kemasan" class="form-control <?= form_error('packing_kode_kemasan') ? 'invalid' : '' ?>" value="<?= $produksi->packing_kode_kemasan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_kode_kemasan')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_kode_kemasan') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Best Before</label>
                        <input type="date" name="packing_bb" class="form-control <?= form_error('packing_bb') ? 'invalid' : '' ?>" value="<?= $produksi->packing_bb; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_bb')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_bb') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kondisi Kemasan</label>
                        <input type="text" name="packing_kondisi_kemasan" class="form-control <?= form_error('packing_kondisi_kemasan') ? 'invalid' : '' ?>" value="<?= $produksi->packing_kondisi_kemasan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_kondisi_kemasan')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_kondisi_kemasan') ?>
                        </div>
                    </div>
                </div>

<!--                 <hr>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Nama Produksi</label>
                        <input type="text" name="nama_produksi" class="form-control <?= form_error('nama_produksi') ? 'invalid' : '' ?>" value="<?= $produksi->nama_produksi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('nama_produksi')) ? 'd-block' : '' ; ?>">
                            <?= form_error('nama_produksi') ?>
                        </div>
                    </div>
                </div>
 -->
                <hr>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <input type="text" name="catatan" class="form-control <?= form_error('catatan') ? 'invalid' : '' ?>" value="<?= $produksi->catatan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : '' ; ?>">
                            <?= form_error('catatan') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('produksi')?>" class="btn btn-md btn-danger">
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
