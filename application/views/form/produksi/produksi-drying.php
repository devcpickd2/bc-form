<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Drying</h1>
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
            <form class="user" method="post" action="<?= base_url('produksi/drying/'.$produksi->uuid);?>">
                <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                <label class="form-label font-weight-bold">Kode Produksi : <?= $produksi->kode_produksi;?></label>
                <hr>
                <label class="form-label font-weight-bold">DRYING</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Suhu (°C)</label>
                        <input type="text" name="dry_suhu" class="form-control <?= form_error('dry_suhu') ? 'invalid' : '' ?>" value="<?= $produksi->dry_suhu; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('dry_suhu')) ? 'd-block' : '' ; ?>">
                            <?= form_error('dry_suhu') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Speed Rotasi (4-6 RPM)</label>
                        <input type="text" name="dry_rotasi" class="form-control <?= form_error('dry_rotasi') ? 'invalid' : '' ?>" value="<?= $produksi->dry_rotasi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('dry_rotasi')) ? 'd-block' : '' ; ?>">
                            <?= form_error('dry_rotasi') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kadar Air 4 -8 (%)</label>
                        <input type="text" name="dry_kadar_air" class="form-control <?= form_error('dry_kadar_air') ? 'invalid' : '' ?>" value="<?= $produksi->dry_kadar_air; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('dry_kadar_air')) ? 'd-block' : '' ; ?>">
                            <?= form_error('dry_kadar_air') ?>
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
