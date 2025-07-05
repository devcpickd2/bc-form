<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pemeriksaan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('sanitasi-diketahui'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Sanitasi</a>
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
                                $datetime = new datetime($sanitasi->date);
                                $datetime = $datetime->format('d-m-Y');
                                ?>
                                <tr>
                                    <th style="text-align:center;" colspan="7">PEMERIKSAAN SANITASI</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="text-align:left;" colspan="2"><b>Tanggal : <?= $datetime;?></b></td>
                                <td style="text-align:left;" colspan="5"><b>Shift : <?= $sanitasi->shift;?></b></td>
                            </tr>
                            <tr>
                                <td colspan="2">Pukul</td>
                                <td colspan="5"><?= date('H:i', strtotime($sanitasi->waktu)); ?></td>
                            </tr>
                            <?php
                            $result = json_decode($sanitasi->area, true);
                            if (!is_array($result)) $result = [];
                            ?>
                            <tr>
                                <th colspan="7" style="text-align:center;">Daftar Hasil Pemeriksaan</th>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <th>Standar (ppm)</th>
                                <th>Aktual</th>
                                <th>Bukti</th>
                                <th>Suhu Air</th>
                                <th>Keterangan</th>
                                <th>Tindakan</th>
                            </tr>
                            <?php foreach ($result as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['sub_area']) ?></td>
                                    <td><?= htmlspecialchars($row['standar']) ?></td>
                                    <td><?= htmlspecialchars($row['aktual']) ?></td>
                                    <td>
                                        <?php if (!empty($row['gambar'])): ?>
                                            <img src="<?= base_url('uploads/sanitasi/' . $row['gambar']) ?>" alt="Bukti" style="width: 100px; height: auto;">
                                        <?php else: ?>
                                            <span class="text-muted">Tidak ada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($row['suhu_air']) ?></td>
                                    <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                    <td><?= htmlspecialchars($row['tindakan']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2">Catatan</td>
                                <td colspan="5"> <?= !empty($sanitasi->catatan) ? $sanitasi->catatan : 'Tidak ada'; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">QC</td>
                                <td colspan="5"> <?= !empty($sanitasi->username) ? $sanitasi->username : 'Tidak ada'; ?></td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('sanitasi/statusprod/'.$sanitasi->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_produksi') ? 'invalid' : '' ?>" name="status_produksi">
                            <option value="1" <?= set_select('status_produksi', '1'); ?> <?= $sanitasi->status_produksi == 1?'selected':'';?>>Checked</option>
                            <option value="2" <?= set_select('status_produksi', '2'); ?> <?= $sanitasi->status_produksi == 2?'selected':'';?>>Re-Check</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_produksi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('status_produksi') ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control" name="catatan_produksi" ><?= $sanitasi->catatan_produksi; ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan_produksi')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('catatan_produksi') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('sanitasi/diketahui')?>" class="btn btn-md btn-danger">
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
        /*border: none;*/
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
