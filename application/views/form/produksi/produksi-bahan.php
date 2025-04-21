<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Raw Material</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('produksi')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Laporan Verifikasi Proses Produksi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">List Raw Material</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
             <form class="user" method="post" action="<?= base_url('produksi/bahan/'.$produksi->uuid);?>">
                <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                <label class="form-label font-weight-bold">Tanggal : <?= $produksi->date;?></label>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <div class="d-flex align-items-center">
                            <label class="form-label font-weight-bold mb-0 me-3">Kode Produksi</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'is-invalid' : '' ?>" value="<?= $produksi->kode_produksi; ?>">
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : ''; ?>">
                            <?= form_error('kode_produksi') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <label class="form-label font-weight-bold">TEPUNG TERIGU</label>
                <div class="form-group row">
                    <!-- Kode Input -->
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Kode</label>
                        <input type="text" name="tegu_kode" class="form-control <?= form_error('tegu_kode') ? 'is-invalid' : '' ?>" value="<?= $produksi->tegu_kode; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tegu_kode')) ? 'd-block' : ''; ?>">
                            <?= form_error('tegu_kode') ?>
                        </div>
                    </div>
                    <br>
                    <!-- Berat Input -->
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Berat</label>
                        <input type="text" name="tegu_berat" class="form-control <?= form_error('tegu_berat') ? 'is-invalid' : '' ?>" value="<?= $produksi->tegu_berat; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tegu_berat')) ? 'd-block' : ''; ?>">
                            <?= form_error('tegu_berat') ?>
                        </div>
                    </div>

                    <!-- Sensori Radio Buttons -->
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Sensori</label>
                        <div class="form-check">
                            <input type="radio" name="tegu_sens" value="oke" class="form-check-input <?= form_error('tegu_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->tegu_sens == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="tegu_sens" value="tidak" class="form-check-input <?= form_error('tegu_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->tegu_sens == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('tegu_sens')) ? 'd-block' : ''; ?>">
                            <?= form_error('tegu_sens') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <label class="form-label font-weight-bold">TAPIOKA STRACTH</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Kode</label>
                        <input type="text" name="tapioka_kode" class="form-control <?= form_error('tapioka_kode') ? 'is-invalid' : '' ?>" value="<?= $produksi->tapioka_kode; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tapioka_kode')) ? 'd-block' : ''; ?>">
                            <?= form_error('tapioka_kode') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Berat</label>
                        <input type="text" name="tapioka_berat" class="form-control <?= form_error('tapioka_berat') ? 'is-invalid' : '' ?>" value="<?= $produksi->tapioka_berat; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('tapioka_berat')) ? 'd-block' : ''; ?>">
                            <?= form_error('tapioka_berat') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Sensori</label>
                        <div class="form-check">
                            <input type="radio" name="tapioka_sens" value="oke" class="form-check-input <?= form_error('tapioka_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->tapioka_sens == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="tapioka_sens" value="tidak" class="form-check-input <?= form_error('tapioka_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->tapioka_sens == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('tapioka_sens')) ? 'd-block' : ''; ?>">
                            <?= form_error('tapioka_sens') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <label class="form-label font-weight-bold">RAGI</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Kode</label>
                        <input type="text" name="ragi_kode" class="form-control <?= form_error('ragi_kode') ? 'is-invalid' : '' ?>" value="<?= $produksi->ragi_kode; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('ragi_kode')) ? 'd-block' : ''; ?>">
                            <?= form_error('ragi_kode') ?>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Berat</label>
                        <input type="text" name="ragi_berat" class="form-control <?= form_error('ragi_berat') ? 'is-invalid' : '' ?>" value="<?= $produksi->ragi_berat; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('ragi_berat')) ? 'd-block' : ''; ?>">
                            <?= form_error('ragi_berat') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Sensori</label>
                        <div class="form-check">
                            <input type="radio" name="ragi_sens" value="oke" class="form-check-input <?= form_error('ragi_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->ragi_sens == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="ragi_sens" value="tidak" class="form-check-input <?= form_error('ragi_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->ragi_sens == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('ragi_sens')) ? 'd-block' : ''; ?>">
                            <?= form_error('ragi_sens') ?>
                        </div>
                    </div>
                </div>
                <hr> 
                <label class="form-label font-weight-bold">BREAD IMPROVER</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Kode</label>
                        <input type="text" name="bread_kode" class="form-control <?= form_error('bread_kode') ? 'is-invalid' : '' ?>" value="<?= $produksi->bread_kode; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('bread_kode')) ? 'd-block' : ''; ?>">
                            <?= form_error('bread_kode') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Berat</label>
                        <input type="text" name="bread_berat" class="form-control <?= form_error('bread_berat') ? 'is-invalid' : '' ?>" value="<?= $produksi->bread_berat; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('bread_berat')) ? 'd-block' : ''; ?>">
                            <?= form_error('bread_berat') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Sensori</label>
                        <div class="form-check">
                            <input type="radio" name="bread_sens" value="oke" class="form-check-input <?= form_error('bread_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->bread_sens == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="bread_sens" value="tidak" class="form-check-input <?= form_error('bread_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->bread_sens == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('bread_sens')) ? 'd-block' : ''; ?>">
                            <?= form_error('bread_sens') ?>
                        </div>
                    </div>
                </div>

                <hr>
                <label class="form-label font-weight-bold">PREMIX</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kode</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Berat</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Sensori</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 1</label>
                        <input type="text" name="premix_kode_1" class="form-control <?= form_error('premix_kode_1') ? 'is-invalid' : '' ?>" value="<?= $produksi->premix_kode_1; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('premix_kode_1')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_kode_1') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 1</label>
                        <input type="text" name="premix_berat_1" class="form-control <?= form_error('premix_berat_1') ? 'is-invalid' : '' ?>" value="<?= $produksi->premix_berat_1; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('premix_berat_1')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_berat_1') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 1</label>
                        <div class="form-check col-sm-2">
                            <input type="radio" name="premix_sens_1" value="oke" class="form-check-input <?= form_error('premix_sens_1') ? 'is-invalid' : '' ?>" <?= ($produksi->premix_sens_1 == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check col-sm-2">
                            <input type="radio" name="premix_sens_1" value="tidak" class="form-check-input <?= form_error('premix_sens_1') ? 'is-invalid' : '' ?>" <?= ($produksi->premix_sens_1 == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('premix_sens_1')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_sens_1') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 2</label>
                        <input type="text" name="premix_kode_2" class="form-control <?= form_error('premix_kode_2') ? 'is-invalid' : '' ?>" value="<?= $produksi->premix_kode_2; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('premix_kode_2')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_kode_2') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 2</label>
                        <input type="text" name="premix_berat_2" class="form-control <?= form_error('premix_berat_2') ? 'is-invalid' : '' ?>" value="<?= $produksi->premix_berat_2; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('premix_berat_2')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_berat_2') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 2</label>
                        <div class="form-check col-sm-2">
                            <input type="radio" name="premix_sens_2" value="oke" class="form-check-input <?= form_error('premix_sens_2') ? 'is-invalid' : '' ?>" <?= ($produksi->premix_sens_2 == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check col-sm-2">
                            <input type="radio" name="premix_sens_2" value="tidak" class="form-check-input <?= form_error('premix_sens_2') ? 'is-invalid' : '' ?>" <?= ($produksi->premix_sens_2 == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('premix_sens_2')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_sens_2') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 3</label>
                        <input type="text" name="premix_kode_3" class="form-control <?= form_error('premix_kode_3') ? 'is-invalid' : '' ?>" value="<?= $produksi->premix_kode_3; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('premix_kode_3')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_kode_3') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 3</label>
                        <input type="text" name="premix_berat_3" class="form-control <?= form_error('premix_berat_3') ? 'is-invalid' : '' ?>" value="<?= $produksi->premix_berat_3; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('premix_berat_3')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_berat_3') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Premix 3</label>
                        <div class="form-check col-sm-2">
                            <input type="radio" name="premix_sens_3" value="oke" class="form-check-input <?= form_error('premix_sens_3') ? 'is-invalid' : '' ?>" <?= ($produksi->premix_sens_3 == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check col-sm-2">
                            <input type="radio" name="premix_sens_3" value="tidak" class="form-check-input <?= form_error('premix_sens_3') ? 'is-invalid' : '' ?>" <?= ($produksi->premix_sens_3 == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('premix_sens_3')) ? 'd-block' : ''; ?>">
                            <?= form_error('premix_sens_3') ?>
                        </div>
                    </div>
                </div>
                
                <hr>
                <label class="form-label font-weight-bold">SHORTENING</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Kode</label>
                        <input type="text" name="shortening_kode" class="form-control <?= form_error('shortening_kode') ? 'is-invalid' : '' ?>" value="<?= $produksi->shortening_kode; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('shortening_kode')) ? 'd-block' : ''; ?>">
                            <?= form_error('shortening_kode') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Berat</label>
                        <input type="text" name="shortening_berat" class="form-control <?= form_error('shortening_berat') ? 'is-invalid' : '' ?>" value="<?= $produksi->shortening_berat; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('shortening_berat')) ? 'd-block' : ''; ?>">
                            <?= form_error('shortening_berat') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Sensori</label>
                        <div class="form-check">
                            <input type="radio" name="shortening_sens" value="oke" class="form-check-input <?= form_error('shortening_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->shortening_sens == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="shortening_sens" value="tidak" class="form-check-input <?= form_error('shortening_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->shortening_sens == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('shortening_sens')) ? 'd-block' : ''; ?>">
                            <?= form_error('shortening_sens') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <label class="form-label font-weight-bold">CHILL WATER (15 ± 1°C)</label>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Kode</label>
                        <input type="text" name="chill_water_kode" class="form-control <?= form_error('chill_water_kode') ? 'is-invalid' : '' ?>" value="<?= $produksi->chill_water_kode; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('chill_water_kode')) ? 'd-block' : ''; ?>">
                            <?= form_error('chill_water_kode') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Berat</label>
                        <input type="text" name="chill_water_berat" class="form-control <?= form_error('chill_water_berat') ? 'is-invalid' : '' ?>" value="<?= $produksi->chill_water_berat; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('chill_water_berat')) ? 'd-block' : ''; ?>">
                            <?= form_error('chill_water_berat') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold mb-2">Sensori</label>
                        <div class="form-check">
                            <input type="radio" name="chill_water_sens" value="oke" class="form-check-input <?= form_error('chill_water_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->chill_water_sens == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="chill_water_sens" value="tidak" class="form-check-input <?= form_error('chill_water_sens') ? 'is-invalid' : '' ?>" <?= ($produksi->chill_water_sens == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('chill_water_sens')) ? 'd-block' : ''; ?>">
                            <?= form_error('chill_water_sens') ?>
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
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>

