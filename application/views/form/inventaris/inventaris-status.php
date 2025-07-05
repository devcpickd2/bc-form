<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Checklist Inventaris Peralatan QC Bread Crumb</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item">
                <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . '?search=' . urlencode($this->input->get('search')) : base_url('inventaris'); ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Checklist Inventaris Peralatan QC Bread Crumb</a>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row">
                    <div class="table-responsive">
                        <?php 
                        $datetime = new DateTime($inventaris->date);
                        $datetime = $datetime->format('d-m-Y');
                        ?>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center;" colspan="7">CHECKLIST INVENTARIS PERALATAN QC BREAD CRUMB</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="text-align:left;"><b>Tanggal: <?= $datetime; ?></b></td>
                                    <td colspan="5" style="text-align:left;"><b>Shift: <?= $inventaris->shift; ?></b></td>
                                </tr>
                                <?php
                                $equipment = json_decode($inventaris->peralatan, true);
                                if (!is_array($equipment)) $equipment = [];
                                ?>
                                <tr>
                                    <th colspan="7" style="text-align:center;">Daftar Alat</th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah</th>
                                    <th>Awal Shift</th>
                                    <th>Akhir Shift</th>
                                    <th>Keterangan</th>
                                </tr>
                                <?php $no = 1; foreach ($equipment as $row): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama_alat']) ?></td>
                                    <td><?= htmlspecialchars($row['jumlah']) ?></td>
                                    <td><?= htmlspecialchars($row['kondisi_awal']) ?></td>
                                    <td><?= htmlspecialchars($row['kondisi_akhir']) ?></td>
                                    <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2" style="text-align:left">QC Awal Shift</td>
                                <td colspan="5"><?= htmlspecialchars($inventaris->username); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:left">QC Akhir Shift</td>
                                <td colspan="5"><?= htmlspecialchars($inventaris->qc_update); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('inventaris/status/'.$inventaris->uuid);?>">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Status</label>
                        <select class="form-control <?= form_error('status_spv') ? 'invalid' : '' ?>" name="status_spv">
                            <option value="1" <?= set_select('status_spv', '1'); ?> <?= $inventaris->status_spv == 1?'selected':'';?>>Verified</option>
                            <option value="2" <?= set_select('status_spv', '2'); ?> <?= $inventaris->status_spv == 2?'selected':'';?>>Revision</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('status_spv')) ? 'd-block' : '' ; ?> ">
                            <?= form_error('status_spv') ?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan Revisi</label>
                        <textarea class="form-control" name="catatan_spv" ><?= $inventaris->catatan_spv; ?></textarea>
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
                        <a href="<?= base_url('inventaris/verifikasi')?>" class="btn btn-md btn-danger">
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
