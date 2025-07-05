<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Seasoning dari Pemasok</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('seasoning-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Seasoning dari Pemasok</a>
                </li>
            </ol>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <?php 
                                $datetime = new datetime($seasoning->date);
                                $datetime = $datetime->format('d-m-Y');
                                $exp = new DateTime($seasoning->expired);
                                $exp = $exp->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="9">PEMERIKSAAN SEASONING DARI PEMASOK</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="text-align:left;" colspan="7"><b>Tanggal: <?= $datetime; ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Jenis Seasoning</b></td>
                                <td colspan="6"><?= $seasoning->jenis_seasoning; ?></td>
                            </tr>
                            <tr>
                                <td><b>Spesifikasi</b></td>
                                <td colspan="6"><?= $seasoning->spesifikasi; ?></td>
                            </tr>
                            <tr>
                                <td><b>Pemasok</b></td>
                                <td colspan="6"><?= $seasoning->pemasok; ?></td>
                            </tr>
                            <tr>
                                <td><b>Kode Produksi</b></td>
                                <td colspan="6"><?= $seasoning->kode_produksi; ?></td>
                            </tr>
                            <tr>
                                <td><b>Expired Date</b></td>
                                <td colspan="6"><?= $exp; ?></td>
                            </tr>
                            <tr>
                                <td><b>Jumlah Barang</b></td>
                                <td><b>Sampel (pcs)</b></td>
                                <td colspan="5"><b>Jumlah Reject</b></td>
                            </tr>
                            <tr>
                                <td><?= $seasoning->jumlah_barang; ?></td>
                                <td><?= $seasoning->sampel; ?></td>
                                <td colspan="5"><?= $seasoning->jumlah_reject; ?></td>
                            </tr>
                            <tr>
                                <th colspan="7">KONDISI FISIK</th>
                            </tr>
                            <tr>
                                <td><b>Kemasan</b></td>
                                <td><b>Warna</b></td>
                                <td><b>Kotoran</b></td>
                                <td colspan="3"><b>Aroma</b></td>
                            </tr>
                            <tr>
                                <td><?= ($seasoning->kemasan == 'sesuai') ? '✔️' : (($seasoning->kemasan == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                <td><?= ($seasoning->warna == 'sesuai') ? '✔️' : (($seasoning->warna == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                <td><?= ($seasoning->kotoran == 'sesuai') ? '✔️' : (($seasoning->kotoran == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                <td colspan="3"><?= ($seasoning->aroma == 'sesuai') ? '✔️' : (($seasoning->aroma == 'tidak sesuai') ? '❌' : '−'); ?></td>
                            </tr>
                            <tr>
                                <td><b>Kadar Air</b></td>
                                <td colspan="6"><?= $seasoning->kadar_air; ?></td>
                            </tr>
                            <tr>
                                <td><b>Negara Asal dibuat</b></td>
                                <td colspan="6"><?= $seasoning->negara_asal; ?></td>
                            </tr>
                            <tr>
                                <td><b>Segel</b></td>
                                <td colspan="6"><?= $seasoning->segel; ?></td>
                            </tr>
                            <tr>
                                <td><b>Penerimaan</b></td>
                                <td colspan="6"><?= $seasoning->penerimaan; ?></td>
                            </tr>
                            <tr>
                                <th colspan="7">PERSYARATAN DOKUMEN</th>
                            </tr>
                            <tr>
                                <td><b>Logo Halal</b></td>
                                <td><b>Halal</b></td>
                                <td colspan="2"><b>COA</b></td>
                                <td colspan="2"><b>Allergen</b></td>
                            </tr>
                            <tr>
                                <td><?= $seasoning->logo_halal;?></td>
                                <td><?= $seasoning->sertif_halal;?></td>
                                <td colspan="2"><?= $seasoning->coa;?></td>
                                <td colspan="2"><?= $seasoning->allergen;?></td>
                            </tr>
                            <tr>
                                <td>Bukti COA</td>
                                <td colspan="6">
                                    <?php if (!empty($seasoning->bukti_coa)): ?>
                                        <a href="<?= base_url('uploads/' . $seasoning->bukti_coa); ?>" target="_blank">
                                            Link COA
                                        </a>
                                    <?php else: ?>
                                        <p>Tidak ada file</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td colspan="6"> <?= !empty($seasoning->keterangan) ? $seasoning->keterangan : 'Tidak ada'; ?></td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td colspan="6"> <?= !empty($seasoning->catatan) ? $seasoning->catatan : 'Tidak ada'; ?></td>
                            </tr>
                            <tr>
                                <td>QC</td>
                                <td colspan="6"><?= $seasoning->username;?></td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('seasoning/status/'.$seasoning->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $seasoning->status_spv == 1?'selected':'';?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $seasoning->status_spv == 2?'selected':'';?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control" name="catatan_spv" ><?= $seasoning->catatan_spv; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan_spv')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('catatan_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('seasoning/verifikasi')?>" class="btn btn-md btn-danger">
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
    .no-border {
        border: none;
        box-shadow: none;
    }
    .table {
        width: 50%; 
        font-size: 16px; 
        margin: 0 auto; 
    }
    .table, .table th, .table td {
        border: none;
    }
    .table th, .table td {
        padding: 6px 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        word-wrap: break-word;
        white-space: normal !important;
    }
    .table td {
        white-space: nowrap;
    }
</style>