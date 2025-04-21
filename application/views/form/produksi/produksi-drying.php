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
                <label class="form-label font-weight-bold">Tanggal : <?= $produksi->date;?></label>
                <hr>
                <label class="form-label font-weight-bold">DRYING</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Suhu</label>
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

                <label class="form-label font-weight-bold">PRODUK</label>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Hasil</label>
                        <div class="form-check">
                            <input type="radio" name="produk_hasil" value="oke" class="form-check-input <?= form_error('produk_hasil') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_hasil == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_hasil" value="tidak" class="form-check-input <?= form_error('produk_hasil') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_hasil == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_hasil')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_hasil') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Rasa</label>
                        <div class="form-check">
                            <input type="radio" name="produk_rasa" value="oke" class="form-check-input <?= form_error('produk_rasa') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_rasa == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_rasa" value="tidak" class="form-check-input <?= form_error('produk_rasa') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_rasa == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_rasa')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_rasa') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Aroma</label>
                        <div class="form-check">
                            <input type="radio" name="produk_aroma" value="oke" class="form-check-input <?= form_error('produk_aroma') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_aroma == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_aroma" value="tidak" class="form-check-input <?= form_error('produk_aroma') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_aroma == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_aroma')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_aroma') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Tekstur</label>
                        <div class="form-check">
                            <input type="radio" name="produk_tekstur" value="oke" class="form-check-input <?= form_error('produk_tekstur') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_tekstur == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_tekstur" value="tidak" class="form-check-input <?= form_error('produk_tekstur') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_tekstur == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_tekstur')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_tekstur') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Warna</label>
                        <div class="form-check">
                            <input type="radio" name="produk_warna" value="oke" class="form-check-input <?= form_error('produk_warna') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_warna == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_warna" value="tidak" class="form-check-input <?= form_error('produk_warna') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_warna == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_warna')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_warna') ?>
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
