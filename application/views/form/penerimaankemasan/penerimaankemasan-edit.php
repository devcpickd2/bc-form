<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Pemeriksaan Penerimaan Kemasan dari Supplier</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('penerimaankemasan')?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Penerimaan Kemasan dari Supplier
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav> 
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('penerimaankemasan/edit/'.$penerimaankemasan->uuid);?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>" value="<?= set_value('date', $penerimaankemasan->date) ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">Shift</label>
                        <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
                            <option disabled <?= empty($penerimaankemasan->shift) ? 'selected' : '' ?>>Pilih Shift</option>
                            <option value="1" <?= set_select('shift', '1', $penerimaankemasan->shift == '1') ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', '2', $penerimaankemasan->shift == '2') ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', '3', $penerimaankemasan->shift == '3') ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Jenis Kemasan</label>
                        <input type="text" name="jenis_kemasan" class="form-control <?= form_error('jenis_kemasan') ? 'invalid' : '' ?>" value="<?= set_value('jenis_kemasan', $penerimaankemasan->jenis_kemasan); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('jenis_kemasan')) ? 'd-block' : '' ?>"><?= form_error('jenis_kemasan') ?></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Pemasok</label>
                        <input type="text" name="pemasok" class="form-control <?= form_error('pemasok') ? 'invalid' : '' ?>" value="<?= set_value('pemasok', $penerimaankemasan->pemasok); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('pemasok')) ? 'd-block' : '' ?>"><?= form_error('pemasok') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Jenis Mobil</label>
                        <input type="text" name="jenis_mobil" class="form-control <?= form_error('jenis_mobil') ? 'invalid' : '' ?>" value="<?= set_value('jenis_mobil', $penerimaankemasan->jenis_mobil); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('jenis_mobil')) ? 'd-block' : '' ?>"><?= form_error('jenis_mobil') ?></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">No. Polisi</label>
                        <input type="text" name="no_polisi" class="form-control <?= form_error('no_polisi') ? 'invalid' : '' ?>" value="<?= set_value('no_polisi', $penerimaankemasan->no_polisi); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('no_polisi')) ? 'd-block' : '' ?>"><?= form_error('no_polisi') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Identitas Pengantar</label>
                        <input type="text" name="identitas_pengantar" class="form-control <?= form_error('identitas_pengantar') ? 'invalid' : '' ?>" value="<?= set_value('identitas_pengantar', $penerimaankemasan->identitas_pengantar); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('identitas_pengantar')) ? 'd-block' : '' ?>"><?= form_error('identitas_pengantar') ?></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">No. PO / DO</label>
                        <input type="text" name="no_po" class="form-control <?= form_error('no_po') ? 'invalid' : '' ?>" value="<?= set_value('no_po', $penerimaankemasan->no_po); ?>">
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
                                            <?= in_array($key, explode(',', $penerimaankemasan->kondisi_mobil ?? '')) ? 'checked' : '' ?> 
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
                        <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'invalid' : '' ?> " value="<?= $penerimaankemasan->kode_produksi; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('kode_produksi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('kode_produksi') ?>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Jumlah Datang</label>
                        <input type="text" name="jumlah_datang" class="form-control <?= form_error('jumlah_datang') ? 'invalid' : '' ?> " value="<?= $penerimaankemasan->jumlah_datang; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('jumlah_datang')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('jumlah_datang') ?>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Sampel (Pcs)</label>
                        <input type="text" name="sampel" class="form-control <?= form_error('sampel') ? 'invalid' : '' ?> " value="<?= $penerimaankemasan->sampel; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('sampel')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('sampel') ?>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Jumlah Reject</label>
                        <input type="text" name="jumlah_reject" class="form-control <?= form_error('jumlah_reject') ? 'invalid' : '' ?> " value="<?= $penerimaankemasan->jumlah_reject; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('jumlah_reject')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('jumlah_reject') ?>
                        </div>
                    </div> 
                </div>
                <!-- Kondisi Fisik -->
                <hr>
                <div class="form-group">
                    <label class="form-label font-weight-bold d-block mb-2">Kondisi Fisik</label>
                    <h6 style="color: red; font-style: italic; font-size: 12px;">*Centang jika sesuai</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <?php 
                                    $fisik = ['warna'=>'Warna','panjang'=>'Panjang','diameter'=>'Diameter','lebar'=>'Lebar','tinggi'=>'Tinggi','berat'=>'Berat','delaminasi'=>'Delaminasi','bau'=>'Bau','desain'=>'Desain'];
                                    foreach ($fisik as $key => $label): ?>
                                        <th><?= $label ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($fisik as $key => $label): ?>
                                        <td>
                                            <input type="checkbox" name="<?= $key ?>" value="sesuai" 
                                            <?= $penerimaankemasan->$key == 'sesuai' ? 'checked' : '' ?> style="transform: scale(1.5);">
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold">Segel</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('segel') ? 'is-invalid' : '' ?>" 
                                type="radio" name="segel" value="Sesuai" <?= $penerimaankemasan->segel=='Sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Sesuai</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?= form_error('segel') ? 'is-invalid' : '' ?>" 
                                type="radio" name="segel" value="Tidak Sesuai" <?= $penerimaankemasan->segel=='Tidak Sesuai' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tidak Sesuai</label>
                            </div>
                            <div class="invalid-feedback d-block"><?= form_error('segel') ?></div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold d-block">Penerimaan</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" type="radio" name="penerimaan" value="ok" <?= $penerimaankemasan->penerimaan=='ok' ? 'checked' : '' ?>>
                            <label class="form-check-label">Ok</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" type="radio" name="penerimaan" value="tolak" <?= $penerimaankemasan->penerimaan=='tolak' ? 'checked' : '' ?>>
                            <label class="form-check-label">Tolak</label>
                        </div>
                        <div class="invalid-feedback d-block"><?= form_error('penerimaan') ?></div>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label font-weight-bold d-block">COA</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('coa') ? 'is-invalid' : '' ?>" type="radio" name="coa" value="ada" <?= $penerimaankemasan->coa=='ada' ? 'checked' : '' ?>>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= form_error('coa') ? 'is-invalid' : '' ?>" type="radio" name="coa" value="tidak ada" <?= $penerimaankemasan->coa=='tidak ada' ? 'checked' : '' ?>>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                        <div class="invalid-feedback d-block"><?= form_error('coa') ?></div>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Upload Bukti COA</label><br>
                        <input type="file" name="bukti_coa" class="form-control <?= form_error('bukti_coa') ? 'is-invalid' : '' ?>" accept="image/*,application/pdf">
                        <?php if(!empty($penerimaankemasan->bukti_coa)): ?>
                            <small><a href="<?= base_url('uploads/'.$penerimaankemasan->bukti_coa) ?>" target="_blank">Link COA</a></small>
                        <?php endif; ?>
                        <input type="hidden" name="bukti_coa_lama" value="<?= $penerimaankemasan->bukti_coa; ?>">
                        <div class="invalid-feedback"><?= form_error('bukti_coa') ?></div>
                        <h6 style="color: red; font-style: italic; font-size: 12px;">*Upload COA jika ada</h6>
                    </div>
                </div>

                <hr>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea class="form-control" name="keterangan"><?= set_value('keterangan', $penerimaankemasan->keterangan) ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('keterangan')) ? 'd-block' : '' ?>"><?= form_error('keterangan') ?></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Update
                        </button>
                        <a href="<?= base_url('penerimaankemasan')?>" class="btn btn-md btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style type="text/css">
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>