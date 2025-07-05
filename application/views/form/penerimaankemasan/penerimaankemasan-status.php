<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Penerimaan Kemasan dari Supplier</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('penerimaankemasan-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Penerimaan Kemasan dari Supplier</a>
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
                                $datetime = new datetime($penerimaankemasan->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="9">PEMERIKSAAN PENERIMAAN KEMASAN DARI SUPPLIER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;" colspan="3"><b>Tanggal: <?= $datetime; ?></b></td>
                                    <td colspan="6"><b>Shift: <?= $penerimaankemasan->shift; ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Jenis Kemasan</b></td>
                                    <td colspan="6"><?= $penerimaankemasan->jenis_kemasan; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Pemasok</b></td>
                                    <td colspan="6"><?= $penerimaankemasan->pemasok; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Kode Produksi</b></td>
                                    <td colspan="6"><?= $penerimaankemasan->kode_produksi; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Jumlah Datang</b></td>
                                    <td colspan="3"><b>Sampel (pcs)</b></td>
                                    <td colspan="3"><b>Jumlah Reject</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><?= $penerimaankemasan->jumlah_datang; ?></td>
                                    <td colspan="3"><?= $penerimaankemasan->sampel; ?></td>
                                    <td colspan="3"><?= $penerimaankemasan->jumlah_reject; ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align:center;" colspan="9">KONDISI FISIK</th>
                                </tr>
                                <tr>
                                    <td><b>Warna</b></td>
                                    <td><b>Panjang</b></td>
                                    <td><b>Diameter</b></td>
                                    <td><b>Lebar</b></td>
                                    <td><b>Tinggi</b></td>
                                    <td><b>Berat</b></td>
                                    <td><b>Delaminasi</b></td>
                                    <td><b>Bau</b></td>
                                    <td><b>Desain</b></td>
                                </tr>
                                <tr>
                                    <td><?= ($penerimaankemasan->warna == 'sesuai') ? '✔️' : (($penerimaankemasan->warna == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                    <td><?= ($penerimaankemasan->panjang == 'sesuai') ? '✔️' : (($penerimaankemasan->panjang == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                    <td><?= ($penerimaankemasan->diameter == 'sesuai') ? '✔️' : (($penerimaankemasan->diameter == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                    <td><?= ($penerimaankemasan->lebar == 'sesuai') ? '✔️' : (($penerimaankemasan->lebar == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                    <td><?= ($penerimaankemasan->tinggi == 'sesuai') ? '✔️' : (($penerimaankemasan->tinggi == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                    <td><?= ($penerimaankemasan->berat == 'sesuai') ? '✔️' : (($penerimaankemasan->berat == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                    <td><?= ($penerimaankemasan->delaminasi == 'sesuai') ? '✔️' : (($penerimaankemasan->delaminasi == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                    <td><?= ($penerimaankemasan->bau == 'sesuai') ? '✔️' : (($penerimaankemasan->bau == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                    <td><?= ($penerimaankemasan->desain == 'sesuai') ? '✔️' : (($penerimaankemasan->desain == 'tidak sesuai') ? '❌' : '−'); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Segel</b></td>
                                    <td colspan="3"><b>COA</b></td>
                                    <td colspan="3"><b>Penerimaan</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><?= $penerimaankemasan->segel;?></td>
                                    <td colspan="3"><?= ($penerimaankemasan->coa == 'ada') ? '✔️' : (($penerimaankemasan->coa == 'tidak ada') ? '❌' : '−'); ?></td>
                                    <td colspan="3"><?= ($penerimaankemasan->penerimaan == 'ok') ? '✔️' : (($penerimaankemasan->penerimaan == 'tolak') ? '❌' : '−'); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Bukti COA</td>
                                    <td colspan="6">
                                        <?php if (!empty($penerimaankemasan->bukti_coa)): ?>
                                            <a href="<?= base_url('uploads/' . $penerimaankemasan->bukti_coa); ?>" target="_blank">
                                                Link COA
                                            </a>
                                        <?php else: ?>
                                            <p>Tidak ada file</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">Keterangan</td>
                                    <td colspan="6"> <?= !empty($penerimaankemasan->keterangan) ? $penerimaankemasan->keterangan : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">QC</td>
                                    <td colspan="6"><?= $penerimaankemasan->username;?></td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('penerimaankemasan/status/'.$penerimaankemasan->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Status</label>
                            <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                                <option value="1" <?= set_select('status_spv', '1'); ?> <?= $penerimaankemasan->status_spv == 1?'selected':'';?>>Verified</option>
                                <option value="2" <?= set_select('status_spv', '2'); ?> <?= $penerimaankemasan->status_spv == 2?'selected':'';?>>Revision</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('status_spv') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan Revisi</label>
                            <textarea class="form-control" name="catatan_spv" ><?= $penerimaankemasan->catatan_spv; ?></textarea>
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
                            <a href="<?= base_url('penerimaankemasan/verifikasi')?>" class="btn btn-md btn-danger">
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