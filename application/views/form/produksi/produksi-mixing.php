<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Mixing</h1>
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
                <form class="user" method="post" action="<?= base_url('produksi/mixing/'.$produksi->uuid);?>">
                 <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                 <label class="form-label font-weight-bold">Tanggal : <?= $produksi->date;?></label>
                 <hr>
                 <label class="form-label font-weight-bold">MIXING DOUGH</label>
                 <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Waktu Mixing (11 Menit)</label>
                        <input type="text" name="mix_dough_waktu" class="form-control <?= form_error('mix_dough_waktu') ? 'invalid' : '' ?> " value="<?= $produksi->mix_dough_waktu; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('mix_dough_waktu')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('mix_dough_waktu') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Hasil Mixing</label>
                        <select class="form-control <?= form_error('mix_dough_hasil') ? 'invalid' : '' ?>" name="mix_dough_hasil">
                            <option value="1" <?= set_select('mix_dough_hasil', '1'); ?> <?= $produksi->mix_dough_hasil == 1?'selected':'';?>>Oke</option>
                            <option value="2" <?= set_select('mix_dough_hasil', '2'); ?> <?= $produksi->mix_dough_hasil == 2?'selected':'';?>>Tidak Oke</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('mix_dough_hasil')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('mix_dough_hasil') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Nomor Mesin</label>
                        <input type="text" name="mix_dough_mesin" class="form-control <?= form_error('mix_dough_mesin') ? 'invalid' : '' ?> " value="<?= $produksi->mix_dough_mesin; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('mix_dough_mesin')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('mix_dough_mesin') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Dough Cutting (630 - 670 g)</label>
                        <input type="text" name="mix_dough_cutting" class="form-control <?= form_error('mix_dough_cutting') ? 'invalid' : '' ?> " value="<?= $produksi->mix_dough_cutting; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('mix_dough_cutting')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('mix_dough_cutting') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Suhu Ruang (°C)</label>
                        <input type="text" name="mix_dough_suhu_ruang" class="form-control <?= form_error('mix_dough_suhu_ruang') ? 'invalid' : '' ?> " value="<?= $produksi->mix_dough_suhu_ruang; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('mix_dough_suhu_ruang')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('mix_dough_suhu_ruang') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">RH Ruang</label>
                        <input type="text" name="mix_dough_rh_ruang" class="form-control <?= form_error('mix_dough_rh_ruang') ? 'invalid' : '' ?> " value="<?= $produksi->mix_dough_rh_ruang; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('mix_dough_rh_ruang')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('mix_dough_rh_ruang') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Suhu Adonan (29 - 31°C)</label>
                        <input type="text" name="mix_dough_suhu_adonan" class="form-control <?= form_error('mix_dough_suhu_adonan') ? 'invalid' : '' ?> " value="<?= $produksi->mix_dough_suhu_adonan; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('mix_dough_suhu_adonan')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('mix_dough_suhu_adonan') ?>
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