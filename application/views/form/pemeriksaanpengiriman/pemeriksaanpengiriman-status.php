<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pemeriksaanpengiriman-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Pengiriman RM, Seasoning, Kemasan dan Chemical</a>
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
                                $datetime = new datetime($pemeriksaanpengiriman->date);
                                $datetime = $datetime->format('d-m-Y');
                                $timing = new DateTime($pemeriksaanpengiriman->jam_datang);
                                $timing = $timing->format('H:i');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="9">PEMERIKSAAN PENGIRIMAN RM, SEASONING, KEMASAN DAN CHEMICAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;" colspan="9"><b>Tanggal: <?= $datetime; ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Nama Supplier</b></td>
                                    <td colspan="6"><?= $pemeriksaanpengiriman->nama_supplier; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Nama Barang</b></td>
                                    <td colspan="6"><?= $pemeriksaanpengiriman->nama_barang; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Jenis Mobil Pengangkut</b></td>
                                    <td colspan="6"><?= $pemeriksaanpengiriman->jenis_mobil; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>No. Polisi</b></td>
                                    <td colspan="6"><?= $pemeriksaanpengiriman->no_polisi; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Identitas Pengirim</b></td>
                                    <td colspan="6"><?= $pemeriksaanpengiriman->identitas_pengantar; ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align:center;" colspan="9">KONDISI MOBIL</th>
                                </tr>
                                <tr>
                                    <td><b>Segel</b></td>
                                    <td><b>Kebersihan</b></td>
                                    <td><b>Bocor</b></td>
                                    <td><b>Hama</b></td>
                                    <td><b>Jam Datang</b></td>
                                </tr>
                                <tr>
                                    <td><?= ($pemeriksaanpengiriman->segel == 'ok') ? '✔️' : (($pemeriksaanpengiriman->segel == 'tidak ok') ? '❌' : '−'); ?></td>
                                    <td><?= ($pemeriksaanpengiriman->kebersihan == 'ok') ? '✔️' : (($pemeriksaanpengiriman->kebersihan == 'tidak ok') ? '❌' : '−'); ?></td>
                                    <td><?= ($pemeriksaanpengiriman->bocor == 'ok') ? '✔️' : (($pemeriksaanpengiriman->bocor == 'tidak ok') ? '❌' : '−'); ?></td>
                                    <td><?= ($pemeriksaanpengiriman->hama == 'ok') ? '✔️' : (($pemeriksaanpengiriman->hama == 'tidak ok') ? '❌' : '−'); ?></td>
                                    <td colspan="5"><?= $timing; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Keterangan</td>
                                    <td colspan="6"> <?= !empty($pemeriksaanpengiriman->keterangan) ? $pemeriksaanpengiriman->keterangan : 'Tidak ada'; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">QC</td>
                                    <td colspan="6"><?= $pemeriksaanpengiriman->username;?></td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('pemeriksaanpengiriman/status/'.$pemeriksaanpengiriman->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Status</label>
                            <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                                <option value="1" <?= set_select('status_spv', '1'); ?> <?= $pemeriksaanpengiriman->status_spv == 1?'selected':'';?>>Verified</option>
                                <option value="2" <?= set_select('status_spv', '2'); ?> <?= $pemeriksaanpengiriman->status_spv == 2?'selected':'';?>>Revision</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('status_spv') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan Revisi</label>
                            <textarea class="form-control" name="catatan_spv" ><?= $pemeriksaanpengiriman->catatan_spv; ?></textarea>
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
                            <a href="<?= base_url('pemeriksaanpengiriman/verifikasi')?>" class="btn btn-md btn-danger">
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