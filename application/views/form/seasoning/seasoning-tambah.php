<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Seasoning dari Pemasok</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('seasoning')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Seasoning dari Pemasok</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('seasoning/tambah');?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jenis Seasoning</label>
                            <input type="text" name="jenis_seasoning" class="form-control <?= form_error('jenis_seasoning') ? 'invalid' : '' ?> " value="<?= set_value('jenis_seasoning'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jenis_seasoning')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jenis_seasoning') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Spesifikasi</label>
                            <input type="text" name="spesifikasi" class="form-control <?= form_error('spesifikasi') ? 'invalid' : '' ?> " value="<?= set_value('spesifikasi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('spesifikasi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('spesifikasi') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Pemasok</label>
                            <input type="text" name="pemasok" class="form-control <?= form_error('pemasok') ? 'invalid' : '' ?> " value="<?= set_value('pemasok'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('pemasok')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('pemasok') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jenis Mobil</label>
                            <input type="text" name="jenis_mobil" class="form-control <?= form_error('jenis_mobil') ? 'invalid' : '' ?> " value="<?= set_value('jenis_mobil'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jenis_mobil')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jenis_mobil') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">No. Polisi</label>
                            <input type="text" name="no_polisi" class="form-control <?= form_error('no_polisi') ? 'invalid' : '' ?> " value="<?= set_value('no_polisi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('no_polisi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('no_polisi') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Identitas Pengantar</label>
                            <input type="text" name="identitas_pengantar" class="form-control <?= form_error('identitas_pengantar') ? 'invalid' : '' ?> " value="<?= set_value('identitas_pengantar'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('identitas_pengantar')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('identitas_pengantar') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">No. PO / DO</label>
                            <input type="text" name="no_po" class="form-control <?= form_error('no_po') ? 'invalid' : '' ?> " value="<?= set_value('no_po'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('no_po')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('no_po') ?>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="form-label font-weight-bold d-block mb-2">Kondisi Mobil</label>
                        <h6 style="color: red; font-style: italic; font-size: 12px;">*Centang sesuai kondisi</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <?php 
                                        $keterangan = [
                                            1 => 'Bersih',
                                            2 => 'Kotor',
                                            3 => 'Bau',
                                            4 => 'Bocor',
                                            5 => 'Basah',
                                            6 => 'Kering',
                                            7 => 'Bebas Hama'
                                        ];
                                        for ($i = 1; $i <= 7; $i++): ?>
                                            <th><?= $keterangan[$i] ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for ($i = 1; $i <= 7; $i++): ?>
                                            <td>
                                                <input type="checkbox" name="kondisi_mobil[]" value="<?= $i ?>" <?= set_checkbox('kondisi_mobil[]', $i) ?> style="transform: scale(1.5);">
                                            </td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kode Produksi</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= set_value('kode_produksi'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_produksi') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Expired Date</label>
                            <input type="date" name="expired" class="form-control <?= form_error('expired') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('expired')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('expired') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Jumlah Barang</label>
                            <input type="text" name="jumlah_barang" class="form-control <?= form_error('jumlah_barang') ? 'invalid' : '' ?> " value="<?= set_value('jumlah_barang'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_barang')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_barang') ?>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Sampel</label>
                            <input type="text" name="sampel" class="form-control <?= form_error('sampel') ? 'invalid' : '' ?> " value="<?= set_value('sampel'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('sampel')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('sampel') ?>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Jumlah Reject</label>
                            <input type="text" name="jumlah_reject" class="form-control <?= form_error('jumlah_reject') ? 'invalid' : '' ?> " value="<?= set_value('jumlah_reject'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_reject')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_reject') ?>
                            </div> 
                        </div> 
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="form-label font-weight-bold d-block mb-2">Kondisi Fisik</label>
                        <h6 style="color: red; font-style: italic; font-size: 12px;">*Centang jika sesuai</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <?php 
                                        $fisik = [
                                            'kemasan' => 'Kemasan',
                                            'warna' => 'Warna',
                                            'kotoran' => 'Kotoran',
                                            'aroma' => 'Aroma'
                                        ];
                                        foreach ($fisik as $key => $label): ?>
                                            <th><?= $label ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($fisik as $key => $label): ?>
                                            <td>
                                                <input type="checkbox" name="<?= $key ?>" value="sesuai" <?= set_value($key) == 'sesuai' ? 'checked' : '' ?> style="transform: scale(1.5);">
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">Spesifikasi</label>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Kadar Air (%)</label>
                            <input type="text" name="kadar_air" class="form-control <?= form_error('kadar_air') ? 'invalid' : '' ?> " value="<?= set_value('kadar_air'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kadar_air')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kadar_air') ?>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Negara Asal Dibuat</label>
                            <input type="text" name="negara_asal" class="form-control <?= form_error('negara_asal') ? 'invalid' : '' ?> " value="<?= set_value('negara_asal'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('negara_asal')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('negara_asal') ?>
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Segel</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input <?= form_error('segel') ? 'is-invalid' : '' ?>" 
                                    type="radio" name="segel" id="segel_sesuai" value="Sesuai" 
                                    <?= set_value('segel') == 'Sesuai' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="segel_sesuai">Sesuai</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input <?= form_error('segel') ? 'is-invalid' : '' ?>" 
                                    type="radio" name="segel" id="segel_tidak" value="Tidak Sesuai" 
                                    <?= set_value('segel') == 'Tidak Sesuai' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="segel_tidak">Tidak Sesuai</label>
                                </div>
                                <div class="invalid-feedback d-block">
                                    <?= form_error('segel') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Logo Halal</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('logo_halal') ? 'is-invalid' : '' ?>" type="radio" name="logo_halal" value="ada" <?= set_value('logo_halal') == 'ada' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('logo_halal') ? 'is-invalid' : '' ?>" type="radio" name="logo_halal" value="tidak ada" <?= set_value('logo_halal') == 'tidak ada' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Ada</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('logo_halal') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">Persyaratan Dokumen & Allergen</label>
                    <div class="form-group row">

                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Halal</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('sertif_halal') ? 'is-invalid' : '' ?>" type="radio" name="sertif_halal" value="berlaku" <?= set_value('sertif_halal') == 'berlaku' ? 'checked' : '' ?>>
                                <label class="form-check-label">Berlaku</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('sertif_halal') ? 'is-invalid' : '' ?>" type="radio" name="sertif_halal" value="tidak berlaku" <?= set_value('sertif_halal') == 'tidak berlaku' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Berlaku</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('sertif_halal') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">COA</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('coa') ? 'is-invalid' : '' ?>" type="radio" name="coa" value="ada" <?= set_value('coa') == 'ada' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('coa') ? 'is-invalid' : '' ?>" type="radio" name="coa" value="tidak ada" <?= set_value('coa') == 'tidak ada' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Ada</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('coa') ?>
                            </div>
                        </div>
                        <div class="col-sm-3"> 
                            <label class="form-label font-weight-bold d-block">Allergen</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('allergen') ? 'is-invalid' : '' ?>" type="radio" name="allergen" value="allergen" <?= set_value('allergen') == 'allergen' ? 'checked' : '' ?>>
                                <label class="form-check-label">Allergen</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('allergen') ? 'is-invalid' : '' ?>" type="radio" name="allergen" value="non allergen" <?= set_value('allergen') == 'non allergen' ? 'checked' : '' ?>>
                                <label class="form-check-label">Non Allergen</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('allergen') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Penerimaan</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" type="radio" name="penerimaan" value="ok" <?= set_value('penerimaan') == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" type="radio" name="penerimaan" value="tolak" <?= set_value('penerimaan') == 'tolak' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tolak</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('penerimaan') ?>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label">Upload Bukti COA</label><br>
                            <input type="file" name="bukti_coa" class="form-control <?= form_error('bukti_coa') ? 'is-invalid' : '' ?>" accept="image/*,application/pdf">
                            <div class="invalid-feedback"><?= form_error('bukti_coa') ?></div>
                            <h6 style="color: red; font-style: italic; font-size: 12px;">*Upload COA jika ada</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('keterangan') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('catatan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('seasoning')?>" class="btn btn-md btn-danger">
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