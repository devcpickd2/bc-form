<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Ketidaksesuaian Produk</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('ketidaksesuaian-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Ketidaksesuaian</a>
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
                                $datetime = new datetime($ketidaksesuaian->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">KETIDAKSESUAIAN PRODUK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                    <td style="text-align:left;" colspan="5"><b>Shift : <?= $ketidaksesuaian->shift;?></b></td>
                                </tr>
                                <tr>
                                    <td>Pukul</td>
                                    <td style="text-align:left;" colspan="6"><?= date('H:i', strtotime($ketidaksesuaian->waktu)); ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td colspan="6"><?= $ketidaksesuaian->nama_produk;?></td>
                                </tr>
                                <tr>
                                    <td>Uraian Ketidaksesuaian</td>
                                    <td colspan="6"><?= $ketidaksesuaian->ketidaksesuaian;?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td colspan="6"><?= $ketidaksesuaian->jumlah;?></td>
                                </tr>
                                <tr>
                                    <td>Analisis Penyebab / Kategori Bahaya</td>
                                    <td colspan="6"><?= $ketidaksesuaian->penyebab;?></td>
                                </tr>
                                <tr>
                                    <td>Tindakan / Disposisi</td>
                                    <td colspan="6"><?= $ketidaksesuaian->tindakan;?></td>
                                </tr>
                                <tr>
                                    <td>Verifikasi</td>
                                    <td colspan="6"><?= $ketidaksesuaian->verifikasi;?></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td colspan="6"> <?= !empty($ketidaksesuaian->catatan) ? $ketidaksesuaian->catatan : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <td>QC</td>
                                    <td colspan="6"><?= $ketidaksesuaian->username;?></td>
                                </tr>
                                <tr>
                                    <td>Produksi</td>
                                    <td colspan="5"><?= $ketidaksesuaian->nama_produksi;?></td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('ketidaksesuaian/status/'.$ketidaksesuaian->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Status</label>
                            <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                                <option value="1" <?= set_select('status_spv', '1'); ?> <?= $ketidaksesuaian->status_spv == 1?'selected':'';?>>Verified</option>
                                <option value="2" <?= set_select('status_spv', '2'); ?> <?= $ketidaksesuaian->status_spv == 2?'selected':'';?>>Revision</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('status_spv') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan Revisi</label>
                            <textarea class="form-control" name="catatan_spv" ><?= $ketidaksesuaian->catatan_spv; ?></textarea>
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
                            <a href="<?= base_url('ketidaksesuaian/verifikasi')?>" class="btn btn-md btn-danger">
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