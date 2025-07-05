<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Suhu Chiller</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('chiller-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Suhu Chiller</a>
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
                                $datetime = new datetime($chiller->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">PEMERIKSAAN SUHU CHILLER</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="text-align:left;"><b>Tanggal : <?= $datetime;?></b></td>
                                <td style="text-align:left;" colspan="5"><b>Pukul : <?= date('H:i', strtotime($chiller->waktu)); ?></b></td>
                            </tr>
                            <tr>
                                <td>Chiller No.1</td>
                                <td colspan="6"><?= $chiller->chiller_1;?> °C</td>
                            </tr>
                            <tr>
                                <td>Chiller No.2</td>
                                <td colspan="6"><?= $chiller->chiller_2;?> °C</td>
                            </tr>
                            <tr>
                                <td>Chiller No.3</td>
                                <td colspan="6"><?= $chiller->chiller_3;?> °C</td>
                            </tr>
                            <tr>
                                <td>Chiller No.4</td>
                                <td colspan="6"><?= $chiller->chiller_4;?> °C</td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td colspan="6"> <?= !empty($chiller->catatan) ? $chiller->catatan : 'Tidak ada'; ?></td>
                            </tr>
                            <tr>
                                <td>QC</td>
                                <td colspan="6"><?= $chiller->username;?></td>
                            </tr>
                            <tr>
                                <td>Produksi</td>
                                <td colspan="5"><?= $chiller->nama_produksi;?></td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('chiller/status/'.$chiller->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $chiller->status_spv == 1?'selected':'';?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $chiller->status_spv == 2?'selected':'';?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control" name="catatan_spv" ><?= $chiller->catatan_spv; ?></textarea>
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
                        <a href="<?= base_url('chiller/verifikasi')?>" class="btn btn-md btn-danger">
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