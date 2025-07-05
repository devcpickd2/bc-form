<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pemeriksaan Benda Mudah Pecah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('pecahbelah'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Benda Mudah Pecah</a>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <?php 
                        $datetime = new DateTime($pecahbelah->date);
                        $datetime = $datetime->format('d-m-Y');
                        ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" colspan="8">PEMERIKSAAN BENDA MUDAH PECAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                                    <td colspan="6" style="text-align:left;"><b>Shift: <?= $pecahbelah->shift; ?></b></td>
                                </tr>
                                <?php
                                $breakable = json_decode($pecahbelah->benda_pecah, true);
                                if (!is_array($breakable)) $breakable = [];
                                ?>
                                <tr>
                                    <th colspan="8" style="text-align:center;">Daftar Alat</th>
                                </tr>
                                <tr>
                                    <th style="text-align:center;">No</th>
                                    <th style="text-align:center;">Nama Alat</th>
                                    <th style="text-align:center;">Area</th>
                                    <th style="text-align:center;">Pemilik</th>
                                    <th style="text-align:center;">Jumlah</th>
                                    <th style="text-align:center;">Awal Shift</th>
                                    <th style="text-align:center;">Akhir Shift</th>
                                    <th style="text-align:center;">Keterangan</th>
                                </tr>
                                <?php $no = 1; foreach ($breakable as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                                    <td><?= htmlspecialchars($row['area']) ?></td>
                                    <td><?= htmlspecialchars($row['pemilik']) ?></td>
                                    <td><?= htmlspecialchars($row['jumlah']) ?></td>
                                    <td><?= htmlspecialchars($row['kondisi_awal']) ?></td>
                                    <td><?= htmlspecialchars($row['kondisi_akhir']) ?></td>
                                    <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2" style="text-align:left">QC Awal Shift</td>
                                <td colspan="6"><?= htmlspecialchars($pecahbelah->username); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">QC Akhir Shift</td>
                                <td colspan="6"><?= htmlspecialchars($pecahbelah->qc_update); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">Produksi</td>
                                <td colspan="6"><?= $pecahbelah->nama_produksi;?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">Diketahui Produksi</td>
                                <td colspan="6">
                                    <?php
                                    if ($pecahbelah->status_produksi == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($pecahbelah->status_produksi == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                    } elseif ($pecahbelah->status_produksi == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                    }
                                ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('pecahbelah/status/'.$pecahbelah->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $pecahbelah->status_spv == 1?'selected':'';?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $pecahbelah->status_spv == 2?'selected':'';?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control" name="catatan_spv" ><?= $pecahbelah->catatan_spv; ?></textarea>
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
                        <a href="<?= base_url('pecahbelah/verifikasi')?>" class="btn btn-md btn-danger">
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
        width: 80%; 
        font-size: 16px; 
        margin: 0 auto; 
        border-collapse: collapse;
    }
    .table, .table th, .table td {
        border: 1px solid #ddd;
    }
    .table th, .table td {
        padding: 6px 8px;
        text-align: left;
        word-wrap: break-word;
        white-space: normal !important;
    }
    .table td {
        white-space: nowrap;
    }

    .table th:first-child,
    .table td:first-child {
        width: 50px;
        max-width: 50px;
        text-align: center;
        white-space: nowrap;
    }
</style>
