<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Release Packing</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('releasepacking-verifikasi'); ?>">
                    <i class="fas fa-arrow-left"></i> Data Release Packing</a>
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
                                $datetime = new datetime($releasepacking->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">DATA RELEASE PACKING</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="text-align:left;" colspan="7"><b>Tanggal : <?= $datetime;?></b></td>
                            </tr>
                            <tr>
                                <td>Nama Produk</td>
                                <td colspan="6"><?= $releasepacking->nama_produk;?></td>
                            </tr>
                            <tr>
                                <td>Kode Produksi</td>
                                <td colspan="6"><?= $releasepacking->kode_produksi;?></td>
                            </tr>
                            <tr>
                                <td>Best Before</td>
                                <td colspan="6"><?= $releasepacking->best_before;?></td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td colspan="6"><?= $releasepacking->jumlah;?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td colspan="6"><?= $releasepacking->keterangan;?></td>
                            </tr>
                            <tr>
                                <td>QC</td>
                                <td colspan="6"><?= $releasepacking->username;?></td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('releasepacking/status/'.$releasepacking->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $releasepacking->status_spv == 1?'selected':'';?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $releasepacking->status_spv == 2?'selected':'';?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control" name="catatan_spv" ><?= $releasepacking->catatan_spv; ?></textarea>
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
                        <a href="<?= base_url('releasepacking/verifikasi')?>" class="btn btn-md btn-danger">
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
        border-bottom: 1px solid #ddd; /
    }
    .table td {
        white-space: nowrap;
    }
</style>