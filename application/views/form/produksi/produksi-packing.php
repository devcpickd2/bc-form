<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">PACKING AREA</h1>
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
            <form class="user" method="post" action="<?= base_url('produksi/packing/'.$produksi->uuid);?>" enctype="multipart/form-data">
                <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                <label class="form-label font-weight-bold">Kode Produksi : <?= $produksi->kode_produksi;?></label>
                <hr>
                <label class="form-label font-weight-bold">SENSORI PRODUK</label>
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
                <hr>
                <label class="form-label font-weight-bold">KEMASAN</label>
                <div class="form-group row">
                    <!-- <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Nama Produk</label>
                        <input type="text" name="packing_nama_produk" class="form-control <?= form_error('packing_nama_produk') ? 'invalid' : '' ?>" value="<?= $produksi->nama_produk; ?>" readonly>
                        <div class="invalid-feedback <?= !empty(form_error('packing_nama_produk')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_nama_produk') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Kode Kemasan</label>
                        <input type="text" name="packing_kode_kemasan" class="form-control <?= form_error('packing_kode_kemasan') ? 'invalid' : '' ?>" value="<?= $produksi->kode_produksi; ?>" readonly>
                        <div class="invalid-feedback <?= !empty(form_error('packing_kode_kemasan')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_kode_kemasan') ?>
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Best Before</label>
                        <?php
                        $bb_date = (new DateTime($produksi->date))->modify('+1 year')->format('Y-m-d');
                        ?>
                        <input type="date" name="packing_bb" class="form-control <?= form_error('packing_bb') ? 'invalid' : '' ?>" value="<?= $bb_date; ?>">

                        <div class="invalid-feedback <?= !empty(form_error('packing_bb')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_bb') ?>
                        </div>
                    </div> -->
                    <div class="col-sm-4">
                        <label class="form-label" for="gambar_kode_kemasan">Aktual Nama, Kode, Best Before Kemasan</label>
                        <br>
                        <div class="custom-file">
                            <input type="file" name="gambar_kode_kemasan" id="gambar_kode_kemasan" 
                            class="custom-file-input <?= form_error('gambar_kode_kemasan') ? 'is-invalid' : '' ?>" 
                            accept="image/*,application/pdf" capture="camera">
                            <label class="custom-file-label" for="gambar_kode_kemasan">Masukkan Gambar...</label>
                        </div>

                        <?php if (!empty($produksi->gambar_kode_kemasan)): ?>
                            <a href="<?= base_url('uploads/' . $produksi->gambar_kode_kemasan); ?>" target="_blank" class="d-block mt-2">
                                Lihat Gambar Sebelumnya
                            </a>
                        <?php endif; ?>

                        <small class="text-danger font-italic d-block mt-1">
                            *Masukkan gambar kemasan
                        </small>

                        <div class="invalid-feedback <?= form_error('gambar_kode_kemasan') ? 'd-block' : '' ; ?>">
                            <?= form_error('gambar_kode_kemasan') ?>
                        </div>
                    </div>                    
                </div>
                <!-- <div class="form-group row">
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Suhu Produk Sebelum Packing (32 - 35°C)</label>
                        <input type="text" name="packing_suhu_before" class="form-control <?= form_error('packing_suhu_before') ? 'invalid' : '' ?>" value="<?= $produksi->packing_suhu_before; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_suhu_before')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_suhu_before') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Kadar Air Produk (4 - 8%)</label>
                        <input type="text" name="packing_kadar_air" class="form-control <?= form_error('packing_kadar_air') ? 'invalid' : '' ?>" value="<?= $produksi->packing_kadar_air; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_kadar_air')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_kadar_air') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Bulk Density (225 - 325 g/l)</label>
                        <input type="text" name="packing_bulk_density" class="form-control <?= form_error('packing_bulk_density') ? 'invalid' : '' ?>" value="<?= $produksi->packing_bulk_density; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_bulk_density')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_bulk_density') ?>
                        </div>
                    </div>
                </div>
                <hr> -->
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kondisi Kemasan</label>
                        <select class="form-control <?= form_error('packing_kondisi_kemasan') ? 'invalid' : '' ?>" name="packing_kondisi_kemasan">
                            <option value="1" <?= set_select('packing_kondisi_kemasan', '1'); ?> <?= $produksi->packing_kondisi_kemasan == 1?'selected':'';?>>Oke</option>
                            <option value="2" <?= set_select('packing_kondisi_kemasan', '2'); ?> <?= $produksi->packing_kondisi_kemasan == 2?'selected':'';?>>Tidak Oke</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('packing_kondisi_kemasan')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_kondisi_kemasan') ?>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                        <label class="form-label" for="gambar_kondisi_kemasan">Aktual Kondisi Kemasan</label>
                        <br>
                        <input type="file" name="gambar_kondisi_kemasan" id="gambar_kondisi_kemasan" class="form-control no-border <?= form_error('gambar_kondisi_kemasan') ? 'is-invalid' : '' ?>" accept="image/*,application/pdf" capture="camera">
                        <?php if (!empty($produksi->gambar_kondisi_kemasan)): ?>
                            <a href="<?= base_url('uploads/' . $produksi->gambar_kondisi_kemasan); ?>" target="_blank">Lihat Gambar Sebelumnya</a>
                            <br>
                        <?php endif; ?>
                        <br>
                        <div class="invalid-feedback <?= form_error('gambar_kondisi_kemasan') ? 'd-block' : '' ; ?>">
                            <?= form_error('gambar_kondisi_kemasan') ?>
                        </div>
                    </div>  --> 
                  <!--   <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Ketepatan Labelisasi</label>
                        <select class="form-control <?= form_error('packing_ketepatan') ? 'invalid' : '' ?>" name="packing_ketepatan">
                            <option value="1" <?= set_select('packing_ketepatan', '1'); ?> <?= $produksi->packing_ketepatan == 1?'selected':'';?>>Oke</option>
                            <option value="2" <?= set_select('packing_ketepatan', '2'); ?> <?= $produksi->packing_ketepatan == 2?'selected':'';?>>Tidak Oke</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('packing_ketepatan')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_ketepatan') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Kode Supplier Kemasan</label>
                        <input type="text" name="packing_kode_supplier" class="form-control <?= form_error('packing_kode_supplier') ? 'invalid' : '' ?>" value="<?= $produksi->packing_kode_supplier; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_kode_supplier')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_kode_supplier') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Nett Weight (9,850 - 10,100 g/plastic bag)</label>
                        <input type="text" name="packing_net_weight" class="form-control <?= form_error('packing_net_weight') ? 'invalid' : '' ?>" value="<?= $produksi->packing_net_weight; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('packing_net_weight')) ? 'd-block' : '' ; ?>">
                            <?= form_error('packing_net_weight') ?>
                        </div>
                    </div> -->
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"><?= $produksi->catatan; ?></textarea>
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
