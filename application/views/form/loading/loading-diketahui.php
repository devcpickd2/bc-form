<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Pemeriksaan Loading Produk</h1>
    </div>

    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center">
            <i class="fas fa-check"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center">
            <i class="fas fa-times"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
        <br>
    <?php endif ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px" class="text-center" rowspan="2">No</th>
                            <th rowspan="2">Tanggal / Shift</th>
                            <th rowspan="2">Start - Finish Loading</th>
                            <th rowspan="2">Tujuan</th>
                            <th colspan="4" style="text-align: center;">LOADING</th>
                            <th rowspan="2">Last Updated</th>
                            <th rowspan="2">Last Verified</th>
                            <th rowspan="2">Status</th>
                            <th rowspan="2" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kode Produksi</th>
                            <th>Kode Expired</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($loading as $val) {
                            $datetime = new DateTime($val->date);
                            $tanggalFormatted = $datetime->format('d-m-Y');

                            $start = new DateTime($val->start_loading);
                            $startFormatted = $start->format('H:i');
                            $finish = new DateTime($val->finish_loading);
                            $finishFormatted = $finish->format('H:i');

                            $loadings = json_decode($val->loading, true);
                            ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $tanggalFormatted . " / ". $val->shift ?></td>
                                <td><?= $startFormatted . " / ". $finishFormatted; ?></td>
                                <td><?= htmlspecialchars($val->tujuan) ?></td>
                                <td>
                                    <ul>
                                        <?php 
                                        if (!empty($loadings)) {
                                            foreach ($loadings as $load) {
                                                echo '<li>' . htmlspecialchars($load['nama_produk']) . '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <?php 
                                        if (!empty($loadings)) {
                                            foreach ($loadings as $load) {
                                                echo '<li>' . htmlspecialchars($load['kode_produksi']) . '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <?php 
                                        if (!empty($loadings)) {
                                            foreach ($loadings as $load) {
                                                echo '<li>' . htmlspecialchars($load['expired']) . '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <?php 
                                        if (!empty($loadings)) {
                                            foreach ($loadings as $load) {
                                                echo '<li>' . htmlspecialchars($load['keterangan']) . '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </td>
                                <td><?= date('H:i - d m Y', strtotime($val->modified_at)); ?></td>
                                <td><?= date('H:i - d m Y', strtotime($val->tgl_update_wh)); ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($val->status_wh == 0) {
                                        echo '<span style="color: #99a3a4; font-weight: bold;">Created</span>';
                                    } elseif ($val->status_wh == 1) {
                                        echo '<span style="color: #28b463; font-weight: bold;">Checked</span>';
                                    } elseif ($val->status_wh == 2) {
                                        echo '<span style="color: red; font-weight: bold;">Re-Check</span>';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('loading/statuswh/'.$val->uuid);?>" class="btn btn-warning btn-icon-split">
                                        <span class="text">Verifikasi</span>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<style> 
    th {
        background-color: #f8f9fc;
    }
</style>
