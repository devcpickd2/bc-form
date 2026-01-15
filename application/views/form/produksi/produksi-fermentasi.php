<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proses Fermentasi</h1>
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
                   <label class="form-label font-weight-bold">Kode Produksi : <?= $produksi->kode_produksi;?></label>
                   <hr>
                   <label class="form-label font-weight-bold">FERMENTASI</label>
                   <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Suhu (34 - 36°C)</label>
                        <input type="text" name="fermen_suhu" class="form-control <?= form_error('fermen_suhu') ? 'invalid' : '' ?> " value="<?= $produksi->fermen_suhu; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('fermen_suhu')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('fermen_suhu') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">RH (78 - 82%)</label>
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
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label class="form-label font-weight-bold">Lama Proses (60 - 70 Menit)</label>
                    <input type="text" name="fermen_lama_proses" class="form-control <?= form_error('fermen_lama_proses') ? 'invalid' : '' ?> " value="<?= $produksi->fermen_lama_proses; ?>">
                    <div class="invalid-feedback <?= !empty(form_error('fermen_lama_proses')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('fermen_lama_proses') ?>
                    </div>
                </div>
                <!-- <div class="col-sm-4">
                    <label class="form-label font-weight-bold">Hasil Proofing</label>
                    <input type="text" name="fermen_hasil_proof" class="form-control <?= form_error('fermen_hasil_proof') ? 'invalid' : '' ?> " value="<?= $produksi->fermen_hasil_proof; ?>">
                    <div class="invalid-feedback <?= !empty(form_error('fermen_hasil_proof')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('fermen_hasil_proof') ?>
                    </div>
                </div> -->
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