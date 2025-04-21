<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Fermentasi & Electric Baking</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('produksi')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Laporan Verifikasi Proses Produksi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li> 
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('produksi/fermentasi/'.$produksi->uuid);?>">
                 <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                 <label class="form-label font-weight-bold">Tanggal : <?= $produksi->date;?></label>
                 <hr>
                 <label class="form-label font-weight-bold">FERMENTASI</label>
                 <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Suhu (°C)</label>
                        <input type="text" name="fermen_suhu" class="form-control <?= form_error('fermen_suhu') ? 'invalid' : '' ?> " value="<?= $produksi->fermen_suhu; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('fermen_suhu')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('fermen_suhu') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">RH (%)</label>
                        <input type="text" name="fermen_rh" class="form-control <?= form_error('fermen_rh') ? 'invalid' : '' ?> " value="<?= $produksi->fermen_rh; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('fermen_rh')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('fermen_rh') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                   <div class="col-sm-4">
                    <label class="form-label font-weight-bold">Jam Mulai</label>
                    <input type="time" name="fermen_jam_mulai" class="form-control <?= form_error('fermen_jam_mulai') ? 'invalid' : '' ?> " value="<?= $produksi->fermen_jam_mulai; ?>">
                    <div class="invalid-feedback <?= !empty(form_error('fermen_jam_mulai')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('fermen_jam_mulai') ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="form-label font-weight-bold">Jam Selesai</label>
                    <input type="time" name="fermen_jam_selesai" class="form-control <?= form_error('fermen_jam_selesai') ? 'invalid' : '' ?> " value="<?= $produksi->fermen_jam_selesai; ?>">
                    <div class="invalid-feedback <?= !empty(form_error('fermen_jam_selesai')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('fermen_jam_selesai') ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="form-label font-weight-bold">Lama Proses</label>
                    <input type="text" name="fermen_lama_proses" class="form-control <?= form_error('fermen_lama_proses') ? 'invalid' : '' ?> " value="<?= $produksi->fermen_lama_proses; ?>">
                    <div class="invalid-feedback <?= !empty(form_error('fermen_lama_proses')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('fermen_lama_proses') ?>
                    </div>
                </div>
            </div>
            <hr>
            <label class="form-label font-weight-bold">ELECTRIC BAKING</label>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label class="form-label font-weight-bold">Suhu Produk (80 - 97°C)</label>
                    <input type="text" name="electric_baking_suhu" class="form-control <?= form_error('electric_baking_suhu') ? 'invalid' : '' ?> " value="<?= $produksi->electric_baking_suhu; ?>">
                    <div class="invalid-feedback <?= !empty(form_error('electric_baking_suhu')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('electric_baking_suhu') ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="form-label font-weight-bold">No. Mesin</label>
                    <input type="text" name="electric_baking_mesin" class="form-control <?= form_error('electric_baking_mesin') ? 'invalid' : '' ?> " value="<?= $produksi->electric_baking_mesin; ?>">
                    <div class="invalid-feedback <?= !empty(form_error('electric_baking_mesin')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('electric_baking_mesin') ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="form-label font-weight-bold">Expand Roti (%)</label>
                    <input type="text" name="electric_baking_expand" class="form-control <?= form_error('electric_baking_expand') ? 'invalid' : '' ?> " value="<?= $produksi->electric_baking_expand; ?>">
                    <div class="invalid-feedback <?= !empty(form_error('electric_baking_expand')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('electric_baking_expand') ?>
                    </div>
                </div>
            </div>
            <hr>
            <label class="form-label font-weight-bold">SENSORI</label>
            <div class="form-group row">
                <div class="col-sm-2">
                    <label class="form-label font-weight-bold mb-2">Kematangan</label>
                    <div class="form-check">
                        <input type="radio" name="sens_kematangan" value="oke" class="form-check-input <?= form_error('sens_kematangan') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_kematangan == 'oke') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Oke</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="sens_kematangan" value="tidak" class="form-check-input <?= form_error('sens_kematangan') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_kematangan == 'tidak') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Tidak</label>
                    </div>
                    <div class="invalid-feedback <?= !empty(form_error('sens_kematangan')) ? 'd-block' : ''; ?>">
                        <?= form_error('sens_kematangan') ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="form-label font-weight-bold mb-2">Rasa</label>
                    <div class="form-check">
                        <input type="radio" name="sens_rasa" value="oke" class="form-check-input <?= form_error('sens_rasa') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_rasa == 'oke') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Oke</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="sens_rasa" value="tidak" class="form-check-input <?= form_error('sens_rasa') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_rasa == 'tidak') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Tidak</label>
                    </div>
                    <div class="invalid-feedback <?= !empty(form_error('sens_rasa')) ? 'd-block' : ''; ?>">
                        <?= form_error('sens_rasa') ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="form-label font-weight-bold mb-2">Aroma</label>
                    <div class="form-check">
                        <input type="radio" name="sens_aroma" value="oke" class="form-check-input <?= form_error('sens_aroma') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_aroma == 'oke') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Oke</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="sens_aroma" value="tidak" class="form-check-input <?= form_error('sens_aroma') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_aroma == 'tidak') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Tidak</label>
                    </div>
                    <div class="invalid-feedback <?= !empty(form_error('sens_aroma')) ? 'd-block' : ''; ?>">
                        <?= form_error('sens_aroma') ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="form-label font-weight-bold mb-2">Tekstur</label>
                    <div class="form-check">
                        <input type="radio" name="sens_tekstur" value="oke" class="form-check-input <?= form_error('sens_tekstur') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_tekstur == 'oke') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Oke</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="sens_tekstur" value="tidak" class="form-check-input <?= form_error('sens_tekstur') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_tekstur == 'tidak') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Tidak</label>
                    </div>
                    <div class="invalid-feedback <?= !empty(form_error('sens_tekstur')) ? 'd-block' : ''; ?>">
                        <?= form_error('sens_tekstur') ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="form-label font-weight-bold mb-2">Warna</label>
                    <div class="form-check">
                        <input type="radio" name="sens_warna" value="oke" class="form-check-input <?= form_error('sens_warna') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_warna == 'oke') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Oke</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="sens_warna" value="tidak" class="form-check-input <?= form_error('sens_warna') ? 'is-invalid' : '' ?>" <?= ($produksi->sens_warna == 'tidak') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Tidak</label>
                    </div>
                    <div class="invalid-feedback <?= !empty(form_error('sens_warna')) ? 'd-block' : ''; ?>">
                        <?= form_error('sens_warna') ?>
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