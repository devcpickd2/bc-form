<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Pemeriksaan Chemical dari Supplier</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('pemeriksaanchemical')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Pemeriksaan Chemical dari Supplier</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('pemeriksaanchemical/edit/'.$pemeriksaanchemical->uuid);?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->date; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $pemeriksaanchemical->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $pemeriksaanchemical->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $pemeriksaanchemical->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> "><?= form_error('shift') ?></div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jenis Chemical</label>
                            <input type="text" name="jenis_chemical" class="form-control <?= form_error('jenis_chemical') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->jenis_chemical; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jenis_chemical')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jenis_chemical') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Pemasok</label>
                            <input type="text" name="pemasok" class="form-control <?= form_error('pemasok') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->pemasok; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('pemasok')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('pemasok') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jenis Mobil</label>
                            <input type="text" name="jenis_mobil" class="form-control <?= form_error('jenis_mobil') ? 'invalid' : '' ?>" value="<?= set_value('jenis_mobil', $pemeriksaanchemical->jenis_mobil); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jenis_mobil')) ? 'd-block' : '' ?>"><?= form_error('jenis_mobil') ?></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">No. Polisi</label>
                            <input type="text" name="no_polisi" class="form-control <?= form_error('no_polisi') ? 'invalid' : '' ?>" value="<?= set_value('no_polisi', $pemeriksaanchemical->no_polisi); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('no_polisi')) ? 'd-block' : '' ?>"><?= form_error('no_polisi') ?></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Identitas Pengantar</label>
                            <input type="text" name="identitas_pengantar" class="form-control <?= form_error('identitas_pengantar') ? 'invalid' : '' ?>" value="<?= set_value('identitas_pengantar', $pemeriksaanchemical->identitas_pengantar); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('identitas_pengantar')) ? 'd-block' : '' ?>"><?= form_error('identitas_pengantar') ?></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">No. PO / DO</label>
                            <input type="text" name="no_po" class="form-control <?= form_error('no_po') ? 'invalid' : '' ?>" value="<?= set_value('no_po', $pemeriksaanchemical->no_po); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('no_po')) ? 'd-block' : '' ?>"><?= form_error('no_po') ?></div>
                        </div>
                    </div>
                    <hr>
                    <!-- Kondisi Mobil -->
                    <div class="form-group">
                        <label class="form-label font-weight-bold d-block mb-2">Kondisi Mobil</label>
                        <h6 style="color: red; font-style: italic; font-size: 12px;">*Centang sesuai kondisi</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <?php 
                                        $keterangan = [
                                            1 => 'Bersih', 2 => 'Kotor', 3 => 'Bau', 4 => 'Bocor',
                                            5 => 'Basah', 6 => 'Kering', 7 => 'Bebas Hama'
                                        ];
                                        foreach($keterangan as $label): ?>
                                            <th><?= $label ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach($keterangan as $key => $label): ?>
                                            <td>
                                                <input type="checkbox" name="kondisi_mobil[]" value="<?= $key ?>" 
                                                <?= in_array($key, explode(',', $pemeriksaanchemical->kondisi_mobil ?? '')) ? 'checked' : '' ?> 
                                                style="transform: scale(1.5);">
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Kode Produksi</label>
                            <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->kode_produksi; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_produksi') ?>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Expired</label>
                            <input type="date" name="expired" class="form-control <?= form_error('expired') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->expired; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('expired')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('expired') ?>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Jumlah Barang</label>
                            <input type="text" name="jumlah_barang" class="form-control <?= form_error('jumlah_barang') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->jumlah_barang; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_barang')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_barang') ?>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Sampel (Pcs)</label>
                            <input type="text" name="sampel" class="form-control <?= form_error('sampel') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->sampel; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('sampel')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('sampel') ?>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Jumlah Reject</label>
                            <input type="text" name="jumlah_reject" class="form-control <?= form_error('jumlah_reject') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->jumlah_reject; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_reject')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_reject') ?>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <label class="form-label font-weight-bold">Kondisi Fisik</label>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Kemasan</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('kemasan') ? 'is-invalid' : '' ?>" type="radio" name="kemasan" value="sesuai" <?= $pemeriksaanchemical->kemasan == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('kemasan') ? 'is-invalid' : '' ?>" type="radio" name="kemasan" value="tidak sesuai" <?= $pemeriksaanchemical->kemasan == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('kemasan') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Warna</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('warna') ? 'is-invalid' : '' ?>" type="radio" name="warna" value="sesuai" <?= $pemeriksaanchemical->warna == 'sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('warna') ? 'is-invalid' : '' ?>" type="radio" name="warna" value="tidak sesuai" <?= $pemeriksaanchemical->warna == 'tidak sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('warna') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">pH</label>
                            <input type="text" name="ph" class="form-control <?= form_error('ph') ? 'invalid' : '' ?> " value="<?= $pemeriksaanchemical->ph; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('ph')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('ph') ?>
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Halal</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('halal_berlaku') ? 'is-invalid' : '' ?>" type="radio" name="halal_berlaku" value="berlaku" <?= $pemeriksaanchemical->halal_berlaku == 'berlaku' ? 'checked' : '' ?>>
                                <label class="form-check-label">Berlaku</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('halal_berlaku') ? 'is-invalid' : '' ?>" type="radio" name="halal_berlaku" value="tidak berlaku" <?= $pemeriksaanchemical->halal_berlaku == 'tidak berlaku' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Berlaku</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('halal_berlaku') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold">Segel</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input <?= form_error('segel') ? 'is-invalid' : '' ?>" 
                                    type="radio" name="segel" value="Sesuai" <?= $pemeriksaanchemical->segel=='Sesuai' ? 'checked' : '' ?>>
                                    <label class="form-check-label">Sesuai</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input <?= form_error('segel') ? 'is-invalid' : '' ?>" 
                                    type="radio" name="segel" value="Tidak Sesuai" <?= $pemeriksaanchemical->segel=='Tidak Sesuai' ? 'checked' : '' ?>>
                                    <label class="form-check-label">Tidak Sesuai</label>
                                </div>
                                <div class="invalid-feedback d-block"><?= form_error('segel') ?></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">Penerimaan</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" 
                                type="radio" 
                                name="penerimaan" 
                                value="ok" 
                                <?= ($pemeriksaanchemical->penerimaan ?? '') == 'ok' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ok</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" 
                                type="radio" 
                                name="penerimaan" 
                                value="tolak" 
                                <?= ($pemeriksaanchemical->penerimaan ?? '') == 'tolak' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tolak</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('penerimaan') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="form-label font-weight-bold d-block">COA</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('coa') ? 'is-invalid' : '' ?>" 
                                type="radio" 
                                name="coa" 
                                value="ada" 
                                <?= ($pemeriksaanchemical->coa ?? '') == 'ada' ? 'checked' : '' ?>>
                                <label class="form-check-label">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('coa') ? 'is-invalid' : '' ?>" 
                                type="radio" 
                                name="coa" 
                                value="tidak ada" 
                                <?= ($pemeriksaanchemical->coa ?? '') == 'tidak ada' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Ada</label>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= form_error('penerimaan') ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label" for="bukti_coa">Update Bukti COA</label>
                            <br>
                            <input type="file" name="bukti_coa" id="bukti_coa" class="form-control no-border <?= form_error('bukti_coa') ? 'is-invalid' : '' ?>" accept="image/*,application/pdf" capture="camera">
                            <?php if (!empty($pemeriksaanchemical->bukti_coa)): ?>
                                <a href="<?= base_url('uploads/' . $pemeriksaanchemical->bukti_coa); ?>" target="_blank">Lihat Gambar Sebelumnya</a>
                                <br>
                            <?php endif; ?>
                            <h6 style="color: red; font-style: italic; font-size: 12px;">*Upload COA jika ada</h6>
                            <div class="invalid-feedback <?= form_error('bukti_coa') ? 'd-block' : '' ; ?>">
                                <?= form_error('bukti_coa') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Keterangan</label>
                            <textarea class="form-control" name="keterangan"><?= $pemeriksaanchemical->keterangan; ?></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('keterangan') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"><?= $pemeriksaanchemical->catatan; ?></textarea>
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
                            <a href="<?= base_url('pemeriksaanchemical')?>" class="btn btn-md btn-danger">
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