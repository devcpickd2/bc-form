<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Grinding</h1>
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
            <form class="user" method="post" action="<?= base_url('produksi/grinding/'.$produksi->uuid);?>">
                <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                <label class="form-label font-weight-bold">Kode Produksi : <?= $produksi->kode_produksi;?></label>
                <hr>
                <label class="form-label font-weight-bold">GRINDING</label>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Hasil Grinding</label>
                        <input type="text" name="hasil_grinding" class="form-control <?= form_error('hasil_grinding') ? 'invalid' : '' ?>" value="<?= $produksi->hasil_grinding; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('hasil_grinding')) ? 'd-block' : '' ; ?>">
                            <?= form_error('hasil_grinding') ?>
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
